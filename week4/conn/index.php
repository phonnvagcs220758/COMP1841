<?php
try {
    $pdo = new PDO('mysql:host=localhost; dbname=test; charset=utf8mb4','root','');
    $output = "Database Connection Established Successfully!";
} 
catch (PDOException $e) {
    $output = "Unable to connect to the database server: " . $e->getMessage();
}

include './templates/output.html.php';
