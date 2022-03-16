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
			$err = $conn->close();
			die("Connection error: $err");
		}

		mysqli_set_charset($conn, "utf8mb4_bin");

		if ($params) {
			$this->sanitize_params($query, $params, $conn);
		}

		$req = $conn->query($query);

		if (!$req) {
			$conn->close();
			echo mysqli_error($conn);
			exit();
		}

		$res = $req->fetch_all(MYSQLI_ASSOC);

		if ($res) {
			if (is_bool($res)) {
				$conn->close();
				return [];
			}

			$conn->close();
			return $res;
		} else {
			$err = $conn->connect_error;
			$err = $conn->close();
			die("Error while making a query: $err");
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
