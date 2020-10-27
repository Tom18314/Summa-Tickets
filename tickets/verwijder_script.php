<?php

    if(!isset($_GET['id'])) {
        header("Location: tickets.php");
        exit();
    } else {
        $conn = new mysqli("localhost", "root", "", "summa");

        $id = $_GET['id'];
        $sql = "DELETE FROM tickets WHERE id=$id";
        $conn->query($sql);

        $conn->close();
        header("Location: tickets.php");
        exit();
    }
?>