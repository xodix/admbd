<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./styl1.css">
	<title>Document</title>
</head>

<body>
	<div class="flex">
		<div id="lewo">
			<nav>
				<h3>Dostępne gatunki filmu</h3>
				<ol>
					<li>Sci-Fi</li>
					<li>animacja</li>
					<li>dramat</li>
					<li>horror</li>
					<li>komedia</li>
				</ol>
				<p>
					<a href="kadr.jpg" download>Pobierz obraz</a>
				</p>
				<p>
					<a href="repertuar-kin.pl" target="_blank">
						Sprawdź repertuar kin
					</a>
				</p>
			</nav>
		</div>
		<div id="prawo">
			<h1 id="b1">FILMOTEKA</h1>
			<form id="b2" action=" add.php" method="POST">
				Tytuł <input type="text" required name="tytul" />
				<br>
				Gatunek Filmu:
				<select name="gatunek">
					<?php
					require_once("conn.php");

					$conn = new Conn("dane");
					$arr = $conn->query("SELECT distinct `nazwa` from `gatunki`");


					foreach ($arr as $key => $val) {
						echo $key . "<br>" . $val;
						$name = htmlentities($val["nazwa"]);
						echo <<<END
							<option>
								$name
							</option>
						END;
					}
					?>
				</select>
				<br>
				Rok prdukcji: <input required type="number" name="rok" min="1895">
				<br>
				Ocena: <input required type="number" step="any" name="ocena" min="0" max="6">
				<br>
				<button type="reset">CZYŚĆ</button>
				<button type="submit">DODAJ</button>
			</form>
			<div id="b3">
				<img src="./kadr.jpg" width="300" alt="zdjęcia filmowe">
			</div>
		</div>
	</div>
	<footer>
		<p>Autor strony Bartłomiej Deska</p>
	</footer>
</body>

</html>