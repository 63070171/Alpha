<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'localhost', 'root', '', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
?>