<?php
include_once '../database.php';

$db = new DB('localhost', 'root', '', 'flowerpower', 'utf8mb4');

$articles = $db->deleteArtikel($_GET['artikelcode']);

?>