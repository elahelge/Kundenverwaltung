<?php


function pruefeLogin(): void
{
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
}
 

function naechsteKundennummer($conn)
{

    $sqlMaxKundennummer = "SELECT MAX(kundennummer) AS hoechste_nummer FROM kunden";

    $result = mysqli_query($conn, $sqlMaxKundennummer);

    $row = mysqli_fetch_assoc($result);

    $hoechsteKundennummer = $row['hoechste_nummer'];

    $naechsteKundennummer = $hoechsteKundennummer + 1;

    return $naechsteKundennummer;

}

function kundeHinzufuegen($conn)
{
    $vorname = mysqli_real_escape_string($conn, $_POST["vorname"]);
    $nachname = mysqli_real_escape_string($conn, $_POST["nachname"]);
    $geburtsdatum = mysqli_real_escape_string($conn, $_POST["geburtsdatum"]);
    $geschlecht = mysqli_real_escape_string($conn, $_POST["geschlecht"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $strasse = mysqli_real_escape_string($conn, $_POST["strasse"]);
    $hausnummer = mysqli_real_escape_string($conn, $_POST["hausnummer"]);
    $postleitzahl = mysqli_real_escape_string($conn, $_POST["postleitzahl"]);
    $ort = mysqli_real_escape_string($conn, $_POST["ort"]);
    $notizen = mysqli_real_escape_string($conn, $_POST["notizen"]);

    $sqlInsert = "
        INSERT INTO kunden (
            vorname, nachname, geburtsdatum, geschlecht, email,
            strasse, hausnummer, postleitzahl, ort, notizen
        ) VALUES (
            '$vorname', '$nachname', '$geburtsdatum', '$geschlecht', '$email',
            '$strasse', '$hausnummer', '$postleitzahl', '$ort', '$notizen'
        )
    ";

    return mysqli_query($conn, $sqlInsert);
}

function kundeLoeschen($conn, $kundennummer)
{
    $sqlDEL = "
    DELETE 
    FROM kunden
    WHERE kundennummer = $kundennummer
    ";

    mysqli_query($conn, $sqlDEL);
}


function kundeAbrufen($conn, $kundennummer)
{
    $sql = "
    SELECT * 
    FROM kunden
    WHERE kundennummer = $kundennummer
    ";

    $result = mysqli_query($conn, $sql); 


    $gefundenerKunde = mysqli_fetch_assoc($result);
    return $gefundenerKunde;
}


?>