<?php
session_start();
include("db.php");
if(!isset($_SESSION['student_id'])){
  header("location: ../index.php");
  exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchteacher = $_POST["searchteacher"];
    $_SESSION['searchteacher']=$searchteacher;
  header("location: searchteacher.php");
  }
?>


<!doctype html>
<html lang="en">

<head>
  <title>Counsilling</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/nevbar.css">
  <style type = "text/css">  
         a{  
         color:black;  
         }  
     </style>  


</head>

<body style="background-color:burlywood;">
  <!--<section class="ftco-section"> !-->

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <form action="" method="POST" class="searchform order-lg-last">
        <div class="form-group d-flex">
          <input type="text" name="searchteacher"class="form-control pl-3" placeholder="Search">
          <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
        </div>
      </form>
      <div class="collapse navbar-collapse" id="ftco-nav">

        <ul class="navbar-nav mr-auto">
          <a href="studentprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?=$_SESSION['photo']?>" alt="" style="width: 80px; height: 80px;"></a>
          <br>
          <li class="nav-item "><a href="studentprofile.php" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
          <li class="nav-item "><a href="studenthome.php" class="nav-link">Home</a></li>
          
          
          <li class="nav-item active"><a href="counsilling.php" class="nav-link">Counselling</a></li>
          <li class="nav-item "><a href=" Coursemet.php" class="nav-link">Participants</a></li>
          <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
  
  <h1 style="text-align:center">All Booking Counselling</h1>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Day</th>
      <th scope="col">Faculty Name</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">States</th>
      <th scope="col">Comment</th>
    </tr>
  </thead>

  <?php
  $sid=$_SESSION['student_id'];
$sa="SELECT * FROM `bokking` WHERE sid='$sid' ORDER BY id DESC";
$result = mysqli_query($conn, $sa);
while ($row = mysqli_fetch_array($result)) {

$tid=$row['tid'];
$bid=$row['id'];
  ?>
  <tbody>
    <tr>
      
      <td><?php echo $row['date'] ?></td>
      <td><?php echo $row['day'] ?></td>
      <td><h4><?php  echo"<a href='show_teacher_profile.php?id=$tid'>";echo$row['tname'] ?></h4></td>
      <td><?php echo $row['start'] ?></td>
      <td><?php echo $row['end'] ?></td>
      <td><?php
      if($row['states']=='pending') echo" <span style='color: black; font-size: 20px;'>".$row['states'];
      
      if($row['states']=='Accepted') echo" <span style='color: green; font-size: 20px;'>".$row['states'];
      if($row['states']=='Cancelled') echo" <span style='color: red; font-size: 20px;'>".$row['states'];
      ?></td>
      <td><?php echo $row['comment'] ?></td>
      <?php echo"<td><a href='deletecounsling.php?id=$bid'><button type='button' class='btn btn-danger'>Delete</button></a></td>" ?>
    </tr>
    <?php } ?>
  </tbody>
</table>


    
    
  

  </div>






  <br>
  <br>
  <br>
  <br>
  <br>  <br>

  <br>
  <br>
  <br>
  <footer style="background-color:#f98113;">
  <div class="container">
  <div class="row">
    <div class="col">
    <a href="teacherhome.php">
    <img src="../img/header-logo.png ">
    
  </div>
    <div class="col">
      <br>
      <a href="studenthome.php">
    <h3 style="color:white;">Designed By Team Echo</h3>
 
    </div>

    

  </div>










  

  </footer>


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  

</body>

</html>