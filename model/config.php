<?php
$dsn = 'mysql:host=localhost;dbname=OPEP';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($dsn, $user, $pass);
   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo "Connected successfully";
} catch (PDOException $e) {
  
    echo "Connection failed: " . $e->getMessage();
}

?>