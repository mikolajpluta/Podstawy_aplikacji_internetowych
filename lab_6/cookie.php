<?php
session_start();
require 'funkcje.php';

// Odbierz przesłany czas życia ciasteczka
if (isset($_GET['czas'])) {
    // Konwersja czasu z sekund na dni
    $czas_zycia = (int)$_GET['czas'];
    
    // Ustawienie ciasteczka
    setcookie("moje_ciasteczko", "wartosc_ciasteczka", time() + $czas_zycia, "/");
    echo "Ciasteczko zostało utworzone i będzie ważne przez $czas_zycia sekund.";
} else {
    echo "Wystąpił błąd. Czas życia ciasteczka nie został przesłany.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>
<body>
    <!-- Hiperłącze "wstecz" przenoszące użytkownika na stronę index.php -->
    <p><a href="index.php">Wstecz</a></p>
</body>
</html>
