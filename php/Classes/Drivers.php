<?php

class Driver {

    private $name;
    private $cpf;
    private $email;
    private $situation;
    private $status;
    private $created_at;
    private $updated_at;

    public function __construct(Array $driver)
    {
        $this->name = $driver['name'];
        $this->cpf = $driver['cpf'];
        $this->email = $driver['email'];
        $this->situation = $driver['situation'];
        $this->status = $driver['status'];
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setSituation($situation)
    {
        $this->situation = $situation;
    }

    public function getSituation()
    {
        return $this->situation;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
