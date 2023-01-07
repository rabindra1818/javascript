<?php

class Dbh {

private $hostname;
private $username;
private $password;
private $database;

protected  function db(){

    $this->hostname = HOSTNAME;
    $this->username = USERNAME;
    $this->password = PASSWORD;
    $this->database = DATABASE;  

    $conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
    return $conn;

}

}