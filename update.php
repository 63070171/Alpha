<?php

include 'config.php';

$id = $_POST['id'];
$name = $_POST['name'];
$comment = $_POST['comment'];


$sql = "UPDATE guestbook SET Name = '$name', Comment = '$comment' WHERE ID = $id";

//UPDATE `itflab`.`guestbook` SET `Name` = 'a', `Comment` = 'a' WHERE `ID` = 4

if (mysqli_query($conn, $sql)) {
    header("location:/crud");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>