<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'alphadatabase1.mysql.database.azure.com', 'alpha01@alphadatabase1', 'JBIgsg12', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
?>
