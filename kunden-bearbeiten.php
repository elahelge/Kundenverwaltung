<?php

include "db.php";

$kundennummer = $_GET["kundennummer"];

$gefundenerKunde = null;

$sql = "
SELECT *
FROM kunden
WHERE kundennummer = $kundennummer
";

$result = mysqli_query($conn, $sql);

$gefundenerKunde = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $geburtsdatum = $_POST["geburtsdatum"];
    $geschlecht = $_POST["geschlecht"];
    $email = $_POST["email"];
    $strasse = $_POST["strasse"];
    $hausnummer = $_POST["hausnummer"];
    $postleitzahl = $_POST["postleitzahl"];
    $ort = $_POST["ort"];
    $kundenstatus = $_POST["kundenstatus"];
    $notizen = $_POST["notizen"];

    $sqlUpdate = "
        UPDATE kunden
        SET
            vorname = '$vorname',
            nachname = '$nachname',
            geburtsdatum = '$geburtsdatum',
            geschlecht = '$geschlecht',
            email = '$email',
            strasse = '$strasse',
            hausnummer = '$hausnummer',
            postleitzahl = '$postleitzahl',
            ort = '$ort',
            kundenstatus = '$kundenstatus',
            notizen = '$notizen'
        WHERE kundennummer = $kundennummer
    ";

    mysqli_query($conn, $sqlUpdate);

    header("Location: kunden.php");
    exit();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kunde bearbeiten</title>

    <link rel="stylesheet" href="main.css">
    <script src="main.js" defer></script>
</head>

<body>
     
    <nav>
        <a href="kunden.php">Kundenübersicht</a>
        <a href="kunden-anlegen.php">Kunde anlegen</a>
        <a href="login.php">Logout</a>
    </nav>

    <h1>Kundenverwaltung</h1>

    <h2>Kunde bearbeiten</h2>

    <form id="kundeBearbeitenForm" method="post">


        
        <fieldset>
            <legend>Stammdaten</legend>


            <div>
                <label for="kundennummer">Kundennummer</label>
                <span>K-</span>

                <input
                    id="kundennummer"
                    name="kundennummer"
                    value="<?= str_pad($gefundenerKunde["kundennummer"], 3, "0", STR_PAD_LEFT) ?>"
                    type="text"
                    readonly
                >
            </div>


            <div>
                <label for="vorname">Vorname</label>

                <input
                    id="vorname"
                    name="vorname"
                    value="<?= $gefundenerKunde["vorname"] ?>"
                    type="text"
                    required
                >
            </div>


            <div>
                <label for="nachname">Nachname</label>

                <input
                    id="nachname"
                    name="nachname"
                    value="<?= $gefundenerKunde["nachname"] ?>"
                    type="text"
                    required
                >
            </div>


            <div>
                <label for="geburtsdatum">Geburtsdatum</label>

                <input
                    id="geburtsdatum"
                    name="geburtsdatum"
                    value="<?= $gefundenerKunde["geburtsdatum"] ?>"
                    type="date"
                    required
                >
            </div>


            <div>
                <label for="geschlecht">Geschlecht</label>

                <select
                    id="geschlecht"
                    name="geschlecht"
                    required
                >
                    <option value="">Bitte wählen...</option>
                    <option value="Männlich" <?= $gefundenerKunde["geschlecht"] === "Männlich" ? "selected" : "" ?>>Männlich</option>
                    <option value="Weiblich" <?= $gefundenerKunde["geschlecht"] === "Weiblich" ? "selected" : "" ?>>Weiblich</option>
                    <option value="Divers" <?= $gefundenerKunde["geschlecht"] === "Divers" ? "selected" : "" ?>>Divers</option>
                </select>
            </div>


            <div>
                <label for="email">E-Mail-Adresse</label>

                <input
                    id="email"
                    name="email"
                    value="<?= $gefundenerKunde["email"] ?>"
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
                    value="<?= $gefundenerKunde["strasse"] ?>"
                    type="text"
                    required
                >
            </div>


            <div>
                <label for="hausnummer">Hausnummer</label>

                <input
                    id="hausnummer"
                    name="hausnummer"
                    value="<?= $gefundenerKunde["hausnummer"] ?>"
                    type="text"
                    required
                >
            </div>


            <div>
                <label for="postleitzahl">Postleitzahl</label>

                <input
                    id="postleitzahl"
                    name="postleitzahl"
                    value="<?= $gefundenerKunde["postleitzahl"] ?>"
                    type="text"
                    required
                >
            </div>


            <div>
                <label for="ort">Ort</label>

                <input
                    id="ort"
                    name="ort"
                    value="<?= $gefundenerKunde["ort"] ?>"
                    type="text"
                    required
                >
            </div>

        </fieldset>


        
        <fieldset>
            <legend>Kundenstatus</legend>

            <div>
                <label for="kundenstatus">Status</label>

                <select
                    id="kundenstatus"
                    name="kundenstatus"
                    required
                >
                    <option value="Aktiv" <?= $gefundenerKunde["kundenstatus"] === "Aktiv" ? "selected" : "" ?>>Aktiv</option>
                    <option value="Inaktiv" <?= $gefundenerKunde["kundenstatus"] === "Inaktiv" ? "selected" : "" ?>>Inaktiv</option>
                </select>
            </div>

        </fieldset>


       
        <fieldset>
            <legend>Notizen</legend>

            <div>
                <label for="notizen">Notizen</label>

                <textarea
                    id="notizen"
                    name="notizen"
                    rows="5"
                ><?= $gefundenerKunde["notizen"] ?></textarea>
            </div>

        </fieldset>


       <div class="button">
            <button type="submit">
                Änderungen speichern
            </button>

            <button
                type="button"
                id="abbrechen"
            >
                Abbrechen
            </button>
        </div>


    </form>

</body>
</html>

