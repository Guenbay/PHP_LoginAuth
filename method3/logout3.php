<?php
session_start();
session_unset();  // Alle Session-Variablen löschen
session_destroy();  // Session zerstören

// Weiterleitung zur Login-Seite
header('Location: index.php');
exit();
?>
