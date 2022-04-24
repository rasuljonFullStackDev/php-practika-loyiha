<?php 
include "conn.php";
session_start();
$id_read = $_SESSION['user_id'] ??  "";
$sql_read_user = "SELECT * FROM admin_log_in WHERE id='$id_read'";
$res_read_user = mysqli_query($con,$sql_read_user);
foreach ($res_read_user  as $key => $user) {
    $read_username = $user["username"];
    $read_admin_img= $user["admin_img"];
   
}
if(empty($read_username)){
    header("location:log_in.php");
} else {
if(!isset($_SESSION["log_in"] )){
    header("location:log_in.php");
}

   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Purple Buzz HTML Template with Bootstrap 5 Beta 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="../apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="../shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="../assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
<!--
    
TemplateMo 561 Purple Buzz

https://templatemo.com/tm-561-purple-buzz

-->
</head>

<body>
    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="admin.php">
                <i class='bx bx-buildings bx-sm text-dark'></i>
                <span class="text-dark h4">Purple</span> <span class="text-primary h4">Buzz</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  align-items-center  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                                                <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="admin_user.php">Admin-user</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="all_database.php">All-database</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="work_data.php">Work-project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="contact_mail.php">Contact-mail</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar  d-flex justify-content-center align-items-center">
                    <!-- <a class="nav-link" href="#"><i class='bx bx-bell bx-sm bx-tada-hover text-primary'></i></a>
                    <a class="nav-link" href="#"><i class='bx bx-cog bx-sm text-primary'></i></a>
                    <a class="nav-link" href="#"><i class='bx bx-user-circle bx-sm text-primary'></i></a> -->
                    <div class="username d-flex justify-content-center align-items-center p-1">
                            <p class=" m-1" style="font-size:18px;font-weigth:800;"><?php echo $read_username; ?></p>
                            <p class=" m-1"><img src="<?php echo $read_admin_img; ?>"  style="width:50px;height:50px;border-radius:50%  " alt=""></p>
                    </div>
                    <a href="log_out.php" type="button" class="btn btn-primary  m-2 " >Log out </a>
                   
                </div>
            </div>
        </div>
    </nav>