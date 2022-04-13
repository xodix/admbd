<?php
require_once("conn.php");

$id = $_POST["id"];
$gatunek = $_POST["gatunek"];
$rezyser = $_POST["rezyser"];
$tytul = $_POST["tytul"];
$rok = $_POST["rok"];
$ocena = $_POST["ocena"];

$query = "UPDATE `filmy`
SET
	`id`=%d,
	`gatunki_id`=%d,
	`rezyserzy_id`=%d,
	`tytul`='%s',
	`rok`=%d,
	`ocena`=%d
WHERE `id`=%d";

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
