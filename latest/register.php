<?php
session_start();
include 'connect.php';

//Registierung für Schüler
if(isset($_POST['signUp']))
{
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['rolle'];
    //$password=md5($password);


    // Überprüfen, ob die E-Mail bereits existiert
    if ($role == 'student') 
        {
            // Überprüfen, ob der Schüler bereits existiert
            $checkEmail = "SELECT * FROM student WHERE email='$email'";
        } 
    elseif ($role == 'teacher') 
        {
            // Überprüfen, ob der Lehrer bereits existiert
            $checkEmail = "SELECT * FROM teacher WHERE email='$email'";
        }

    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) 
        {
            $_SESSION['message'] = "Email Adresse existiert bereits!";
            header("Location: index.php");
        } 
    else 
        {
            // Abhängig von der Rolle die Daten in die entsprechende Tabelle einfügen
            if ($role == 'student') 
                {
                    $insertQuery = "INSERT INTO student (firstName, lastName, email, password) 
                                VALUES ('$firstName', '$lastName', '$email', '$password')";
                } 
            elseif ($role == 'teacher')     
                {
                    $insertQuery = "INSERT INTO teacher (firstName, lastName, email, password) 
                                VALUES ('$firstName', '$lastName', '$email', '$password')";
                }

            if ($conn->query($insertQuery) === TRUE) 
            {
                $_SESSION['message'] = "Registrierung erfolgreich!";
                header("Location: index.php"); // Erfolgreich, weiter zur Login-Seite
                exit();
            } else {
                $_SESSION['message']= "Fehler. " . $conn->error;
                header("Location: index.php");
                exit();
            }
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
</head>
<body>
    <a href="index.php">Zurück zur Anmeldung</a>
</body>
</html>