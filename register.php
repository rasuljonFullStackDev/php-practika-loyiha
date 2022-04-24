<?php 
include "header.php"; 
include "admin/conn.php"; 
$erorr = [];

if(isset($_POST["submit"])){
   if(empty($_POST["username"])){
       $erorr[] = "username";
   }
     if(empty($_POST["username"])){
       $erorr[] = "username";
   }
      if(empty($_POST["email"])){
       $erorr[] = "email";
   }
      if($_POST["forget_password"]!==$_POST["password"]){
       $erorr[] = "password";
   }
   if(empty($_POST["password"])){
       $erorr[] = "password";
   }
     if(empty($_POST["forget_password"])){
       $erorr[] = "forget password";
   }
  
   if(empty($erorr)){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "INSERT INTO client_database(username,email,password)
        VALUES('$username','$email','$password')";
        $res = mysqli_query($con,$sql);
        if($res){
            echo "data true";
            header("location:log_in.php");
        } else {
            echo "data false";

        }
 

   }

}


?>
<div class="container">
    <div class="row m-5">
        <div class="col-md-6 col-sm-12 col-lg-6 ">
            <div class="card">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Sign in</h5>
                   

                </div>
                <?php
                     $err = $erorr ?? "";
                     if(!empty($err)){
                        echo "<p class='alert alert-danger'> erorr ".implode(',',$err)."</p>";
                     }
                     
                     ?>  
                <div class="modal-body">
                
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300"  name="username" placeholder="usernmae">
                            <label for="floatingname light-300">usernmae</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300"  name="email" placeholder="email">
                            <label for="floatingname light-300">email</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300"  name="password" placeholder="password">
                            <label for="floatingname light-300">password</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300"  name="forget_password" placeholder="forget password">
                            <label for="floatingname light-300">forget password</label>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary rounded-pill px-md-3 px-4 py-2 radius-0 text-light light-300" name="submit">Sign in</button>
                </div>
            </form>

            </div>
            
           
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 ">
            <div class="card">
            <img src="./assets/img/banner-img-02.svg">

            </div>
            
           
        </div>
    </div>
</div>

<?php include "footer.php";?>