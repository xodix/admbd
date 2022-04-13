<?php
$id = $_GET['id'];

require_once("conn.php");
$conn = new Conn("filmoteka");
$film = $conn->query("DELETE FROM filmy WHERE id='%s'", [$id]);

header("Location: index.php");
