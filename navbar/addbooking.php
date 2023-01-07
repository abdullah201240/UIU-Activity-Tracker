<?php
session_start();
include("db.php");
$nid=$_GET['nid'];
$date=$_SESSION['date'] ;
$sname=$_SESSION['student_name'];
		$sid=$_SESSION['student_id'];
$sql="SELECT * FROM `time_schedule` WHERE id=$nid";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc();
if ($result) {
    $id=$data['id'];
    $day = $data['day'];
    $start = $data['start'];
    $end = $data['end'];
    $tid=$data['tid'];
    $tname = $data['tname'];
}

$query="INSERT INTO `bokking`( bid,`date`, `day`, `tid`, `tname`, `sid`, `sname`, `start`, `end`, `states`) VALUES ('$id','$date','$day','$tid','$tname','$sid','$sname','$start','$end','pending')";
$result1 = mysqli_query($conn, $query);
header("location:counsilling.php");
?>