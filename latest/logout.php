<?php
session_start();
include('Classes/User.php');  // Die User-Klasse einbinden
$user = new User($conn);
$user->logout();  // Den Benutzer abmelden

// Weiterleitung zur Login-Seite
header('Location: index.php');
exit();
?>
