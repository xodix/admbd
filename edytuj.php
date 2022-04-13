<?php
$id;
if (isset($_GET["id"])) {
	$id = $_GET["id"];
} else {
	die("There is no user to edit");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edytuj <?php echo $id  ?></title>
</head>

<body>
	<form action="edituser.php" method="POST">
		<?php
		function print_input(string $key, string $val, bool $dis = false)
		{
			$key = htmlentities($key);
			$val = htmlentities($val);
			$dis = $dis ? "disabled" : "";

			echo <<<END
				<label for="$key">$key:</label>
				<input id="$key" value="$val" name="$key" $dis>
				<br>
			END;
		}

		require_once("conn.php");

		$conn = new Conn("filmoteka");
		$film = $conn->query("SELECT * FROM filmy WHERE `id`=%d", [$id]);
		$gatunki = $conn->query("SELECT * FROM gatunki");
		$rezyserzy = $conn->query("SELECT * FROM rezyserzy");
		$film = $film[0];

		echo "<input type='hidden' name='id' value='id'";
		print_input("id", $film['id'], true);
		echo '<label for="gatunek">gatunek</label><select name="gatunek" id="gatunek">';
		foreach ($gatunki as $key => $val) {
			echo '<option value="' . $val["id"] . '">' . $val["nazwa"] . '</option>';
		}
		echo "</select><br>";
		echo '<label for="rezyser">rezyser</label><select name="rezyser" id="rezyser">';
		foreach ($rezyserzy as $key => $val) {
			echo '<option value="' . $val["id"] . '">' . $val["nazwisko"] . '</option>';
		}
		echo "</select><br>";
		print_input("tytul", $film['tytul']);
		print_input("rok", $film['rok']);
		print_input("ocena", $film['ocena']);
		?>
		<button>Edytuj</button>
	</form>
</body>

</html>