<?php 
include "conn.php";
$id = $_GET['edit'];
$sql_servis = "SELECT * FROM services_database WHERE id='$id'";
$res_servis =mysqli_query($con,$sql_servis); 
$erorr = [] ;



foreach ($res_servis as $key => $s_ser) {
    $s_title = $s_ser['sevise_title'];
    $s_text = $s_ser['servise_text'];
    $s_key = $s_ser['servise_filter_key'];
    $s_image = $s_ser['servise_image'];
    $s_url = $s_ser['servise_url'];
}



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
       
        if(empty($_POST["image_more"])){
        $erorr[] = " servise image";
        }
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
       if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) =="image" ){

        $imgPath = "serviseImg/".$ser_img["name"];
        move_uploaded_file($ser_img["tmp_name"],$imgPath);
       } else{
           $imgPath = $_POST["image_more"];
       }
        $ser_sql = "UPDATE  services_database SET sevise_title='$ser_title', servise_text='$ser_text',servise_filter_key='$ser_key',servise_image='$imgPath',servise_url='ser_url' WHERE  id='$id' ";
        $ser_res = mysqli_query($con,$ser_sql);
        if($ser_res){
            echo "database sucsessfuly";
            header("location:all_database.php");
        } else {
            echo "erorr";
        }

    }


}



echo "<pre>";
var_dump($_POST['image_more'] ?? "");
echo "</pre>";
?>


<?php include "header.php";?>


<div class="container p-5" >
        <h1 class="">New servise</h1>      
        <?php 
        $err = $erorr ?? "";
        // foreach ($err as $key => $err_s) {
            
        //     ;
        // }
        
        if(!empty($err)){
            echo "<p class='alert alert-danger'>".implode(',',$err)."</p>";
        }
        
        
        ?>

    <form  class="p-5 w-75 " method="post" enctype="multipart/form-data">
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Servise title:  </label>              
                <input type="text" class="form-control" name="title" value="<?php echo $s_title ?? "" ?>" >
            </div>
            
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Servise text: </label>
                <textarea name="text" class="form-control" id="" cols="" rows="3"> <?php echo $s_text ?? "" ?></textarea>
            </div>

            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Servise filter key: </label>
                <input type="text" name="key" class="form-control" value="<?php echo $s_key ?? "" ?>" >
            </div>
            
            <div class="input-group  mb-3 d-flex gap-2 align-items-center  ">
                <label for="" class="m-3">Servise image </label>
                <div class="file position-relative w-25 m-2">
                    <input type="hidden" value="<?php echo $s_image ?? "" ?>" name="image_more" >
                    <p class="w-100 bg-primary  cursor-pointer pb-2 text-white text-center" >Upload</p>
                <input type="file" name="image" class="w-100 position-absolute top-0 left-0 overflow-hidden  d-block "  style="opacity:0;" >
                </div>
                <p><?php echo $s_image ?? "" ?></p>
            </div>

            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Servise url: </label>
                <input type="text" name="url" class="form-control"value="<?php echo $s_url ?? "" ?>" >
            </div>
            <button type="submit" class="btn btn-success text-white " name="submit">Add</button>

    </form>
</div>




<?php include "footer.php";?>
