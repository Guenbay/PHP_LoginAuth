<?php
session_start(); // Zu Beginn von homepage.php
include('connect.php');  // Datenbankverbindung einbinden
include('Classes/User2.php');  // Die Users-Klasse einbinden

// Eine Instanz der Users-Klasse erstellen
$user = new Users($conn);  // $conn ist die Datenbankverbindung aus connect.php

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
        <p style="font-size: 80%; font-weight:bold">
        Hello  
        <?php 
        if (isset($_SESSION['email'])) {
            // Benutzernamen des Lehrers holen
            $email = $_SESSION['email'];
            $teacherName = $user->getTeacherName($email);
            $studentName = $user->getStudentName($email);
            $adminName = $user->getAdminName($email);

            // Wenn ein Name gefunden wurde, wird dieser angezeigt
            if ($teacherName) {
                echo $teacherName;
            } elseif ($studentName) {
                echo $studentName;
            } elseif ($adminName) {
                echo $adminName;
            }            
            else {
                echo "Nutzer nicht gefunden";
            }
        }
        ?>
        </p>

        <a href="logout2.php">Logout</a>
        
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
