<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];
$no = $_GET['no'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM family WHERE id='$no'");

//redirecting to the display page (index.php in our case)
echo "<script>window.location.href='welcomepage.php';</script>";
?>