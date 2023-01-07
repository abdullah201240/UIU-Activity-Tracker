<?php
session_start();
include("db.php");

$name;
$id = $_GET['id'];
$sq = "SELECT * FROM `teacher` WHERE id='$id'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {
    $uoroom = $data['room'];

    $name = $data['name'];
    $profession = $data['profession'];
    $email = $data['email'];
    $image = $data['image'];
}






?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $date = $_POST['birthday'];

    $newDate = date('l', strtotime($date));
    $_SESSION['date'] = $date;
    $_SESSION['newDate'] = $newDate;

    header("location: booking.php?tid=$id");
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

                    <a href="studentprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?= $image ?>" alt="<?php echo $_SESSION['student_name'] ?>" style="width: 80px; height: 80px;"></a>
                    <br>
                    <li class="nav-item active"><a href="studentprofile.php" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
                    <li class="nav-item "><a href="studenthome.php" class="nav-link">Home</a></li>


                    <li class="nav-item"><a href="counsilling.php" class="nav-link">Counsilling</a></li>
                    <li class="nav-item"><a href=" studentshowstudentprofile.php" class="nav-link">CourseMet</a></li>
                    <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>






    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="uploads/<?php echo $image ?>" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">

                        <h5 class="mt-2 mb-0"><?php echo $name; ?></h5>
                        <span><?php echo $profession; ?></span>

                        <div class="px-4 mt-1">
                            <?php $tid = $id;

                            $sq = "SELECT * FROM `teacher` WHERE id='$tid'";
                            $result = mysqli_query($conn, $sq);
                            $data = $result->fetch_assoc();
                            if ($result) {
                                $uroom = $data['room'];
                            } ?>
                            <b>
                                <h4>Room No: <?php echo $uroom ?></h4>

                                <p>Email:<?php echo $email ?></p>
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Courses Name</th>
                                            <th scope="col">Start time</th>
                                            <th scope="col">End time</th>
                                            <th scope="col">Section</th>
                                            <th scope="col">Room No</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    $sz = "SELECT * FROM `course` WHERE tid='$id'";
                                    $re = mysqli_query($conn, $sz);
                                    while ($row = mysqli_fetch_array($re)) {

                                    ?>


                                        <tbody>
                                            <tr>

                                                <td><?php echo $row['cname']; ?></td>
                                                <td><?php echo $row['ctimestart']; ?></td>
                                                <td><?php echo $row['ctimeend']; ?></td>
                                                <td><?php echo $row['section']; ?></td>
                                                <td><?php echo $row['Room']; ?></td>

                                            </tr>


                                        </tbody>
                                    <?php } ?>
                                </table>

                        </div>
                        <h4>Counselling Day</h4>
                        <?php 
                         $v= "SELECT * FROM time_schedule WHERE tid='$id'";
                         $e = mysqli_query($conn, $v);
                         while ($rowe = mysqli_fetch_array($e)) {
                            $day = $rowe['day'];
                           echo" <td><b>$day</b></td>";
                         }

                         ?>
                        
                    
                       
                        <form action="" method="POST">
                            <label for="birthday">Add Counselling:</label>
                            <input type="date" id="birthday" name="birthday">
                            <div class="buttons">

                                <?php
                                echo " <button type='submit' name='submit' class='btn btn-outline-primary px-4'> Booking Counselling</button>" ?>

                            </div>
                        </form>





                    </div>




                </div>

            </div>

        </div>

    </div>



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