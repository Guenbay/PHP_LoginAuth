<?php
session_start();
include('connect.php'); // Verbindung zur Datenbank

// Wenn das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Tabellen für verschiedene Benutzertypen
    $tables = ['admin', 'teacher', 'student'];
    $userType = null;

    // Überprüfen, in welcher Tabelle die E-Mail existiert
    foreach ($tables as $table) {
        $query = mysqli_query($conn, "SELECT * FROM $table WHERE email='$email' AND password='$password'");
        if ($row = mysqli_fetch_array($query)) {
            // Wenn ein Benutzer gefunden wird, speichern wir den Benutzertyp
            $_SESSION['email'] = $email;
            $_SESSION['user_type'] = $table; // Den Benutzertyp (Tabelle) in der Session speichern
            $userType = $table;  // Speichern des Benutzertyps
            break;  // Beenden der Schleife, wenn ein Benutzer gefunden wurde
        }
    }

    // Wenn ein Benutzer gefunden wurde
    if ($userType) {
        // Weiterleitung zur Homepage
        header('Location: homepage4.php');
        exit();
    } else {
        // Fehlerausgabe, wenn keine Übereinstimmung gefunden wurde
        echo "Ungültige Anmeldedaten!";
        
    }
}
?>

<a href="index.php">Zurück zur Anmeldung</a>
