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
        // Benutzer-Tabellen für verschiedene Benutzertypen
        $tables = ['admin', 'teacher', 'student'];

        // Überprüfen, in welcher Tabelle die E-Mail existiert
        foreach ($tables as $table) {
            // Verwende Prepared Statements, um SQL-Injektionen zu verhindern
            $stmt = $this->conn->prepare("SELECT * FROM $table WHERE email = ?");
            $stmt->bind_param("s", $this->email); // 's' steht für String
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                // Überprüfen, ob das Passwort mit dem gespeicherten Hash übereinstimmt
                if (password_verify($this->password, $row['password'])) {
                    $_SESSION['email'] = $this->email;
                    $_SESSION['user_type'] = $table; // Den Benutzertyp (Tabelle) in der Session speichern
                    $this->userType = $table; // Setzen des Benutzertyps
                    return true;
                }
            }
        }

        return false; // Benutzer nicht gefunden oder falsches Passwort
    }

    // Methode, um den Benutzernamen basierend auf dem Benutzertyp abzurufen
    public function getUserName() {
        if (isset($_SESSION['email'])) {
            $table = $_SESSION['user_type']; // Den Benutzertyp (Tabelle) aus der Session holen
            $stmt = $this->conn->prepare("SELECT * FROM $table WHERE email = ?");
            $stmt->bind_param("s", $_SESSION['email']);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
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
