<?php
$mysqli = new mysqli("localhost", "root", "", "crudoperation");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
