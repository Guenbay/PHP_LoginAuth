<?php
class User {
    private $conn; // Die Datenbankverbindung
    private $email;
    private $password;
    private $userType;

    // Konstruktor, um die Datenbankverbindung zu setzen
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Methode zum Setzen der E-Mail und des Passworts für den Login
    public function setCredentials($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    // Methode, um den Benutzertyp zu ermitteln und zu überprüfen
    public function login() {
        // Tabellen für verschiedene Benutzertypen
        $tables = ['admin', 'teacher', 'student'];

        // Überprüfen, in welcher Tabelle die E-Mail existiert
        foreach ($tables as $table) {
            $query = mysqli_query($this->conn, "SELECT * FROM $table WHERE email='$this->email' AND password='$this->password'");
            if ($row = mysqli_fetch_array($query)) {
                $_SESSION['email'] = $this->email;
                $_SESSION['user_type'] = $table; // Den Benutzertyp (Tabelle) in der Session speichern
                $this->userType = $table; // Setzen des Benutzertyps
                return true;
            }
        }

        return false; // Benutzer nicht gefunden
    }

    // Methode, um den Benutzernamen basierend auf dem Benutzertyp abzurufen
    public function getUserName() {
        if (isset($_SESSION['email'])) {
            $query = mysqli_query($this->conn, "SELECT * FROM $_SESSION[user_type] WHERE email='{$_SESSION['email']}'");
            if ($row = mysqli_fetch_array($query)) {
                return $row['firstname'] . ' ' . $row['lastname'];
            }
        }
        return "Unbekannt";
    }

    // Methode, um den Benutzertyp abzurufen
    public function getUserType() {
        return isset($_SESSION['user_type']) ? $_SESSION['user_type'] : null;
    }

    // Logout-Methode, um den Benutzer abzumelden
    public function logout() {
        session_unset(); // Alle Session-Variablen löschen
        session_destroy(); // Session zerstören
    }
}
?>
