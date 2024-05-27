<?php

include 'connect.php';

if(isset($_POST['signUp']))
{
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    //$password=md5($password);

    $checkEmail="SELECT * FROM student WHERE email='$email' ";
    $result=$conn->query($checkEmail);
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

if(isset($_POST['signIn']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    //$password=md5($password);

    $sql = "SELECT * FROM student WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows>0)
    {
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location: homepage.php");
        exit();
    }
    else
    {
        echo "Not found! Falsche Email oder Passwort";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not found</title>
</head>
<body>
    <a href="index.php">Zurück zur Anmeldung</a>
</body>
</html>