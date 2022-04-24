<?php
session_start();
include "admin/conn.php";
$id = $_SESSION["client_id"] ?? "";
$sql = "SELECT * FROM client_database WHERE id='$id'";
$res = mysqli_query($con,$sql);

$client_image = "";

                            
foreach ($res as $key => $v) {
    $client_image=$v["client_image"];
    $username=$v["username"];
   
  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Purple Buzz HTML Template with Bootstrap 5 Beta 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
<!--
    
TemplateMo 561 Purple Buzz

https://templatemo.com/tm-561-purple-buzz

-->
</head>

<body>
    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="index.php">
                <i class='bx bx-buildings bx-sm text-dark'></i>
                <span class="text-dark h4">Purple</span> <span class="text-primary h4">Buzz</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="work.php">Work</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar  d-flex justify-content-center align-items-center">
                    <!-- <a class="nav-link" href="#"><i class='bx bx-bell bx-sm bx-tada-hover text-primary'></i></a>
                    <a class="nav-link" href="#"><i class='bx bx-cog bx-sm text-primary'></i></a>
                    <a class="nav-link" href="#"><i class='bx bx-user-circle bx-sm text-primary'></i></a> -->
                    <?php
                    if(empty($_SESSION["client_id"])) : ?>

                    <a href="register.php" type="button" class="btn btn-primary  m-2 " >Sign in </a>
                    <a href="log_in.php" type="button" class="btn btn-primary">Log in </a>
                    <?php  else : ?>
                        <div class="client">
                            <p><b><?php echo $username; ?></b></p>
                        </div>
                        <a href="profile.php" class="nav-link border-0 bg bg-body" ><i class='bx bx-cog bx-sm text-primary'></i></a>
                        <?php 
                            if(empty($client_image)){
                                echo "<div class='nav-link border-0 bg bg-body' class='nav-link' ><i class='bx bx-user-circle bx-sm text-primary'></i></div>";
                            } else {
                                echo "<img class='rounded-circle' src='$client_image' style='width: 35px; height:35px;'>";
                            }
                        ?>
                   
                    
                    
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </nav>