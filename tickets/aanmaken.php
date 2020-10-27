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
        <h1>Ticket aanmaken:</h1>

        <form action="aanmaken_script.php" method="post">
            <table>
                <tr>
                    <td>Omschrijving:</td>
                    <td><input type="text" name="omschrijving" required></td>
                </tr>
                <tr>
                    <td>Prioriteit:</td>
                    <td>
                        <select name="prioriteit" required>
                            <option value="">Selecteer een prioriteit</option>
                            <option value="Hoog">Hoog</option>
                            <option value="Normaal">Normaal</option>
                            <option value="Laag">Laag</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Klant:</td>
                    <td>
                        <select name="klant" required>
                            <option value="">Selecteer een klant</option>

                            <?php
                                $conn = new mysqli("localhost", "root", "", "summa");

                                $sql = $conn->query("SELECT * FROM klanten");
                                if ($sql->num_rows > 0) {
                                    while ($row = $sql->fetch_assoc()){
                                        echo "<option value='$row[name]'>$row[name]</option>";
                                    }
                                }
                                $conn->close();
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="btn"></td>
                </tr>
            </table>
        </form>

        <button onclick="location.href = 'tickets.php';"><- Terug</button>
    </body>
</html>