<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
    exit;
}
include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchteacher = $_POST["searchteacher"];
    $_SESSION['searchteacher'] = $searchteacher;

    header("location: searchteacher.php");
}



$tid = $_SESSION['student_id'];
$sq = "SELECT * FROM `student` WHERE id='$tid'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {
    $dob = $data['dob'];
    $phone = $data['number'];
    $image = $data['image'];
    $email = $data['email'];
    $cgpa = $data['cgpa'];
    $website = $data['website'];
    $github = $data['github'];
    $linkedin = $data['linkedin'];
    $_SESSION['photo']=$data['image'];
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title><?php echo $_SESSION['student_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nevbar.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .container {
            text-align: center;



        }

        #btn {
            font-size: 25px;
        }
    </style>
    <style>
        .oval {
            height: 50px;
            width: 150px;
            /* background-color: #f98113; */
            border: solid 4px #f98113;
            border-radius: 50%;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <form action="" method="post" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search" name="searchteacher">
                    <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="ftco-nav">

                <ul class="navbar-nav mr-auto">

                    <a href="studentprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?= $image ?>" alt="<?php echo $_SESSION['student_name'] ?>" style="width: 80px; height: 80px;"></a>
                    <br>
                    <li class="nav-item active"><a href="studentprofile.php" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
                    <li class="nav-item "><a href="studenthome.php" class="nav-link">Home</a></li>


                    <li class="nav-item"><a href="counsilling.php" class="nav-link">Counselling</a></li>
                    <li class="nav-item"><a href=" Coursemet.php" class="nav-link">Participants</a></li>
                    <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>









    <div class="container" style="text-align:left">
        <div class="main-body">

            <!-- Breadcrumb -->

            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="uploads/<?= $image ?>" alt="<?php echo $_SESSION['student_name']; ?>" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $_SESSION['student_name']; ?></h4>
                                    <p class="text-secondary mb-1">Student ID: <?php echo $_SESSION['student_id'] ?></p>
                                    <p class="text-muted font-size-sm">Dath of Both: <?php echo  $dob ?></p>
                                    <p class="text-muted font-size-sm">Email: <?php echo  $email ?></p>
                                    <p class="text-muted font-size-sm">Cgpa: <?php echo  $cgpa ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                    ?>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h4 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg><a href="<?php echo $website ?>">Website</a></h4>
                                <span class="text-secondary"> </a></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h4 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                    </svg> <a href="<?php echo $github ?>">Github</a></h4>
                                <span class="text-secondary"></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h4 class="mb-0" style="color:black">
                                    <i class="fa fa-linkedin" aria-hidden="true" style="padding-right:20px"></i><a href="<?php echo $linkedin ?>"> LinkedIn</a>
                                </h4>
                                <span class="text-secondary">

                                </span>
                            </li>
                            <li>
                                <br>
                                <div style="text-align: center;">
                                    <a href="studentinfoedit.php"><button type="button" class="btn btn-primary">Edit</button></a>
                                    <a href="cvformet.php"><button type="button" class="btn btn-success">Formet Resume</button></a>
                                </div>

                            </li>




                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $_SESSION['student_name']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo  $email ?>
                                </div>
                            </div>
                            <hr>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo  $phone ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Courses</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    $sid = $_SESSION['student_id'];

                                    $s = "Select * from take_courses where sid='$sid'";
                                    $result = mysqli_query($conn, $s);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo $row['cname'];
                                        echo "(" . $row['section'] . ")";
                                        echo ",";
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                    <h1 style="text-align: center"> All Projects <a href="addproject.php"><i style="height:40px;width:40px" class="fa fa-plus"></i></a> </h1>


                    <div>
                        <?php
                        $sida = $_SESSION['student_id'];

                        $sa = "Select * from project where sid='$sida'";
                        $resulta = mysqli_query($conn, $sa);
                        while ($row = mysqli_fetch_array($resulta)) {
                            $id = $row['project_id'];



                        ?>
                            <div class="card mb-3">


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Project Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $row['project_name']; ?>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Project Discription</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $row['project_dis']; ?>
                                        </div>
                                    </div>
                                    <hr>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Project Link</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <a href="<?php echo $row['project_link']; ?>"> <?php echo $row['project_link']; ?></a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Project Partner</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php
                                            $total = "";
                                            $saz = "SELECT * FROM `project_partner` WHERE project_id='$id'";
                                            $resultaz = mysqli_query($conn, $saz);
                                            while ($rows = mysqli_fetch_array($resultaz)) {

                                                $total .= $rows['partnerName'] . ",";
                                            }
                                            ?>


                                            <?php echo $total ?>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Faculty Name</h6>
                                        </div>


                                        <div class="col-sm-9 text-secondary">
                                            <?php
                                            $totala = "";
                                            $status = "";
                                            $saza = "SELECT * FROM `project_faculty` WHERE project_id='$id'";
                                            $resultaza = mysqli_query($conn, $saza);
                                            while ($rowsa = mysqli_fetch_array($resultaza)) {
                                                echo "\n";
                                                echo $rowsa['name'];
                                                echo "      ";
                                                if ($rowsa['status'] == "Verified") {
                                                    echo "<i style='color:green' class='fa fa-check-circle' aria-hidden='true'></i>";
                                                } elseif ($rowsa['status'] == "Pending") {
                                                    echo "<i style='color:blue'class='fa fa-question-circle'aria-hidden='true'></i>";
                                                };
                                            }
                                            ?>



                                        </div>
                                    </div>


                                    <br>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Project Image</h6>
                                        </div>


                                        <div class="col-sm-9 text-secondary">
                                            <?php

                                            $saza = "SELECT * FROM `project_image` WHERE id='$id'";
                                            $resultaza = mysqli_query($conn, $saza);
                                            while ($rowsa = mysqli_fetch_array($resultaza)) {



                                            ?>
                                                <a href='uploads/<?= $rowsa['image'] ?>'> <img src="uploads/<?= $rowsa['image'] ?>" width="130"></a>

                                            <?php } ?>

                                        </div>
                                    </div>

                                    <hr>
                                    <div style="text-align: center">
                                        <?php echo "<a href='projectedit.php?id=$id'><button type='button' class='btn btn-primary''>Edit</button></a>" ?>

                                        <?php echo "<a href='deleteproject.php?id=$id'><button type='button' class='btn btn-danger'>Delete</button></a>" ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>



























                    </div>







                    <br>
                    <h1 style="text-align: center">Experience <a href="addexperience.php"><i style="height:40px;width:40px" class="fa fa-plus"></i></a> </h1>
                    <br>
                    <div><?php
                            $w = $_SESSION['student_id'];

                            $saw = "Select * from experience where sid='$w'";
                            $resultaw = mysqli_query($conn, $saw);
                            while ($roww = mysqli_fetch_array($resultaw)) {
                                $idw = $roww['id'];



                            ?>

                            <div class="card mb-3">


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $roww['title']; ?>


                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Company Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $roww['companyname']; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> Discription</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $roww['description']; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> Warking Date</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php
                                            if ($roww['end'] =="") {
                                            }
                                            else if ($roww['end'] == "Present") {
                                               echo $roww['start'] . "  " . "To " . $roww['end']; 
                                                $dateOfBirth = $roww['start'];

                                                $today = date("Y-m-d");
                                                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                                if($diff->format('%y')==0 && $diff->format('%m')==0){
                                                    echo '( '.$diff->format('%d').' Days)';

                                                }
                                                if($diff->format('%y')==0 && $diff->format('%m')!=0){
                                                    echo '( '.$diff->format('%m').' Months)';
                                                    

                                                }
                             
                                                //echo '(Year : ' . $diff->format('%y').'Month: '.$diff->format('%m').'Day '.$diff->format('%d').')';
                                            }
                                            else{
                                               echo $roww['start'] . "  " . "To " . $roww['end'] . ""; 
                                                $dateOfBirth = $roww['start'];

                                                $today = $roww['end'];
                                                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                                if($diff->format('%y')==0 && $diff->format('%m')==0){
                                                    echo '( '.$diff->format('%d').' Days)';

                                                }
                                                if($diff->format('%y')==0 && $diff->format('%m')!=0){
                                                    echo '( '.$diff->format('%m').' Months)';
                                                    

                                                }
                                                

                                            }
                                           

                                            ?>
                                            
                                        </div>
                                    </div>



                                    <hr>
                                    <div style="text-align:center">
                                        <?php echo "<a href='studentediteexp.php?id=$idw'><button type='button' class='btn btn-primary'>Edit</button></a>"; ?>
                                        <?php echo "<a href='studentdeleteexp.php?id=$idw'><button type='button' class='btn btn-danger'>Delete</button></a>"; ?>

                                    </div>
                                </div>
                            </div>



                        <?php } ?>


                    </div>
                </div>

            </div>
        </div>

    </div>




    <footer style="background-color:#f98113;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="teacherhome.php">
                        <img src="../img/header-logo.png">
                </div>
                <div class="col">
                    <br>
                    <a href="studenthome.php">
                        <h3 color: green;>Designed By Team Echo</h3>

                </div>



            </div>
    </footer>






    <style type="text/css">
        body {

            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }


        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>