<?php

include 'config.php';

$id = $_POST['id'];

$sql = "DELETE FROM guestbook WHERE ID=$id";

if (mysqli_query($conn, $sql)) {
    header("location:/crud");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>