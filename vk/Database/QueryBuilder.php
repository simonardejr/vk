<?php

namespace DesafioVk\Vk\Database;

class QueryBuilder
{
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$table}");
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS);
        } catch ( \PDOException $e ) {
            return false;
        }

        return false;
    }

    public function find($fields, $table)
    {
        try {
            $where = implode(' AND ', array_map(function($i, $k) {
                return "{$k} = " . "\"{$i}\"";
            }, $fields, array_keys($fields)));
            
            $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE " . $where);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS);

        } catch ( \PDOException $e ) {
            return false;
        }

        return false;
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
            $table, 
            implode(', ', array_keys($parameters)), 
            ':' . implode(', :', array_keys($parameters)), 
        );

        return $this->execute($sql, $parameters);
    }

    public function update($table, $parameters, $where)
    {
        $parameters = (array)$parameters;

        $sql = sprintf('UPDATE %s SET %s WHERE %s',
            $table, 
            implode(', ', $this->prepareFields($parameters)),
            implode(', ', $this->prepareFields($where)), 
        );

        return $this->execute($sql, $parameters);
    }

    public function delete($table, $id)
    {
        $sql = sprintf('DELETE FROM %s WHERE %s LIMIT 1',
            $table,
            implode(' ', $this->prepareFields($id))
        );

        return $this->execute($sql);
    }

    public function execute($sql, $parameters=[])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

            return true;

        } catch( \PDOException $e ) {
            die( 'Whoops... ' . $e->getMessage() );
        }
    }

    public function prepareFields($fields)
    {
        $sql = [];
        foreach($fields as $key => $value) {
            if ( empty($value) && ! is_numeric($value) ) {
                continue;
            }

            if( ! is_numeric($value) ) {
                $value = '"' . $value . '"';
            }

            $sql[] = $key . ' = ' . $value;
        }

        return $sql;
    }
}