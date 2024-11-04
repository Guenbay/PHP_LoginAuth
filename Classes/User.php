<?php
include("connect.php");

class User {
    private $email;
    private $role;
    private $conn;

    public function __construct($email, $conn) {
        $this->email = $email;
        $this->conn = $conn;
        $this->setRole();
    }

    private function setRole() {
        $query_student = mysqli_query($this->conn, "SELECT * FROM `student` WHERE email='$this->email'");
        if (mysqli_num_rows($query_student) > 0) {
            $this->role = 'student';
            return;
        }

        $query_teacher = mysqli_query($this->conn, "SELECT * FROM `teacher` WHERE email='$this->email'");
        if (mysqli_num_rows($query_teacher) > 0) {
            $this->role = 'teacher';
            return;
        }

        $query_admin = mysqli_query($this->conn, "SELECT * FROM `admin` WHERE email='$this->email'");
        if (mysqli_num_rows($query_admin) > 0) {
            $this->role = 'admin';
            return;
        }

        $this->role = null; // Keine Rolle gefunden
    }

    public function displayGreeting() {
        if (!$this->role) {
            return "Benutzer nicht gefunden.";
        }

        switch ($this->role) {
            case 'student':
                $query = mysqli_query($this->conn, "SELECT * FROM `student` WHERE email='$this->email'");
                break;
            case 'teacher':
                $query = mysqli_query($this->conn, "SELECT * FROM `teacher` WHERE email='$this->email'");
                break;
            case 'admin':
                $query = mysqli_query($this->conn, "SELECT * FROM `admin` WHERE email='$this->email'");
                break;
        }

        if ($row = mysqli_fetch_array($query)) {
            return "Hello " . $row['firstname'] . ' ' . $row['lastname'] . ":!";
        }

        return "Benutzer nicht gefunden.";
    }
}