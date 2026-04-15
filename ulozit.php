<?php
include 'db.php';
if ($_POST) {
    $stmt = $db->prepare("INSERT INTO knihy (nazev, autor, strany) VALUES (:n, :a, :s)");
    $stmt->bindValue(':n', $_POST['nazev']);
    $stmt->bindValue(':a', $_POST['autor']);
    $stmt->bindValue(':s', $_POST['strany']);
    $stmt->execute();
}
header("Location: index.php");
?>