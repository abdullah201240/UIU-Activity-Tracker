<?php
include("db.php");
$id=$_GET['id'];
$sql="UPDATE `bokking` SET`states`='Cancelled' WHERE id='$id'";
$result = mysqli_query($conn, $sql);
header("location: teacherhome.php");
?>