<?php

include 'connect.php';

//Login Admin
if(isset($_POST['signIn']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql_admin = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result_admin = $conn->query($sql_admin);

    if($result_admin->num_rows>0)
    {
        session_start();
        $row=$result_admin->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location: homepage2.php");
        //header("Location: user_homepage.php");
        exit();
    }
    else
    {
        echo "Admin Not found! Falsche Email oder Passwort. ";
    }
}

//Login Lehrer
if(isset($_POST['signIn']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql_teacher = "SELECT * FROM teacher WHERE email='$email' AND password='$password'";
    $result_teacher = $conn->query($sql_teacher);

    if($result_teacher->num_rows>0)
    {
        session_start();
        $row=$result_teacher->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location: homepage2.php");
        exit();
    }
    else
    {
        echo "Teacher Not found! Falsche Email oder Passwort. ";
    }
}

//Login Student
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
        header("Location: homepage2.php");
        exit();
    }
    else
    {
        echo "Student Not found! Falsche Email oder Passwort. ";
        
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmelden</title>
</head>
<body>
    <a href="index.php">Zurück zur Anmeldung</a>
</body>
</html>