<?php
session_start();
include("db.php");
$id=$_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $message=$_POST['message'];
    $sql="UPDATE `bokking` SET`comment`='$message' WHERE id='$id'";
$result = mysqli_query($conn, $sql);
header("location: teacherhome.php");


}


//$sql = "UPDATE `bokking` SET`comment`='$comment' WHERE id='$id'";
//$result = mysqli_query($conn, $sql);
//header("location: teacherhome.php");
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

<body>
  <!--<section class="ftco-section"> !-->

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
          <a href="teacherprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?=$_SESSION['teacher_image']?>" alt="" style="width: 80px; height: 80px;"></a>
          <br>
          <li class="nav-item active"><a href="" class="nav-link"><?php echo $_SESSION['teacher_name'] ?></a></li>
                    <li class="nav-item"><a href="teacherhome.php" class="nav-link">Home</a></li>


                    <li class="nav-item"><a href="facultyprojetrequest.php" class="nav-link">Project</a></li>
                    <li class="nav-item"><a href="teacherlogout.php" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">

<div class="row d-flex justify-content-center">

    <div class="col-md-7">

        <div class="card p-3 py-4">

            

            <div class="text-center mt-3">

                <h5 class="mt-2 mb-0"><?php 
                $sq = "SELECT * FROM `bokking` WHERE id='$id'";
                $result = mysqli_query($conn, $sq);
                $data = $result->fetch_assoc(); 
                if ($result) {
                    $date = $data['date'];
                    $day = $data['day'];
                    $sname=$data['sname'];
                    $sid=$data['sid'];
                    $start=$data['start'];
                    $end=$data['end'];
                }
                echo"Date : ". $date;
                
                
                
                
                
                
                
                
                
                
                ?></h5>
                <h5><?php echo"Day ".$day; ?></h5>

                <h5><?php echo"Student name ".$sname; ?></h5>
                <h5><?php echo"Student Id ".$sid; ?></h5>
                <h5><?php echo"Start Time ".$start; ?></h5>
                <h5><?php echo"End Time ".$end; ?></h5>

                <div class="px-4 mt-1">
                    
                </div>
                <form action="" method="POST">
                    <h5 for="Comment">Comment:</h5>
                    <textarea  name="message"></textarea>
                    <div class="buttons">

                         <button type='submit' name='submit' class='btn btn-outline-primary px-4'>Comment</button>

                    </div>
                </form>





            </div>




        </div>

    </div>

</div>

</div>








  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>