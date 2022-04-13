<?php
require_once("conn.php");

$tytul = $_POST["tytul"];
$gatunek = $_POST["gatunek"];
$rok = $_POST["rok"];

$conn = new Conn("dane");

$conn->query("INSERT INTO filmy VALUES NULL");

// test