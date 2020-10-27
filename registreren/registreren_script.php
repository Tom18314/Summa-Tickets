<?php
    session_start();

    if(!isset($_POST["btn"])) {
        header("Location: registreren.php");
        exit();
    } else {
        $conn = new mysqli("localhost", "root", "", "summa");

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $check = $conn->query("SELECT username FROM users WHERE username = '". $username ."'");
        if ($check->num_rows > 0) {
            $conn->close();
            header("Location: registreren.php?taken=true");
            exit();
        }else{
            $query = "INSERT INTO users (username, email, password) VALUES ('". $username ."', '". $email ."', '". $password ."')";
            if($conn->query($query) === TRUE){
                $user_id = $conn->insert_id;

                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $username;

                $conn->close();
                header("Location: ../panel.php");
                exit();
            }else{
                $conn->close();
                header("Location: registreren.php");
                exit();
            }
        }
    }

?>