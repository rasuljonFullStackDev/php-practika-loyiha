<?php 
include "header.php"; 
include "admin/conn.php"; 
$id = $_SESSION["client_id"] ?? "";
$erorr = [];
$sql = "SELECT * FROM client_database WHERE id='$id'";
$res = mysqli_query($con,$sql);
foreach ($res as $key => $val) {
    $username = $val["username"];
    $email = $val["email"];
    $password = $val["password"];
    $client_image = $val["client_image"];
}


if(isset($_POST["submit"])){
    if(empty($_POST["username"])){
        $erorr[] = "username";
    }
    if(empty($_POST["email"])){
        $erorr[] = "email";
    }
    if(empty($_POST["password"])){
        $erorr[] = "password";
    }
    if(empty($erorr)){
        $p_username = $_POST["username"];
        $p_email = $_POST["email"];
        $p_password = $_POST["password"];
        if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) =="image" ){
            $img = $_FILES["image"];
            $imgPath = "clientImg/".$img["name"];
            move_uploaded_file($img["tmp_name"],$imgPath); 
            $sql_p = "UPDATE client_database SET username='$p_username',email='$p_email',password='$p_password',client_image='$imgPath' WHERE id='$id' ";
            $res_p = mysqli_query($con,$sql_p);
            if($res_p){
                // echo "data sucsessfuly";
            header("location:profile.php");

            } else {
                echo "data sucsessfuly erorr";
                
            }
        } else {
            $sql_p = "UPDATE client_database SET username='$p_username',email='$p_email',password='$p_password' WHERE id='$id' ";
            $res_p = mysqli_query($con,$sql_p);
            if($res_p){
                // echo "data sucsessfuly";
                header("location:profile.php");
            } else {
                echo "data sucsessfuly erorr";
                
            }
        }
       
    }
}
if(isset($_POST["log_out"])){
    unset($_SESSION["client_id"]);
    header("location:index.php");
}


?>

<div class="container">
<form action="" method="post" enctype="multipart/form-data">
    <div class="row m-4 ">
        <h1>Profile setting</h1>   
        <div class="col-md-8 col-lg-8 col-sm-12 col-xl-8 p-3">
            <div class="mb-3">
                <div class="form-floating">
                    <input type="text" value="<?php echo $username; ?>" class="form-control form-control-lg light-300"  name="username" placeholder="email">
                    <label for="floatingname light-300">username</label>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <input type="email" value="<?php echo $email; ?>" class="form-control form-control-lg light-300"  name="email" placeholder="email">
                    <label for="floatingname light-300">email</label>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <input type="password" value="<?php echo $password; ?>" class="form-control form-control-lg light-300"  name="password" placeholder="email">
                    <label for="floatingname light-300">Password</label>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-floating">
                <div class="file position-relative w-25 m-2">
                    <p class="w-100 bg-primary  cursor-pointer pb-2 text-white text-center" >Upload</p>
                    <input type="file" name="image" class="w-100 position-absolute top-0 left-0 overflow-hidden  d-block " style="opacity:0;" >
                    </div>
                </div>
            </div>
               
     
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-xl-4">
            
        <?php 
        if(empty($client_image)){
            echo "<img src='./assets/img/banner-img-01.svg'>";
        } else {
            echo "<img src='$client_image' style='width:100%;' >";
        }
        ?>
        
        </div>
        <button type="submit" name="submit" class="btn text-white btn-success m-2">Edit profile</button>
        <button type="submit" name="log_out" class="btn text-white btn-danger m-2">Log out profile</button>
    </div>
</form>
</div>




<?php include "footer.php"; ?>