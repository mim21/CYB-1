<?php

include 'C:\\AppParams\\params.php';

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$z = $x + $y;

$conn = mysqli_connect("$DB_URL","$DB_USER","$DB_PWD","$DB_NAME");

$sql = "INSERT INTO log(Number1,Number2,Result,UserID) VALUES($x,$y,$z,'anonym')";
mysqli_query($conn,$sql);

mysqli_close($conn);
echo($z);
