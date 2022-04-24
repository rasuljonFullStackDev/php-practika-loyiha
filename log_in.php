<?php
include "header.php"; 
include "admin/conn.php"; 

$erorr = [];
if(isset($_POST["submit"])){
     if(empty($_POST["email"])){
       $erorr[] = "email";
   }   
   if(empty($_POST["password"])){
       $erorr[] = "password";
   }
   if(empty($erorr)){
     $email = $_POST["email"];
     $password = $_POST["password"];
     $sql = "SELECT * FROM client_database WHERE email='$email' AND password='$password'";
     $res = mysqli_query($con,$sql);
     foreach ($res as $key => $val) {
        $_SESSION["client_id"]=$val["id"];
        header("location:index.php");
     }
     if($res){
       echo "true";
     }else {
      echo "not true";

     }
   }
}



?>
<div class="container">
    <div class="row m-5">
        <div class="col-md-6 col-sm-12 col-lg-6 ">
            <div class="card">
            <img src="./assets/img/banner-img-02.svg">

            </div>
            
           
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6 ">
            <div class="card">
            <form action="" method="post" >
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Log in</h5>
                </div>
                <div class="modal-body">
               
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

               
                </div>
                <div class="modal-footer">
                  <button type="submit" name="submit" class="btn btn-secondary rounded-pill px-md-3 px-4 py-2 radius-0 text-light light-300">Log in</button>
                </div>
        </form>

            </div>
            
           
        </div>
    </div>
</div>

<?php include "footer.php";?>