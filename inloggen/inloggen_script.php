<?php
    session_start();

    if(!isset($_POST["btn"])) {
        header("Location: inloggen.php");
        exit();
    } else {
        $conn = new mysqli("localhost", "root", "", "summa");

        $username = $_POST["username"];
        $password = $_POST["password"];

        $check = $conn->query("SELECT * FROM users WHERE username ='".$username."'");
        if ($check->num_rows == 1) {
            $result = $check->fetch_assoc();

            if(password_verify($password, $result["password"])){
                $_SESSION['user_id'] = $result["id"];
                $_SESSION['user_name'] = $result["username"];

                $conn->close();
                header("Location: ../panel.php");
                exit();
            }else{
                $conn->close();
                header("Location: inloggen.php?error=wrong_password");
                exit();
            }
        }else{
            $conn->close();
            header("Location: inloggen.php?error=wrong_username");
            exit();
        }
    }
?>