<?php

session_start();
include("db.php");

$id = $_GET["id"];
$sql = "Select * from project where project_id='$id'";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc();
$num = mysqli_num_rows($result);

if ($num == 1) {
    $projectname = $data['project_name'];
    $projectdis = $data['project_dis'];
    $projectlink = $data['project_link'];
}



if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
    exit;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pro"])) {
        $_SESSION['partner'] = $_POST['addpartner'];

        header("location:projectpartnersearch.php?id=$id");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["promax"])) {
        $_SESSION['partner'] = $_POST['addpartner'];

        header("location:projectfacultysearch.php?id=$id");
    }
}
$pname=$projectname;
    $pd=$projectdis;
    $pl=$projectlink;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    if (isset($_POST["submit"])) {
        $pl= $_POST['pl'];
        $pname= $_POST['pname'];
        $pd = $_POST['pd'];
        
        
            $sql="UPDATE `project` SET `project_name`='$pname',`project_dis`='$pd',`project_link`='$pl' WHERE project_id='$id'";
           
            mysqli_query($conn, $sql);
            header("location:projectedit.php?id=$id");
        


       
       
       
        
    }
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
    <title><?php echo $_SESSION['student_name']; ?></title>
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
                    <a href="studentprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?= $_SESSION['photo'] ?>" alt="" style="width: 80px; height: 80px;"></a>
                    <br>
                    <li class="nav-item "><a href="studentprofile.php" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
                    <li class="nav-item"><a href="studenthome.php" class="nav-link">Home</a></li>


                    <li class="nav-item"><a href="counsilling.php" class="nav-link">Counselling</a></li>
                    <li class="nav-item active"><a href=" Coursemet.php" class="nav-link">Participants</a></li>
          


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
                        <img src="uploads/<?= $_SESSION['photo'] ?>" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">

                        <h2 class="mt-2 mb-0"><?php echo $_SESSION['student_name']; ?></h2>
                        <span><?php echo $_SESSION['student_id']; ?></span>







                        <br>

                        <h3> ADD Project Partner<h3>

                                <form method="POST" class="searchform order-lg-last" style="text-align: center;">

                                    <div class="form-group d-flex">

                                        <input style="width:200px;height:50px;border:3px solid #FFA500;position:absolute; left:200px;  " type="text" class="form-control pl-3" placeholder="Search By Id" name="addpartner">
                                        <button style="position:absolute; left:150px;" ;type="submit" name="pro" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                                    </div>
                                </form>
                                <br>
                                <label for="lname">
                                    <h3>Project Partner</h3>
                                </label>
                                <br>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Id</th>

                                        </tr>
                                    </thead>
                                    <?php


                                    $sa = "Select * from project_partner where project_id='$id'";
                                    $resulta = mysqli_query($conn, $sa);
                                    while ($row = mysqli_fetch_array($resulta)) {
                                        $pid = $row["id"];

                                    ?>
                                        <tbody>

                                            <tr>

                                                <td><?php echo $row['partnerName']; ?></td>
                                                <td><?php echo $row['partnerID']; ?></td>
                                                <?php echo "<td><a href='revomeprojectpartner.php?pid=$pid'><button type='button' class='btn btn-danger'>Delete</button></a></td></tr>"; ?>
                                            </tr>

                                        </tbody>
                                    <?php }
                                    ?>
                                </table>

                                <br>
                                <h3>Add Faculty<h3>

                                        <form method="POST" class="searchform order-lg-last" style="text-align: center;">

                                            <div class="form-group d-flex">

                                                <input style="width:200px;height:50px;border:3px solid #FFA500;position:absolute; left:200px;  " type="text" class="form-control pl-3" placeholder="Search By Faculty Name" name="addpartner">
                                                <button style="position:absolute; left:150px;" ;type="submit" name="promax" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                                            </div>
                                        </form>
                                        <br>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Id</th>

                                                </tr>
                                            </thead>
                                            <?php


                                            $sa = "Select * from project_faculty where project_id='$id'";
                                            $resulta = mysqli_query($conn, $sa);
                                            while ($row = mysqli_fetch_array($resulta)) {
                                                $pid = $row["id"];

                                            ?>
                                                <tbody>

                                                    <tr>

                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['fid']; ?></td>
                                                        <?php echo "<td><a href='removefaculty.php?pid=$pid'><button type='button' class='btn btn-danger'>Delete</button></a></td>"; ?>
                                                    </tr>

                                                </tbody>
                                            <?php }
                                            ?>
                                        </table>
                                        <br>
                                        <form action="<?php echo "projectimageupload.php?id=$id" ?>" method="post" enctype="multipart/form-data">

                                            <input type="file" name="my_image">
                                            <br>
                                            <br>

                                            <input type="submit" name="submit" value="Upload">

                                        </form>

                                        <h3> All Image</h3>

                                        <?php


                                        $q = "Select * from project_image where id='$id'";
                                        $r = mysqli_query($conn, $q);
                                        while ($ro = mysqli_fetch_array($r)) {
                                            $imageid = $ro['imageid'];
                                        ?>
                                            <td><img src="uploads/<?= $ro['image'] ?>" width="200"></td>

                                            <?php echo "<td><a href='deleteprojectimage.php?id=$imageid&&pid=$id'><button type='button' class='btn btn-danger'>Delete</button></a></td>" ?>
                                            <br>
                                            <br>
                                        <?php } ?>


                                        <form autocomplete="off" action="" method="post">
                                            <div class="px-4 mt-1">
                                                <label for="lname">
                                                    <h3>Project Name</h3>
                                                </label>
                                                <br>
                                                <input style="width:300px;height:50px; border:3px solid #FFA500;" type="text" id="pname" name="pname" value="<?php echo $projectname ?>">

                                                <br>
                                                <label for="lname">
                                                    <h3>Project Description</h3>
                                                </label>
                                                <br>
                                                <textarea style="width:300px;height:150px; border:3px solid #FFA500;" type="text" id="pd" name="pd"><?php echo $projectdis ?></textarea>
                                                <br>


                                                <label for="lname">
                                                    <h3>Project Link</h3>
                                                </label>
                                                <br>
                                                <input style="width:300px;height:50px;border:3px solid #FFA500;" type="text" id="pl" name="pl" value="<?php echo $projectlink ?>">
                                                <br>



                                            </div>
                                            <div class="buttons">

                                                <button type="submit" name="submit" class="btn btn-outline-primary px-4">Edit</button>

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