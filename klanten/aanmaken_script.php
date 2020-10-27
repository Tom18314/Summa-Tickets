<?php
    if(!isset($_POST["btn"])) {
        header("Location: aanmaken.php");
        exit();
    } else {
        $conn = new mysqli("localhost", "root", "", "summa");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $query = "INSERT INTO klanten (name, email, phone) VALUES ('". $name ."', '". $email ."', '". $phone ."')";
        if($conn->query($query) === TRUE){
            $conn->close();
            header("Location: klanten.php");
            exit();
        }else{
            $conn->close();
            header("Location: tickets.php?error=could_not_created");
            exit();
        }
    }
?>