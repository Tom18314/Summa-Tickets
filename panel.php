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
        <title>Panel</title>
    </head>
    <body>
        <?php echo "<h3>Gebruikersnaam: $user_name</h3>"; ?>

        <button onclick="location.href = './klanten/klanten.php';">Klanten</button>
        <button onclick="location.href = './tickets/tickets.php';">Tickets</button>
        <button onclick="location.href = './uitloggen.php';">Uitloggen</button>
    </body>
</html>