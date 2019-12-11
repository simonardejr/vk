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
        } catch (\PDOException $e) {
            return false;
        }

        return false;
    }
}