<?php
// Oppretter variabler for tilkoblingsdetaljer til databasen
$servername = "Norwagion_fragrenses"; // Servernavn
$username = "Daniel"; // Brukernavn
$password = "Akademiet99"; // Passord
$database = "database1"; // Databasenavn

// Oppretter tilkobling til databasen
$conn = new mysqli($servername, $username, $password, $database);

// Sjekker om tilkoblingen er vellykket, ellers avsluttes med feilmelding
if ($conn->connect_error) {
    die("Tilkobling mislyktes: " . $conn->connect_error);
}

// Henter brukernavn og passord fra POST-forespørselen
$username = $_POST['username'];
$password = $_POST['password'];

// Lager en SQL-spørring for å hente data fra tabellen 'users' basert på brukernavn og passord
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// Sjekker om det ble returnert én rad (altså én vellykket innlogging)
if ($result->num_rows == 1) {
    echo "Innlogging vellykket. Omdirigerer til instrumentbordet ditt.";
} else {
    echo "Innlogging mislyktes. Vennligst sjekk dine påloggingsopplysninger.";
}

// Lukker tilkoblingen til databasen
$conn->close();
?>
