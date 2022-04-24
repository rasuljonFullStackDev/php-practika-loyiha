<?php
include "conn.php";
session_start();
$erorr = [];

if(isset($_POST["submit"])){
    if(empty($_POST["username"])){
      $erorr[] = "username";
    }
    if(empty($_POST["password"])){
      $erorr[] = "password";
    }

    if(empty($erorr)){
      $username = $_POST["username"];
      $password = $_POST["password"];
      $sql = "SELECT * FROM admin_log_in WHERE username='$username' AND password='$password'";
      $res_admin = mysqli_query($con,$sql);
      foreach ($res_admin as $key => $val) {
        echo $val['username'];
        echo $val['password'];
      $id = $val["id"];
      $_SESSION['user_id'] = $id;
      header("location:admin_user.php");
      $_SESSION['erorr'] = "login";
      $_SESSION["log_in"] = "log-in";
      }
      
      if($res_admin){
        echo "true";
        
      } else {
        echo "false";
      }

    }


}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log_in</title>
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="../assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>
    <div class="container d-flex w-100 h-100 mt-5 pt-5 justify-content-center align-items-center">
        <div class="card ">
            
            <div class="modal-header">
                <h5 class="modal-title">Log in</h5>
               
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control form-control-lg light-300">
                        <label for="floatingname light-300">Username</label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="password" class="form-control form-control-lg light-300">
                        <label for="floatingname light-300">password</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary  m-2 " >Log in </button>
              </div>
                </form>
              </div>
              
          </form>
        </div>
    </div>
</body>
</html>