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

// Obsługa przesyłania pliku
if (isset($_FILES['myfile'])) {
    $currentDir = getcwd();
    $uploadDirectory = "/img/";
    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];

    // Sprawdzenie typu pliku
    if (($fileType == "image/png" || $fileType == "image/jpeg") && $fileSize > 0) {
        $uploadPath = $currentDir . $uploadDirectory . $fileName;

        // Przesłanie pliku na serwer
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            echo "Zdjęcie zostało załadowane na serwer FTP.<br>";

            // Wyświetlenie załadowanego obrazu
            echo "<img src='$uploadDirectory$fileName' alt='Zdjęcie użytkownika'><br>";
        } else {
            echo "Wystąpił błąd podczas przesyłania pliku.<br>";
        }
    } else {
        echo "Nieprawidłowy format pliku lub plik jest pusty.<br>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>
<body>
    <?php
        // Wyświetl powitanie dla zalogowanego użytkownika
        echo "<p>Witaj, " . htmlspecialchars($_SESSION['zalogowanyImie']) . "!</p>";
    ?>

    <!-- Formularz wylogowania -->
    <form action="user.php" method="POST">
        <input type="submit" name="wyloguj" value="Wyloguj">
    </form>

    <!-- Formularz przesyłania pliku -->
    <form action="user.php" method="POST" enctype="multipart/form-data">
        <label for="myfile">Wybierz plik do przesłania:</label>
        <input type="file" id="myfile" name="myfile" accept=".jpg, .jpeg, .png"><br>
        <input type="submit" name="upload" value="Prześlij plik">
    </form>

    <!-- Hiperłącza -->
    <p><a href="index.php">Strona główna</a></p>
    <p><a href="user.php">Strona użytkownika</a></p>
</body>
</html>
