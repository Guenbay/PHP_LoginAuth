<?php
    session_start();
    include("connect.php")
    
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
        
        Hello <?php 
        if(isset($_SESSION['email'])) 
        {
            $email=$_SESSION['email'];
            $query_student=mysqli_query($conn, "SELECT student.* FROM `student` WHERE student.email='$email'");
            $query_teacher=mysqli_query($conn, "SELECT teacher.* FROM `teacher` WHERE teacher.email='$email'");
            $query_admin=mysqli_query($conn, "SELECT admin.* FROM `admin` WHERE admin.email='$email'");

            while($row=mysqli_fetch_array($query_student))
            {
                echo $row['firstName'].' '.$row['lastName'];
            }

            while($row=mysqli_fetch_array($query_teacher))
            {
                echo $row['firstname'].' '.$row['lastname'];
            }

            while($row=mysqli_fetch_array($query_admin))
            {
                echo $row['firstname'].' '.$row['lastname'];
            }
        }
        ?>
        :!
        </p>
        <a href="logout.php">Logout</a>
        
        <div class="dashboard">
            <p>hier ist das Dashboard</p>
            <br>
            <p>Zum <a href="#">Unterricht</a></p>
            <tr>
                <td> <button>1.SG</button> </td>
                <td> <button>2.SG</button> </td>
                <td> <button>3.SG</button> </td>
            </tr>
        </div>
    
    </div>

</body>
</html>