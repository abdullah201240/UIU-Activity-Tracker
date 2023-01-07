<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
  header("location: ../index.php");
  exit;
}
include("db.php");

$tid = $_SESSION['teacher_id'];
$sq = "SELECT * FROM `teacher` WHERE id='$tid'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {
  $_SESSION['teacher_image']=$data['image'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $searchstudent = $_POST["student"];
    $_SESSION['searchstudent'] = $searchstudent;
    
    header("location: searchstudent.php");
}


?>
<?php

?>


<!doctype html>
<html lang="en">

<head>
  <title>Teacher</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/nevbar.css">

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
          <input type="text" class="form-control pl-3" placeholder="Search" name="student">
          <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
        </div>
      </form>
      <div class="collapse navbar-collapse" id="ftco-nav">

        <ul class="navbar-nav mr-auto">
          <a href="teacherprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?=$_SESSION['teacher_image']?>" alt="" style="width: 80px; height: 80px;"></a>
          <br>
          <li class="nav-item "><a href="teacherprofile.php" class="nav-link"><?php echo $_SESSION['teacher_name'] ?></a></li>
          <li class="nav-item active"><a href="teacherhome.php" class="nav-link">Home</a></li>
          
          
          <li class="nav-item"><a href="facultyprojetrequest.php" class="nav-link">Project</a></li>
          <li class="nav-item"><a href="teacherlogout.php" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
  <div>
    
      <h1 style="text-align:center">All Courses</h1>
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Course Name</th>
            <th scope="col">Course ID</th>
            <th scope="col">Section</th>
            <th scope="col">Department</th>
            <th scope="col">Room</th>
            <th scope="col">Class Time Start</th>
            <th scope="col">Class Time End</th>

          </tr>
        </thead>
        <?php
        $tid = $_SESSION['teacher_id'];


        $s = "Select * from course where tid='$tid'";
        $result = mysqli_query($conn, $s);
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <tbody>

            <tr>
              <td> <?php echo $row['cname'] ?></td>
              <td><?php echo $row['cid'] ?></td>
              <td><?php echo $row['section'] ?></td>
              <td><?php echo $row['department'] ?></td>
              <td> <?php echo $row['Room'] ?></td>
              <td><?php echo $row['ctimestart'] ?></td>
              <td> <?php echo $row['ctimeend'] ?></td>


            </tr>

          </tbody>
        <?php } ?>
      </table>


  </div>
  <div>

    <h1 style="text-align:center">All Booking Counselling</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Day</th>
          <th scope="col">Student Name</th>
          <th scope="col">Student ID</th>

          <th scope="col">Start Time</th>
          <th scope="col">End Time</th>
          <th scope="col">States</th>
          <th scope="col">Comment</th>
          <th scope="col">Write Comment</th>
        </tr>
      </thead>

      <?php
      $sid = $_SESSION['teacher_id'];
      $sa = "SELECT * FROM `bokking` WHERE tid='$sid' ORDER BY id DESC;";
      $result = mysqli_query($conn, $sa);
      while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $sid=$row['sid'];

      ?>

        <tbody>
          <tr>

            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['day'] ?></td>
            <td ><?php  echo"<a style='color:aliceblue' href='show_student_profile.php?id=$sid'>"; echo $row['sname'] ?></td>
            <td><?php echo $row['sid'] ?></td>
            <td><?php echo $row['start'] ?></td>
            <td><?php echo $row['end'] ?></td>
            <td><?php
                if ($row['states'] == 'pending') echo " <span style='color: black; font-size: 20px;'>" . $row['states'];

                if ($row['states'] == 'Accepted') echo " <span style='color: green; font-size: 20px;'>" . $row['states'];
                if ($row['states'] == 'Cancelled') echo " <span style='color: red; font-size: 20px;'>" . $row['states'];
                ?></td>
            <td><?php echo $row['comment'] ?></td>
            
            <td><?php echo "<a href='comment.php?id=$id'><button type='submit' name='submit' class='btn btn-primary'> Comment </button>" ?></td>

            <td> <?php echo " <a href='accpect.php?id=$id'<button type='button' class='btn btn-success'>Accepted</button>" ?></td>
            <td><?php echo " <a href='Cancelled.php?id=$id'<button type='button' class='btn btn-danger'>Cancelled</button>" ?></td>

          </tr>
        <?php } ?>
        </tbody>
    </table>


    





  </div>


  </section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
  <footer style="background-color:#f98113;">
  <div class="container">
  <div class="row">
    <div class="col">
    <a href="teacherhome.php">
    <img src="../img/header-logo.png">
    </div>
    <div class="col">
      <br>
      <a href="teacherhome.php">
    <h3 color: green;>Designed By Team Echo</h3>
 
    </div>

    

  </div>



  


  

  
  </footer>


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>