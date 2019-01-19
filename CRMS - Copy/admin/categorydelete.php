<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM category WHERE id='$id'");

//redirecting to the display page (index.php in our case)
echo "<script>window.location.href='detailadd.php';</script>";
?>