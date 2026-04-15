<?php
include 'db.php';
if (isset($_GET['id'])) {
    $stmt = $db->prepare("DELETE FROM knihy WHERE id = :id");
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
}
header("Location: index.php");
?>