<?php
//DB details
$dbHost = 'localhost:3306';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'innobar';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
} 
?>