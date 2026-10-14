<?php

session_start();

if(!isset($_SESSION["username"]))
{
    header("Location: login.php");
    exit();
}

// Anlegen von Kunden

include "db.php";

$sqlMaxKundennummer = "SELECT MAX(kundennummer) AS hoechste_nummer FROM kunden";

$result = mysqli_query($conn, $sqlMaxKundennummer);

$row = mysqli_fetch_assoc($result);

$hoechsteKundennummer = $row['hoechste_nummer'];

$naechsteKundennummer = $hoechsteKundennummer + 1;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $geburtsdatum = $_POST["geburtsdatum"];
    $geschlecht = $_POST["geschlecht"];
    $email = $_POST["email"];
    $strasse = $_POST["strasse"];
    $hausnummer = $_POST["hausnummer"];
    $postleitzahl = $_POST["postleitzahl"];
    $ort = $_POST["ort"];
    $notizen = $_POST["notizen"];

    $sqlInsert = "
        INSERT INTO kunden (
            vorname,
            nachname,
            geburtsdatum,
            geschlecht,
            email,
            strasse,
            hausnummer,
            postleitzahl,
            ort,
            notizen
        ) VALUES (
            '$vorname',
            '$nachname',
            '$geburtsdatum',
            '$geschlecht',
            '$email',
            '$strasse',
            '$hausnummer',
            '$postleitzahl',
            '$ort',
            '$notizen'
        )
    ";      
    
    mysqli_query($conn, $sqlInsert);

    header("Location: kunden.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="de-DE">
    
<head>
    <meta charset="utf-8">
    <title>Neuer Kunde</title>

    <link rel="stylesheet" href="main.css">
    <script src="main.js" defer></script>
</head>

<body id="kundenAnlegen">
    
    <nav>
        <a href="kunden.php">Kundenübersicht</a>
        <a href="kunden-anlegen.php">Kunde anlegen</a>
        <a href="logout.php">Logout</a>
    </nav>

    <h1>Kundenverwaltung</h1>
    
    <h2>Neuen Kunden anlegen</h2>

    <!--Kundenformular-->
    <form id="kundenForm" method="post">

        <fieldset>
            <legend>Stammdaten</legend>

            <div>
                <label for="kundennummer">Kundennummer</label>
                <span>K-</span>
                <input
                    id="kundennummer"
                    name="kundennummer"
                    value="<?= str_pad($naechsteKundennummer, 3, "0", STR_PAD_LEFT) ?>"
                    type="text"
                    readonly
                >
            </div>

            <div>
                <label for="vorname">Vorname</label>
                <input
                    id="vorname"
                    name="vorname"
                    type="text"
                    required
                >
            </div>

            <div>
                <label for="nachname">Nachname</label>
                <input
                    id="nachname"
                    name="nachname"
                    type="text"
                    required
                >
            </div>

            <div>
                <label for="geburtsdatum">Geburtsdatum</label>
                <input
                    id="geburtsdatum"
                    name="geburtsdatum"
                    type="date"
                    required
                >
            </div>

            <div>
                <label for="geschlecht">Geschlecht</label>
                <select name="geschlecht" id="geschlecht" required>
                    <option value="">Bitte Wählen...</option>
                    <option value="m">Männlich</option>
                    <option value="w">Weiblich</option>
                    <option value="d">Divers</option>
                </select>
            </div>

            <div>
                <label for="email">E-Mail-Adresse</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                >
            </div>
        </fieldset>

        <fieldset>
            <legend>Adresse</legend>

            <div>
                <label for="strasse">Straße</label>
                <input
                    id="strasse"
                    name="strasse"
                    type="text"
                    required
                >
            </div>
            
            <div>
                <label for="hausnummer">Hausnummer</label>
                <input
                    id="hausnummer"
                    name="hausnummer"
                    type="text"
                    required
                >
            </div>

            
            <div>
                <label for="postleitzahl">Postleitzahl</label>
                <input
                    id="postleitzahl"
                    name="postleitzahl"
                    type="text"
                    maxlength="5"
                    required
                >
            </div>
            
            
            <div>
                <label for="ort">Ort</label>
                <input
                    id="ort"
                    name="ort"
                    type="text"
                    required
                >
            </div>

        </fieldset>

        <fieldset>
            <legend>Notizen</legend>

            <div>
                <label for="notizen"></label>
                <textarea
                    id="notizen"
                    name="notizen"
                    rows="5"
                ></textarea>
            </div>
        </fieldset>
        
        <div class="button">
            <button type="submit">Kunde anlegen</button>
        
            <button type="button">Abbrechen</button>
        </div>

    </form>
</body>
</html>