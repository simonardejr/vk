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

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

            return true;
        } catch( \PDOException $e ) {
            die('Whoops...' . $e->getMessage());
        }
    }
}