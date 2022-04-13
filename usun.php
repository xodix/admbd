<?php
$id;
if (isset($_GET["id"])) {
	$id = $_GET["id"];
} else {
	die("There is no user to delete");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuń <?php echo $id ?></title>
</head>

<body>
	<h1>Czy na pewno chcesz usunąć ten film?</h1>
	<form action="deleteuser.php">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<?php
		require_once("conn.php");
		$conn = new Conn("filmoteka");
		$film = $conn->query("SELECT * FROM filmy WHERE id='%s'", [$id]);
		$film = $film[0];

		foreach ($film as $key => $val) {
			$key = htmlentities($key);
			$val = htmlentities($val);
			echo "<label for='$key'>$key</label>";
			echo "<input disabled id='$key' value='$val'>";
			echo "<br>";
		}
		?>
		<button type="submit">Tak</button>
		<a href="index.php">Nie</a>
	</form>
</body>

</html>