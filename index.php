<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Filmoteka</title>
</head>

<body>
	<table style="border: 1px solid black">
		<tr>
			<th>Tytuł</th>
			<th>Nazwisko reżysera</th>
			<th>Nazwa Gatunku</th>
			<th>Rok</th>
			<th>Ocena</th>
			<th>Działanie</th>
		</tr>
		<?php

		function print_td(string $elem)
		{
			echo "<td>$elem</td>";
		}

		require_once("conn.php");
		$conn = new Conn("filmoteka");
		$dane = $conn->query("SELECT filmy.id, filmy.tytul, filmy.rok, filmy.ocena, gatunki.nazwa, rezyserzy.nazwisko FROM filmy INNER JOIN gatunki ON filmy.gatunki_id=gatunki.id INNER JOIN rezyserzy ON filmy.rezyserzy_id=rezyserzy.id");

		for ($i = 0; $i < count($dane); $i++) {
			$row = $dane[$i];
			$id = $row['id'];

			echo "<tr>";

			print_td($row["tytul"]);
			print_td($row["nazwisko"]);
			print_td($row["nazwa"]);
			print_td($row["rok"]);
			print_td($row["ocena"]);
			print_td("<a href=\"edytuj.php?id=$id\">edytuj</a>|<a href=\"usun.php?id=$id\">usun</a>");

			echo "</tr>";
		}
		?>
	</table>
</body>

</html>