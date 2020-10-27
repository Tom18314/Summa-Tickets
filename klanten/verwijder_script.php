<?php

if(!isset($_GET['id'])) {
    header("Location: klanten.php");
    exit();
} else {
    $conn = new mysqli("localhost", "root", "", "summa");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM klanten WHERE id=$id";
    $conn->query($sql);

    $conn->close();
    header("Location: klanten.php");
    exit();
}