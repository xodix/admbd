<?php

class Conn
{
	public function __construct(string $db, string $host = "localhost", string $password = "", string $username = "root")
	{
		$this->db = $db;
		$this->host = $host;
		$this->password = $password;
		$this->username = $username;
	}

	public function query(string $query, array $params = null): array
	{
		$conn = new mysqli($this->host, $this->username, $this->password, $this->db);

		if ($err = $conn->connect_error) {
			echo "Error connecting to database: " . $err;
			exit();
		}

		if ($params) {
			for ($i = 0; $i < count($params); $i++) {
				$params[$i] = mysqli_escape_string($conn, htmlentities($params[$i]));
			}

			$query = sprintf($query, ...$params);
		}

		$conn->set_charset("utf8");

		$q = $conn->query($query);

		if (!$q) {
			echo "Query: " . mysqli_error($conn) . "<br><br>";
			echo $query;
			exit();
		}

		if (is_bool($q)) {
			return [];
		}

		$res = $q->fetch_all(MYSQLI_ASSOC);

		if ($res) {
			$conn->close();

			if (is_bool($res)) {
				return [];
			}

			return $res;
		} else {
			return [];
		}
	}

	private function sanitize_params(string &$query, array &$params, Mysqli &$conn): void
	{
		for ($i = 0; $i < count($params); $i++) {
			$params[$i] = mysqli_escape_string($conn, htmlentities($params[$i]));
		}

		$query = sprintf($query, ...$params);
	}
}
