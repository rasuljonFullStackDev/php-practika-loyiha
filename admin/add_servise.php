<?php 
include "conn.php";
$sql_servis = "SELECT * FROM services_database";
$res_servis =mysqli_query($con,$sql_servis); 
$erorr = [] ;

if(isset($_POST['submit'])){
    if(empty($_POST['title'])){
        $erorr[] = " Erorr  servise title";
    }
    if(empty($_POST['title'])){
        $erorr[] = " servise title";
    }
    if(empty($_POST['title'])){
        $erorr[] = " servise title";
    }
    if(empty($_POST['text'])){
        $erorr[] = " servise text";
    }
    if(empty($_POST['key'])){
        $erorr[] = " servise filter key ";
    }
    if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) !="image" ){
        $erorr[] = " servise image";
    }
    if(empty($_POST['url'])){
        $erorr[] = " servise url ";
    }

    if(empty($erorr))
    {
        
        $ser_title = $_POST['title'];
        $ser_text = $_POST['text'];
        $ser_key = $_POST['key'];
        $ser_url = $_POST['url'];
        $ser_img = $_FILES['image'];
        $imgPath = "serviseImg/".$ser_img["name"];
        move_uploaded_file($ser_img["tmp_name"],$imgPath);
        $ser_sql = "INSERT INTO  services_database(sevise_title,servise_text,servise_filter_key,servise_image,servise_url)
        VALUES('$ser_title','$ser_text','$ser_key','$imgPath','$ser_url')
            ";
        $ser_res = mysqli_query($con,$ser_sql);
        if($ser_res){
            echo "database sucsessfuly";
            header("location:all_database.php");
        }

    }


}




?>


<?php include "header.php";?>


<div class="container p-5" >
        <h1 class="">New servise</h1>      
        <?php 
        $err = $erorr ?? "";      
        if(!empty($err)){
            echo "<p class='alert alert-danger'>".implode(',',$err)."</p>";
        }
        ?>

    <form  class="p-5 w-75 " method="post" enctype="multipart/form-data">
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Servise title:  </label>              
                <input type="text" class="form-control" name="title" >
            </div>
            
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Servise text: </label>
                <textarea name="text" class="form-control" id="" cols="" rows="3"></textarea>
            </div>

            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Servise filter key: </label>
                <input type="text" name="key" class="form-control" >
            </div>
            
            <div class="input-group  mb-3 d-flex gap-2 align-items-center  ">
                <label for="" class="m-3">Servise image </label>
                <div class="file position-relative w-25 m-2">
                    <p class="w-100 bg-primary  cursor-pointer pb-2 text-white text-center" >Upload</p>
                <input type="file" name="image" class="w-100 position-absolute top-0 left-0 overflow-hidden  d-block " style="opacity:0;" >
                </div>
                <p>image/image.jpg</p>
            </div>

            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Servise url: </label>
                <input type="text" name="url" class="form-control" >
            </div>
            <button type="submit" class="btn btn-success text-white " name="submit">Add</button>

    </form>
</div>




<?php include "footer.php";?>
