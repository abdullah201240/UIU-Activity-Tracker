<?php
include("db.php");






session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchstudent = $_POST["student"];
    
    //$_SESSION['searchteacher'] = $searchstudent;
    header("location: studentsearchapi.php?name=$searchstudent");
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

<body>
    <!--<section class="ftco-section"> !-->

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <form action="" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search">
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
        <form action="" method="post" autocomplete="off">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4"> Search Student</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Student Name" name="student">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Go</button>
        </form>
    </div>
    <div>
        <h1 style="text-align:center">All Student</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Student Name</th>

                    <th scope="col">Student id</th>
                    <th scope="col">Department</th>

                    <th scope="col">Image</th>
                    <th scope="col">Phone Number</th>

                </tr>
            </thead>
            <?php

            $showz=$_GET["name"];
            $s = "Select * from student where name like'%$showz%' or  id like'%$showz%' ";

            $result = mysqli_query($conn, $s);
            $id;
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
            ?>
                <tbody>
                    <tr>

                        <th><?php echo $row['name'] ?></th>
                        <td><?php echo $row['id'] ?></td>


                        <td><?php echo $row['department'] ?></td>
                        <td> <img src="uploads/<?php echo $row['image']?>" width='50' height='60'> </td>
                        <td><?php echo $row['number'] ?> </td>

                        <?php echo "<td> <a href='studentshowstudentprofile.php?id=$id'> <button type='button' class='btn btn-success'>Show</button></td>" ?>
                    </tr>
                <?php } ?>

                </tbody>
        </table>


    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>