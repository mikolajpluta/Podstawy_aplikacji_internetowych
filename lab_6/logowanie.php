<?php
session_start();
require 'funkcje.php';

// Sprawdź, czy formularz został przesłany
if (isset($_POST['zaloguj'])) {
    // Odbierz dane z pól formularza i przetestuj je
    $login = test_input($_POST['login']);
    $haslo = test_input($_POST['haslo']);

    // Sprawdź poprawność danych logowania
    if (($login == $osoba1->login && $haslo == $osoba1->haslo) || ($login == $osoba2->login && $haslo == $osoba2->haslo)) {
        $loggedUser = ($login == $osoba1->login) ? $osoba1 : $osoba2;

        // Utwórz zmienne sesji
        $_SESSION['zalogowanyImie'] = $loggedUser->imieNazwisko;
        $_SESSION['zalogowany'] = 1;

        // Przekieruj użytkownika na podstronę user.php
        header("Location: user.php");
        exit();
    } else {
        // Przekieruj użytkownika na stronę index.php z błędnym logowaniem
        header("Location: index.php?error=1");
        exit();
    }
} else {
    // Jeśli formularz nie został przesłany, przekieruj na stronę główną
    header("Location: index.php");
    exit();
}
?>
