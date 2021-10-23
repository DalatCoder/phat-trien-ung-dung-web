<?php

class DBHelper
{
    private string $host = 'localhost';
    private string $dbname = 'milkshop';
    private string $charset = 'utf8';
    private string $db_username = 'root';
    private string $db_password = '';

    private PDO $pdo;
    private string $table;
    private string $primaryKey;

    public function __construct(string $table, string $primaryKey)
    {
        $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}", $this->db_username, $this->db_password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM `{$this->table}`";
        $result = $this->query($sql);

        return $result->fetchAll();
    }

    public function findById($value)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE `{$this->primaryKey}` = :value";

        $parameters = [
            'value' => $value
        ];

        $query = $this->query($sql, $parameters);

        return $query->fetch();
    }

    public function total()
    {
        $sql = "SELECT COUNT(*) FROM `{$this->table}`";
        $query = $this->query($sql);
        $row = $query->fetch();
        return $row[0];
    }

    private function insert($fields)
    {
        $sql = 'INSERT INTO `' . $this->table . '` (';

        foreach ($fields as $key => $value) {
            $sql .= "`$key`, ";
        }

        $sql = rtrim($sql, ', ');

        $sql .= ') VALUES (';

        foreach ($fields as $key => $value) {
            $sql .= ":$key, ";
        }

        $sql = rtrim($sql, ', ');

        $sql .= ')';

        $fields = $this->processDate($fields);

        $this->query($sql, $fields);
    }

    private function update($fields)
    {
        $sql = 'UPDATE `' . $this->table . '` SET ';

        foreach ($fields as $field_name => $updated_value) {
            $sql .= "`$field_name` = :$field_name, ";
        }
        $sql = rtrim($sql, ', ');

        $sql .= ' WHERE `' . $this->primaryKey . '` = :primaryKey';

        $fields = $this->processDate($fields);

        $fields['primaryKey'] = $fields['id'];

        $this->query($sql, $fields);
    }

    public function save($record)
    {
        try {
            if ($record[$this->primaryKey] == '') {
                $record[$this->primaryKey] = null;
            }

            $this->insert($record);
        } catch (PDOException $e) {
            $this->update($record);
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `{$this->table}` WHERE `{$this->primaryKey}` = :id";
        $parameters = [
            'id' => $id
        ];

        $this->query($sql, $parameters);
    }

    public function get_last_insert_id()
    {
        $sql = "SELECT LAST_INSERT_ID()";
        $query = $this->query($sql);

        $row = $query->fetch();
        return $row[0];
    }

    private function query($sql, $parameters = [])
    {
        $query = $this->pdo->prepare($sql);

        foreach ($parameters as $name => $value) {
            $query->bindValue($name, $value);
        }

        $query->execute();
        // $query->execute($parameters);
        return $query;
    }

    private function processDate($fields)
    {
        foreach ($fields as $key => $value) {
            if ($value instanceof DateTime) {
                $fields[$key] = $value->format('Y-m-d H:i:s');
            }
        }

        return $fields;
    }
}