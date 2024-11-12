<?php

include 'connect.php';

//Registierung für Schüler
if(isset($_POST['signUp']))
{
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    //$password=md5($password);

    $checkEmailStudent="SELECT * FROM student WHERE email='$email' ";
    $result=$conn->query($checkEmailStudent);
    if($result->num_rows>0)
    {
        echo "Email Adresse existiert bereits!";
    }
    else
    {
        $insertQuery="INSERT INTO student(firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
        
        if($conn->query($insertQuery)==TRUE)
        {
            header("location: index.php");
        }
        else
        {
            echo "Fehler:".$conn->error;
        }
    }
}

////Registrierung für Lehrer und Admin

////Registrierung für Lehrer
//if(isset($_POST['signUp']))
//{
//    $firstName=$_POST['firstName'];
//    $lastName=$_POST['lastName'];
//    $email=$_POST['email'];
//    $password=$_POST['password'];
//    //$password=md5($password);
//
//    $checkEmailTeacher="SELECT * FROM teacher WHERE email='$email' ";
//    $result=$conn->query($checkEmailTeacher);
//    if($result->num_rows>0)
//    {
//        echo "Email Adresse existiert bereits!";
//    }
//    else
//    {
//        $insertQuery="INSERT INTO techer(firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
//        
//        if($conn->query($insertQuery)==TRUE)
//        {
//            header("location: index.php");
//        }
//        else
//        {
//            echo "Fehler:".$conn->error;
//        }
//    }
//}
//
////Registrierung für Admin
//if(isset($_POST['signUp']))
//{
//    $firstName=$_POST['firstName'];
//    $lastName=$_POST['lastName'];
//    $email=$_POST['email'];
//    $password=$_POST['password'];
//    //$password=md5($password);
//
//    $checkEmailAdmin="SELECT * FROM admin WHERE email='$email' ";
//    $result=$conn->query($checkEmailAdmin);
//    if($result->num_rows>0)
//    {
//        echo "Email Adresse existiert bereits!";
//    }
//    else
//    {
//        $insertQuery="INSERT INTO admin(firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
//        
//        if($conn->query($insertQuery)==TRUE)
//        {
//            header("location: index.php");
//        }
//        else
//        {
//            echo "Fehler:".$conn->error;
//        }
//    }
//}


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