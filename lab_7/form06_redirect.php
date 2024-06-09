<?php
session_start();

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    $_SESSION['error'] = "Błąd połączenia z bazą danych.";
    header("Location: form06_post.php");
    exit();
}

if (isset($_POST['id_prac']) &&
    is_numeric($_POST['id_prac']) &&
    is_string($_POST['nazwisko']))
{
    $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
    try {
        $result = $stmt->execute();
        if (!$result) {
            $_SESSION['error'] = "Błąd podczas dodawania pracownika.";
        } else {
            $_SESSION['success'] = "Pracownik został dodany pomyślnie.";
        }
        header("Location: form06_get.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error'] = "Podany identyfikator pracownika już istnieje.";
        header("Location: form06_post.php");
        exit();
    }
    $stmt->close();
} else {
    $_SESSION['error'] = "Niepoprawne dane wprowadzone do formularza.";
    header("Location: form06_post.php");
    exit();
}
?>
