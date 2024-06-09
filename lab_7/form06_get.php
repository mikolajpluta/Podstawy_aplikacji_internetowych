<?php
session_start();

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

$sql = "SELECT * FROM pracownicy";
$result = $link->query($sql);
echo "<ul>";
foreach ($result as $v) {
    echo $v["ID_PRAC"] . " " . $v["NAZWISKO"] . "<br/>";
}
echo "</ul>";

echo "<a href='form06_post.php'>Dodaj nowego pracownika</a>";

$result->free();
$link->close();
?>
