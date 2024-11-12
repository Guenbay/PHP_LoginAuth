<?php
session_start(); // Zu Beginn von homepage.php
include('connect.php');  // Verbindung zur Datenbank

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['email'])) {
    header('Location: login3.php');
    exit();
}

$email = $_SESSION['email']; // Die E-Mail des Benutzers
$userType = $_SESSION['user_type']; // Der Benutzertyp aus der Session (admin, teacher, student)

// SQL-Abfrage, um den Benutzernamen basierend auf dem Benutzertyp zu holen
$query = mysqli_query($conn, "SELECT * FROM $userType WHERE email='$email'");

if ($row = mysqli_fetch_array($query)) {
    $firstName = $row['firstname'];
    $lastName = $row['lastname'];
} else {
    $firstName = "Unbekannt";
    $lastName = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div style="text-align: center; padding: 15%;">
        <p style="font-size: 80%; font-weight: bold">
            Hallo, <?php echo $firstName . ' ' . $lastName; ?>
        </p>

        <a href="logout3.php">Logout</a>
        
        <div class="dashboard">
            <p>Hier ist das Dashboard</p>
            <br>
            <p>Zum <a href="#">Unterricht</a></p>
            <tr>
                <td><button>1.SG</button></td>
                <td><button>2.SG</button></td>
                <td><button>3.SG</button></td>
            </tr>
        </div>
    
    </div>
</body>
</html>
