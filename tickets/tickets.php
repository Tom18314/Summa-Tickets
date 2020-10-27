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
        <title>Panel | tickets</title>
    </head>
    <body>
        <h1>Tickets:</h1>

        <table border="1">
            <tr>
                <td>ID</td>
                <td>Prioriteit</td>
                <td>Omschrijving</td>
                <td>Klant</td>
                <td>Aanmelder</td>
            </tr>

            <?php
                $conn = new mysqli("localhost", "root", "", "summa");

                $sql = $conn->query("SELECT * FROM tickets");
                if ($sql->num_rows > 0) {
                    while ($row = $sql->fetch_assoc()){ ?>
                        <tr>
                            <?php echo "<td>$row[id]</td>
                                        <td>$row[prioriteit]</td>
                                        <td>$row[omschrijving]</td>
                                        <td>$row[klant]</td>
                                        <td>$row[aanmelder]</td>";
                            ?>

                            <td><button onclick="location.href = './verwijder_script.php?id=<?php echo $row['id'] ?>';">Verwijderen</button></td>
                        </tr>
                        <?php
                    }
                }
                $conn->close();
            ?>
        </table>

        <button onclick="location.href = './aanmaken.php';">Ticket aanmaken</button><br>
        <button onclick="location.href = '../panel.php';"><- Terug</button>
    </body>
</html>