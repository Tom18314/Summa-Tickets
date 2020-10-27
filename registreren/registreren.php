<?php
    session_start();

    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && !empty($_SESSION['user_id']) && !empty($_SESSION['user_name'])) {
        header("Location: ../panel.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inloggen</title>
    </head>
    <body>
        <h1>Registreren:</h1>

        <form action="registreren_script.php" method="post">
            <table>
                <tr>
                    <td>Gebruikersnaam:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Wachtwoord:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btn"></td>
                </tr>
            </table>
        </form>

    </body>
</html>