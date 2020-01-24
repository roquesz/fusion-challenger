<?php

// namespace php\Classes;

class Connection
{
    const HOST = '127.0.0.1';
    const USER = 'root';
    const PASSWORD = 'root';
    const DATABASE = 'fusion';
    public $conn;

    public function __construct()
    {
        $this->conn = new \mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function save(Driver $driver)
    {
        $sqlInsert = "INSERT INTO drivers (name, cpf, email, situation, status, created_at) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sqlInsert);
        $date = date('Y-m-d H:i:s');
        $name = $driver->getName();
        $cpf = $driver->getCpf();
        $email = $driver->getEmail();
        $situation = $driver->getSituation();
        $status = $driver->getStatus();
        $stmt->bind_param('ssssis', $name, $cpf, $email, $situation, $status, $date);
        $stmt->execute();
        $data = [
                    'id' => $this->conn->insert_id,
                    'name' => $driver->getName(),
                    'cpf' => $driver->getCpf(),
                    'email' => $driver->getEmail(),
                    'situation' => $driver->getSituation(),
                    'status' => $driver->getStatus() ? 'Active' : 'Inactive',
                ];
        return $data;
    }

    public function update(Int $id, Driver $driver)
    {
        $sqlUpdate = "UPDATE drivers SET name = ?, cpf = ?, email = ?, situation = ?, status = ?, updated_at = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sqlUpdate);
        $date = date('Y-m-d H:i:s');
        $name = $driver->getName();
        $cpf = $driver->getCpf();
        $email = $driver->getEmail();
        $situation = $driver->getSituation();
        $status = $driver->getStatus();
        $stmt->bind_param('ssssisi', $name, $cpf, $email, $situation, $status, $date, $id);
        $stmt->execute();
        $data = [
                    'id' => $id,
                    'name' => $driver->getName(),
                    'cpf' => $driver->getCpf(),
                    'email' => $driver->getEmail(),
                    'situation' => $driver->getSituation(),
                    'status' => $driver->getStatus() ? 'Active' : 'Inactive',
                ];
        return $data;
    }

    public function destroy(Int $id)
    {
        $sqlDelete = "DELETE FROM drivers WHERE id = ?";
        $stmt = $this->conn->prepare($sqlDelete);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

}