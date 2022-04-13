<?php
require_once("conn.php");

$id = $_POST["id"];
$gatunek = $_POST["gatunek"];
$rezyser = $_POST["rezyser"];
$tytul = $_POST["tytul"];
$rok = $_POST["rok"];
$ocena = $_POST["ocena"];

$query = "UPDATE `filmy` SET `id`=%s,`gatunki_id`=%s,`rezyserzy_id`=%s,`tytul`='%s',`rok`=%s,`ocena`=%s WHERE `id`=%s;";


$conn = new Conn("filmoteka");

$conn->query($query, [
	$id,
	$gatunek,
	$rezyser,
	$tytul,
	$rok,
	$ocena,
	$id
]);

echo "Sukces!";
