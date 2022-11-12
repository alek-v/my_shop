<?php

namespace App\Classes;
use PDO;

class Database extends PDO {
    public function __construct(string $dsn, ?string $username = null, ?string $password = null, ?array $options = null)
    {
        parent::__construct($dsn, $username, $password, $options);
    }

    /**
     * Select data from the database
     *
     * @param string $table
     * @param array|null $where
     * @param string|null $fields
     * @return array|bool
     */
    public function selectData(string $table, ?array $where = null, ?string $fields = null): array|bool
    {
        // Fields to retrieve
        if ($fields == null) $fields = '*';

        // Select conditions
        $prepare_where = '';
        if ($where != null) {
            $prepare_where = ' WHERE ';

            $where_keys = '';
            foreach(array_keys($where) as $bind_key) {
                if (!empty($where_keys)) $where_keys .= ', ';

                $where_keys .= $bind_key . '=:' . $bind_key;
            }

            $prepare_where = $prepare_where . $where_keys;
        }

        $stmt = $this->prepare("SELECT $fields FROM $table" . $prepare_where);
        $stmt->execute($where);

        return $stmt->fetchAll();
    }
}