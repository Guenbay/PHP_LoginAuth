<?php
session_start();
include ("connect.php")


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <title>Register & Login</title>
</head>
<body>

    <div class="container" id="signUp" style="display:none">
        <h1 class="form-title">Registrieren</h1>
        <p>Du kannst dich hier registrieren!</p>
        <form action="register.php" method="POST">
            <div class="input-group">
                <i class="fas fa-user-circle"></i>
                <input name="firstName" id="firstName" type="text" placeholder="Vorname" required>
                <label for="firstName">Vorname</label>
            </div>
            
            <div class="input-group">
                <i class="fas fa-user-circle"></i>
                <input name="lastName" id="lastName" type="text" placeholder="Nachname" required>
                <label for="lastName">Nachname</label>
            </div>
            
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input name="email" id="email" type="text" placeholder="Email" required>
                <label for="email">E-Mail</label>
            </div>

            <div class="input-group">
                <i class="fas fa-key"></i>
                <input name="password" id="password" type="text" placeholder="Passwort" required>
                <label for="password">Passwort</label>
            </div>

            <div class="input-group">
                <select name="rolle" id="rolle">
                    <option value="student">Schüler</option>
                    <option value="teacher">Lehrer</option>
                </select>
                
                <label for="rolle">Rolle auswählen</label>
            </div>
            
            <input type="submit" class="btn" value="Registrieren" name="signUp">
        </form>
        
        <p class="or">
            ---Melde dich mit Social-Media-Account an---
        </p>

        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div>

        <div class="links">
            <p>Bereits Registriert?</p>
            <button id="signInButton">Anmelden</button>
        </div>
    </div>

</section>

<div class="container" id="signIn">
    <!--Flash-Message Container-->
    <?php if (isset ($_SESSION['message'])): ?>
        <div class="flash-message-container ">            
            <div class="alert alert-success">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']); // Lösche die Nachricht, damit sie nicht bei einem Refresh erneut anmgezeigt wird
                    unset($_SESSION['message_type']); // Lösche die Nachricht, damit sie nicht bei einem Refresh erneut angezeigt wird.
                ?>
            </div>
        </div>
    <?php endif; ?>
 
    <h1 class="form-title">Anmelden</h1>
    <form action="login.php" method="POST">
    
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input name="email" id="email" type="text" placeholder="Email" required>
            <label for="email">E-Mail</label>
        </div>

        <div class="input-group">
            <i class="fas fa-key"></i>
            <input name="password" id="password" type="password" placeholder="Passwort" required>
            <label for="password">Passwort</label>
        </div>

        <p class="recover">
            <a href="#">Passwort vergessen?</a>
        </p>
        
        <input type="submit" class="btn" value="Anmelden" name="signIn">
    </form>
    
    <p class="or">
        ---Melde dich mit Social-Media-Account an---
    </p>

    <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
    </div>

    <div class="links">
        <p>Noch kein Account? - Registriere dich jetzt!</p>
        <button id="signUpButton">Registrieren</button>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>