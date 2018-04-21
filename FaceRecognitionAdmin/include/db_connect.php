<?php
$host = 'localhost';
$username = 'root';
$password = 'toor';

$db=mysqli_connect($host, $username, $password) or die('Unable to connect to database.Check the parameters.');

$query = "CREATE DATABASE IF NOT EXISTS face_recognition";
mysqli_query($db, $query);

mysqli_select_db($db,'face_recognition') or die(mysqli_error($db));

?>
