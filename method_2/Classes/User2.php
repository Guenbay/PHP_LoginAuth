<?php
// Stellen Sie sicher, dass die Verbindung zur Datenbank in der Klasse selbst oder extern erfolgt
class Users {
    private $conn;
    private $link;
    // Konstruktor, der die Datenbankverbindung übernimmt
    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    // Methode, um den Namen des Benutzers anhand der E-Mail abzurufen
    public function getTeacherName($email) {
        // SQL-Abfrage, um den Benutzernamen des Lehrers basierend auf der E-Mail zu holen
        $query = mysqli_query($this->conn, "SELECT * FROM teacher WHERE email='$email'");
    
                // Wenn die Abfrage ein Ergebnis liefert, den Namen zurückgeben
        if ($row = mysqli_fetch_array($query)) {
            return $row['firstname'] . ' ' . $row['lastname'];
        }
        return null; // Falls kein Benutzer gefunden wurde, null zurückgeben
    }


    public function getStudentName($email) {
        // SQL-Abfrage, um den Benutzernamen des Lehrers basierend auf der E-Mail zu holen
        $query = mysqli_query($this->conn, "SELECT * FROM student WHERE email='$email'");
    
                // Wenn die Abfrage ein Ergebnis liefert, den Namen zurückgeben
        if ($row = mysqli_fetch_array($query)) {
            return $row['firstname'] . ' ' . $row['lastname'];
        }
        return null; // Falls kein Benutzer gefunden wurde, null zurückgeben
    }

    public function getAdminName($email) {
        // SQL-Abfrage, um den Benutzernamen des Lehrers basierend auf der E-Mail zu holen
        $query = mysqli_query($this->conn, "SELECT * FROM admin WHERE email='$email'");
    
                // Wenn die Abfrage ein Ergebnis liefert, den Namen zurückgeben
        if ($row = mysqli_fetch_array($query)) {
            return $row['firstname'] . ' ' . $row['lastname'];
        }
        return null; // Falls kein Benutzer gefunden wurde, null zurückgeben
    }
}
