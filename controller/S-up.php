<?php
session_start(); 

include '../model/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstName = $_POST['first'];
    $lastName = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $query = "INSERT INTO user (`FirstName`, `LastName`, `Email`, `Password`) VALUES (:first_name, :last_name, :email, :hashed_password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hashed_password', $hashedPassword);

        $stmt->execute();

        $_SESSION['user_email'] = $email;
        header("Location: ../view/Singup2.php");
        exit();
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
    }
}
?>
