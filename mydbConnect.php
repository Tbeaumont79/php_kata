<?php 

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

?>