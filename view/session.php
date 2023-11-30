<?php
include '../model/config.php';

session_start();




// function redirectToSignIn() {
//     header("Location: SingIn.php");
//     exit();
// }

// function redirectToIndex() {
//     header("Location: index.php");
//     exit();
// }

// function redirectToBlockedPage() {
//     header("Location: blocked.php");
//     exit();
// }

function checkUserSession($pdo) {
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];

        try {
            $query = "SELECT RoleId FROM user WHERE Email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $user_email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $role_id = $result['RoleId'];

                if ($role_id == 2) {
                    // Admin user
                    return 'admin';
                } elseif ($role_id == 1) {
                    // Client user
                    return 'client';
                } elseif ($role_id == 3) {
                    // Super Admin user
                    return 'superAdmin';
                } elseif ($role_id == 4) {
                    // User is blocked by Super Admin
                    return 'blocked';
                }
            }
        } catch (PDOException $e) {
            // Handle errors
            echo "Error: " . $e->getMessage();
        }
    }

    // // If session is not set or user doesn't match any role, redirect to signIn.php
    // redirectToSignIn();
}


?>
