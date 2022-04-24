<?php
include "header.php";
include "conn.php";

$erorr = [];

if(isset($_POST['submit'])){

    if(empty($_POST["username"])){
        $erorr[] = "username";
    }
    
    if(empty($_POST["password"])){
        $erorr[] = "password";
    }

    
    if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) !="image"){
        $erorr[] = "image";
    }
    if(empty($erorr)){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $image = $_FILES["image"];
        $imgPath = "adminImg/".$image["name"];
        move_uploaded_file($image["tmp_name"],$imgPath);
        $sql = "INSERT INTO admin_log_in(username,password,admin_img)
        VALUES('$username','$password','$imgPath')
        ";
        $res = mysqli_query($con,$sql);
        if($res){
            echo "data sucsessfuuly";
            header("location:admin_user.php");
        } else {
            echo "data erorr";
        }

    }


}

?>


<div class="container p-5" >
        <h1 class="">Add admin</h1>      
        <?php 
        $err = $erorr ?? "";      
        if(!empty($err)){
            echo "<p class='alert alert-danger'> erorr ".implode(',',$err)."</p>";
        }
        ?>
    <form  class="p-5 w-75 " method="post" enctype="multipart/form-data">
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Admin username:  </label>              
                <input type="text" class="form-control" name="username" >
            </div>
            
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Admin password:  </label>              
                <input type="text" class="form-control" name="password" >
            </div>
            
            
            <div class="input-group  mb-3 d-flex gap-2 align-items-center  ">
                <label for="" class="m-3">Team person image </label>
                <div class="file position-relative w-25 m-2">
                    <p class="w-100 bg-primary  cursor-pointer pb-2 text-white text-center" >Upload</p>
                <input type="file" name="image" class="w-100 position-absolute top-0 left-0 overflow-hidden  d-block " style="opacity:0;" >
                </div>
                
            </div>

            
            <button type="submit" class="btn btn-success text-white " name="submit">Add</button>

    </form>
</div>







<?php  include "footer.php"; ?>