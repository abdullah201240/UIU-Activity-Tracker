<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
  header("location: ../index.php");
  exit;
}
include("db.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $searchstudent = $_POST["student"];
    $_SESSION['searchstudent'] = $searchstudent;
    
    header("location: searchstudent.php");
}


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
          <li class="nav-item "><a href="teacherhome.php" class="nav-link">Home</a></li>
          
          
          <li class="nav-item active"><a href="facultyprojetrequest.php" class="nav-link">Project</a></li>
          <li class="nav-item"><a href="teacherlogout.php" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <h1 style="text-align: center;"> All Projects  Requests </h1>
<br>


  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Student Name</th>
      <th scope="col">Student Id</th>
      <th scope="col">Project Name</th>
      <th scope="col">Project Description</th>
      <th scope="col">Project Link</th>
      <th scope="col">Project Status</th>

      
    </tr>
  </thead>
  <?php
  $id=$_SESSION['teacher_id'];

  $sql="SELECT * FROM project INNER JOIN project_faculty on project.project_id=project_faculty.project_id WHERE project_faculty.fid='$id'";
  $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $id=$row['id'];
  ?>
  <tbody>
    <tr>
      
      <td><?php echo $row['sname'] ?></td>
      <td><?php echo $row['sid'] ?></td>
      <td><?php echo $row['project_name'] ?></td>
      <td><?php echo $row['project_dis'] ?></td>
      <?php
       $link=$row['project_link']; ?><td><a href='<?php echo$link ?>'>Show Project</b></a></td>
      <td><?php echo $row['status'] ?></td>
      <?php echo"<td><a href='projectrequestasp.php?id=$id'><button type='button' class='btn btn-primary' >Verify</button></a></td>"?>
      
    </tr>
    
    
  </tbody>
  <?php } ?>
</table>










  </section>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
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