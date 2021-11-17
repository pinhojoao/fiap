<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fiap";

try {
     $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}