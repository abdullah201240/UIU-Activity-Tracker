<?php
session_start();
include("db.php");
$id=$_GET['tid'];

$date=$_SESSION['date'] ;
$newDate=$_SESSION['newDate'];
$sq = "SELECT * FROM `teacher` WHERE id='$id'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {
    $uoroom = $data['room'];
    
    $name = $data['name'];
    $profession = $data['profession'];
    $email = $data['email'];
}

?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nevbar.css">
    <title><?php echo $name; ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <form action="#" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search">
                    <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="ftco-nav">

                <ul class="navbar-nav mr-auto">
                    <a href="studenthome.php"><img class="rounded-circle me-lg-2" src="uploads/<?=$_SESSION['photo']?>" alt="" style="width: 80px; height: 80px;"></a>
                    <br>
                    <li class="nav-item "><a href="studentprofile.php" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
                    <li class="nav-item "><a href="studenthome.php" class="nav-link">Home</a></li>
                    <li class="nav-item "><a href="counsilling.php" class="nav-link">Counselling</a></li>
                    
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>



    <table class="table">
  <thead>
    <tr>
      <th scope="col">Day</th>
      <th scope="col">Start Time</th>
      <th scope="col">End time</th>
      
    </tr>
  </thead>
  <?php 
  
 
  $nsql="SELECT * FROM `time_schedule` WHERE tid='$id' and day='$newDate' and  NOT EXISTS(SELECT * from bokking WHERE bokking.date='$date' and time_schedule.id=bokking.bid);";
  //$nzsql="SELECT * from time_schedule WHERE tid='$id' AND day='$newDate'  AND  start NOT IN (SELECT * from bokking WHERE tid='$id' and date='$date')";
  $result = mysqli_query($conn, $nsql);
  while ($row = mysqli_fetch_array($result)) {
  $nid=$row['id'];
  ?>
  <tbody>
    <tr>
      
      <td><?php echo $row['day'] ?></td>
      <td><?php echo $row['start'] ?></td>
      <td><?php echo $row['end'] ?></td>
     <?php echo"  <td> <a href='addbooking.php?nid=$nid'><button class='btn btn-success'>Booking</button></td>" ?>
    </tr>
    
  </tbody>
  <?php } ?>
</table>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>