<?php
    if(isset($_GET['code'])) {
        $code = $_GET['code'];

        $conn = new mySqli('localhost', 'root', 'root', 'kinangop pride_db');
        if($conn->connect_error) {
            die('Could not connect to the database');
        }

        $verifyQuery = $conn->query("SELECT * FROM users WHERE code = '$code'");

        if($verifyQuery->num_rows == 0) {
            header("Location: login.php");
            exit();
        }

        if(isset($_POST['change'])) {
            $email = $_POST['email'];
            $new_password = $_POST['password'];

            $changeQuery = $conn->query("UPDATE users SET password = ' ". md5($password) . "' WHERE email = '$email' and code = '$code'");

            if($changeQuery) {
                header("Location: success.html");
            }
        }
        $conn->close();
    }
    else {
        header("Location: login.php");
        exit();
    }
?>
