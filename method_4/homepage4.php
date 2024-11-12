<?php
session_start(); // Zu Beginn von homepage.php
include('connect.php');  // Verbindung zur Datenbank
include('Classes/User4.php');  // Die User-Klasse einbinden

// Erstelle eine Instanz der User-Klasse
$user = new User($conn);

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['email'])) {
    header('Location: login4.php');
    exit();
}

// Den Benutzernamen und Benutzertyp abrufen
$userName = $user->getUserName();
$userType = $user->getUserType();
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
            Hallo, <?php echo $userName; ?>
        </p>

        <a href="logout4.php">Logout</a>
        
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
