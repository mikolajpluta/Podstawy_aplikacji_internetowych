<?php
session_start();
require 'funkcje.php';

// Obsługa wylogowania
if (isset($_POST['wyloguj'])) {
    // Zerowanie zmiennych sesji
    $_SESSION['zalogowany'] = 0;
    $_SESSION['zalogowanyImie'] = "";
    header("Location: index.php");
    exit();
}

// Sprawdź, czy istnieje cookie i wyświetl jego wartość
if (isset($_COOKIE['moje_ciasteczko'])) {
    echo "<p>Wartość ciasteczka: " . htmlspecialchars($_COOKIE['moje_ciasteczko']) . "</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>
<body>
    <h1>Nasz system</h1>

    <!-- Formularz logowania -->
    <form action="logowanie.php" method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>

        <label for="haslo">Hasło:</label>
        <input type="password" id="haslo" name="haslo" required><br><br>

        <input type="submit" name="zaloguj" value="Zaloguj">
    </form>

    <!-- Hiperłącze do strony użytkownika -->
    <p><a href="user.php">Strona użytkownika</a></p>

    <!-- Formularz tworzenia ciasteczka -->
    <form action="cookie.php" method="GET">
        <label for="czas">Czas życia ciasteczka (w sekundach):</label>
        <input type="number" id="czas" name="czas" required><br><br>

        <input type="submit" name="utworzCookie" value="Utwórz Cookie">
    </form>
</body>
</html>
