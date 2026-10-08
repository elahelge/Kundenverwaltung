<?php

// Verbindung zur Datenbank

    $conn = mysqli_connect(
        "localhost",
        "root",
        "",
        "kundenverwaltung"
    );

if(!$conn)
{
    die("Verbindung fehlgeschlagen!");
}

?>