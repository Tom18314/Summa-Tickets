<?php

    if(!isset($_POST["btn"])) {
        header("Location: aanmaken.php");
        exit();
    } else {
        $conn = new mysqli("localhost", "root", "", "summa");

        $omschrijving = $_POST["omschrijving"];
        $prioriteit = $_POST["prioriteit"];
        $klant = $_POST["klant"];

        session_start();
        $aanmelder = $_SESSION['user_name'];

        $query = "INSERT INTO tickets (prioriteit, omschrijving, klant, aanmelder) VALUES ('". $prioriteit ."', '". $omschrijving ."', '". $klant ."', '". $aanmelder ."')";
        if($conn->query($query) === TRUE){
            $conn->close();
            header("Location: tickets.php");
            exit();
        }else{
            $conn->close();
            header("Location: tickets.php?error=could_not_created");
            exit();
        }
    }
?>