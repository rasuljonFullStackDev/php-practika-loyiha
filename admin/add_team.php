<?php 

include "header.php";
include "conn.php";

$erorr = [];

if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $erorr[] = "name";
    }
    if(empty($_POST['job'])){
        $erorr[] = "job";
    }
    if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) !="image" ){
        $erorr[] = "image";
    }
    if(empty($erorr)){
        $name = $_POST["name"];
        $job = $_POST["job"];
        $image = $_FILES["image"];
        $image_path = "teamPersonImg/".$image["name"];
        move_uploaded_file($image["tmp_name"],$image_path);
        $sql = "INSERT INTO our_team_database(team_person_name,team_person_job,team_person_image)
        VALUES('$name','$job','$image_path')";
        $res = mysqli_query($con,$sql);
        if($res){
            echo "data susesfuly";
            header("location:all_database.php");
        } else {
            echo "data note";

        }

    }

}



?>


<div class="container p-5" >
        <h1 class="">New our team</h1>      
        <?php 
        $err = $erorr ?? "";      
        if(!empty($err)){
            echo "<p class='alert alert-danger'> erorr ".implode(',',$err)."</p>";
        }
        ?>
    <form  class="p-5 w-75 " method="post" enctype="multipart/form-data">
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Team person name:  </label>              
                <input type="text" class="form-control" name="name" >
            </div>
            
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Team person job:  </label>              
                <input type="text" class="form-control" name="job" >
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


<?php include "footer.php"; ?>