<?php

$servername = "localhost:3306";
$username = "RT_Admin";
$password = "GreenEnergy24/7";
$dbname = "rolsa_tech";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
};

