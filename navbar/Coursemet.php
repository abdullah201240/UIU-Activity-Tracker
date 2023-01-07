<?php
session_start();
include("db.php");
if(!isset($_SESSION['student_id'])){
  header("location: ../index.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $show = $_POST["searchteacher"];
  
header("location: studentscearchprofile.php?name=$show");
}


?>

<!doctype html>
<html lang="en">

<head>
  <title>Student</title>
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
          <li class="nav-item"><a href="counsilling.php" class="nav-link">Counselling</a></li>
          <li class="nav-item active"><a href=" Coursemet.php" class="nav-link">Participants</a></li>
          
          <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
  
 <br>


  </section>
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
      $sid=$_SESSION['student_id'];
    

                                $s = "Select * from take_courses where sid='$sid'";
                                $result = mysqli_query($conn, $s);
                                while ($row = mysqli_fetch_array($result)) {
                                  $id=$row['id'];
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
              <td><?php echo"<button  type='button' class='btn btn-danger' style='text-align:left'> <a href='studentdeletecourse.php?id=$id'> Delete</button>" ?></td>

          
        </tr>

      </tbody>
      <?php } ?>
    </table>
    <button onclick="location.href='http:addcourses.php'" type="button" class="btn btn-success" style="text-align:left">Add Courses</button>

  </div>
  <div>

  <h1 style="text-align:center">All Participants</h1>
  
  




  <?php
      $sid=$_SESSION['student_id'];
    

                                $s = "Select * from take_courses where sid='$sid'";
                                $result = mysqli_query($conn, $s);
                                while ($row = mysqli_fetch_array($result)) {
                                  $id=$row['id'];
                                  $cname=$row['cname'];
                                  $section=$row['section'];

                                ?>
 
      <h3 style="text-align:center"> <?php echo $row['cname'] ?>(<?php echo $row['section'] ?>)</h3>
      
      <?php
      
      $sid=$_SESSION['student_id'];
    

                                $sa = "Select * from take_courses where cname='$cname' and section='$section'";
                                $resulta = mysqli_query($conn, $sa);
                                while ($rowa = mysqli_fetch_array($resulta)) {
                                
                                    $sname=$rowa['sname'];
                                    $sid=$rowa['sid'];
                                    echo"<a href='studentshowstudentprofile.php?id=$sid'><h4 style='text-align:center;color:blue' >$sname($sid)</h4></a>";
                                }
                                ?>

      
      
      
   
    
  
  <?php } ?>

  
<br><br>

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