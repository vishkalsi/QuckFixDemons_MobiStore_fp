<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "mobi_store_db";
$connection = new mysqli($servername, $username, $password,$databaseName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>