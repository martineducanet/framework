<?php
$db = new PDO('sqlite:knihovna.db');
$db->exec("CREATE TABLE IF NOT EXISTS knihy (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nazev TEXT,
    autor TEXT,
    strany INTEGER
)");
?>