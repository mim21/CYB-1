<?php
session_start();
include ('/var/www/html/params.php');

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$user = $_SESSION["user"];
$z = $x - $y;

$conn = mysqli_connect("$DB_URL","$DB_USER","$DB_PWD","$DB_NAME");
$sql = "INSERT INTO log(Number1, Number2, Result,UserID,Timestamp) VALUES($x,$y,$z,'$user',now())";
mysqli_query($conn, $sql);
//echo(mysqli_error($conn));
mysqli_close($conn);


echo ($z);