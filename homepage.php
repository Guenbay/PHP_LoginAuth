<?php
    session_start();
    include("connect.php");
    include("Classes/User.php");
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
        <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $user = new User($email, $conn);
            echo $user->displayGreeting();
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