<?php

session_start();

include "db.php";
require_once __DIR__ . "/funktionen.php";

$fehlermeldung = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sqlLogin = "SELECT * FROM benutzer WHERE benutzername = '$username'";

    $result = mysqli_query($conn, $sqlLogin);

    $benutzer = mysqli_fetch_assoc($result);

    $fehlermeldung = login($benutzer, $password);

}

?>






 



<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Kundenverwaltung">
    <title>Kundenverwaltung</title>

    <link rel="stylesheet" href="main.css">
    <script src="main.js" defer></script>
</head>  

<body id="login">

    <h1>Kundenverwaltung</h1>

    <!-- Login Modul -->
    

    <form id="loginForm" method="post">

        <fieldset>

            <legend><h2>Login</h2></legend>


            <div>
                <label for="username">Benutzername</label>
                <input
                    id="username"
                    name="username"
                    type="text"
                    required
                >
            </div>
            
            
            <div>
                <label for="password">Passwort</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                > 
                <?php 
                if(!empty($fehlermeldung)) 
                {
                    echo '<p class="fehler">' .$fehlermeldung. '</p>';
                }
                ?>
            </div>

            

        </fieldset>

        <div class="button">
            <button type="submit">Login</button>
        </div>

    </form>

</body>
</html>
