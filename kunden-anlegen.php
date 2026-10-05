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
        <a href="login.php">Logout</a>
    </nav>

    <h1>Kundenverwaltung</h1>
    
    <h2>Neuen Kunden anlegen</h2>

    <!--Kundenformular-->
    <form id="kundenForm">

        <fieldset>
            <legend>Stammdaten</legend>

            <div>
                <label for="kundennummer">Kundennummer</label>
                <span>K-</span>
                <input
                    id="kundennummer"
                    name="kundennummer"
                    type="text"
                    required
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