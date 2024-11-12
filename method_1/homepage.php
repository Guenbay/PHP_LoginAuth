<?php
session_start(); // Zu Beginn von homepage.php
include ('connect.php');
//include("Classes/User.php");
// Hauptlogik im HTML
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
        //$user = ['admin','teacher','student'];
        //Lehrer
            if(isset($_SESSION['email']))
            {
                $email=$_SESSION['email'];
                $query=mysqli_query($conn, "SELECT * FROM teacher WHERE teacher.email='$email'");
                    while($row=mysqli_fetch_array($query))
                    {
                    echo $row['firstname'].' '.$row['lastname'];
                    }
            }
            //Schüler
            if(isset($_SESSION['email']))
            {
                $email=$_SESSION['email'];
                $query=mysqli_query($conn, "SELECT * FROM student WHERE student.email='$email'");
                    while($row=mysqli_fetch_array($query))
                    {
                    echo $row['firstname'].' '.$row['lastname'];
                    }
            }
            //Admin
            if(isset($_SESSION['email']))
            {
                $email=$_SESSION['email'];
                $query=mysqli_query($conn, "SELECT * FROM admin WHERE admin.email='$email'");
                    while($row=mysqli_fetch_array($query))
                    {
                    echo $row['firstname'].' '.$row['lastname'];
                    }
            }
            ?>
      </p>

        <a href="logout.php">Logout</a>
        
        <div class="dashboard">
            <p>hier ist das Dashboard</p>
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