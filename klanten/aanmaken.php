<?php
    session_start();

    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || empty($_SESSION['user_id']) || empty($_SESSION['user_name'])) {
        header("Location: ./inloggen/inloggen.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Panel | klanten</title>
    </head>
    <body>
        <h1>Klant aanmaken:</h1>

        <form action="aanmaken_script.php" method="post">
            <table>
                <tr>
                    <td>Naam:</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Telefoonnummer:</td>
                    <td><input type="phone" name="phone" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btn"></td>
                </tr>
            </table>
        </form>

        <button onclick="location.href = 'klanten.php';"><- Terug</button>
    </body>
</html>