<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_abadi');

if (!$conn) die("Connection failed: " . mysqli_connect_error());

return $conn;