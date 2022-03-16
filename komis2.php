<?php
require_once("conn.php");
$conn = new Conn("komis");

$res = $conn->query("SELECT * FROM model");
