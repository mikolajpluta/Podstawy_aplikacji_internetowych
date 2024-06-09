<?php
session_start();

// Wyświetlenie komunikatu o sukcesie lub błędzie
if (isset($_SESSION['success'])) {
    echo "<p style='color: green;'>".$_SESSION['success']."</p>";
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>".$_SESSION['error']."</p>";
    unset($_SESSION['error']);
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <form action="form06_redirect.php" method="POST">
        id_prac <input type="text" name="id_prac">
        nazwisko <input type="text" name="nazwisko">

        <input type="submit" value="Wstaw">
        <input type="reset" value="Wyczysc">
    </form>
    <a href="form06_get.php">Lista pracowników</a>
</body>
</html>
