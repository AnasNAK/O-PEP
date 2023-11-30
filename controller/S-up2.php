<?php
session_start(); 

include '../model/config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valid'])) {

    if (isset($_POST['role'])) {
        $selectedRole = $_POST['role']; 

      
        if (isset($_SESSION['user_email'])) {
            $userEmail = $_SESSION['user_email'];

            try {
            
                $query = "UPDATE user SET roleId = :roleId WHERE email = :email";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':roleId', $selectedRole);
                $stmt->bindParam(':email', $userEmail);
                $stmt->execute();

              
                if ($selectedRole == 1) {
                    header("Location: ../view/index.php"); 
                    exit();
                } elseif ($selectedRole == 2) {
                    header("Location: ../view/dashboard.php"); 
                    exit();
                }
            } catch (PDOException $e) {
                // Handle errors
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "User email not found in session."; 
        }
    } else {
        echo "Role not selected."; 
    }
}
?>
