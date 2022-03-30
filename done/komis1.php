<?php
require_once("./conn.php");

$conn = new Conn("komis");
$res = $conn->query("SELECT model, rocznik, wartosc, przebieg, silnik FROM `samochody`");

for ($i = 0; $i < count($res); $i++) {
	$arr = $res[$i];

	$model = $arr["model"];
	$rocznik = $arr["rocznik"];
	$wartosc = $arr["wartosc"];
	$przebieg = $arr["przebieg"];
	$silnik = $arr["silnik"];

	echo "$model rocznik: $rocznik, wartość: $wartosc, przebieg: $przebieg ";

	switch ($silnik) {
		case 'B':
			echo "benzyna";
			break;
		case 'D':
			echo "diesel";
			break;
		case 'G':
			echo "gaz";
			break;
		case 'BG':
			echo "benzyna gaz";
			break;

		default:
			echo "brak danych o silniku";
			break;
	}

	echo "<hr>";
}
