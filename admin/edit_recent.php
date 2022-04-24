<?php 
include "conn.php";
include "header.php";
$id = $_GET['edit'];
$sql = "SELECT * FROM recent_works_database WHERE id='$id'";
$res = mysqli_query($con,$sql);


foreach ($res as $key => $result) {
    $get_title = $result["recent_title"];
    $get_desk = $result["recent_desk"];
    $get_image = $result["recent_image"];
    $get_url = $result["recent_url"];
}


$erorr = [];

if(isset($_POST['submit'])){
   if(empty($_POST['title'])){
       $erorr[] = "title";
   }
    if(empty($_POST['desk'])){
       $erorr[] = "desk";
   }
    if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) !="image" ){
       if(empty($_POST['image_r'])){
        $erorr[] = "image";
       }
   } 
    if(empty($_POST['url'])){
       $erorr[] = "url";
   }
   if(empty($erorr)){
       $r_title = $_POST['title'];
       $r_desk = $_POST['desk'];
       $r_url = $_POST['url'];
       $r_img = $_FILES['image'];
       
        if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) =="image" ){
            $r_imagePath = "recentImg/".$r_img["name"];
            move_uploaded_file($r_img["tmp_name"],$r_imagePath);
        } else {
            $r_imagePath = $get_image;
        }

      




       $sql_r = "UPDATE recent_works_database SET 
       recent_title='$r_title',recent_desk='$r_desk',recent_image='$r_imagePath',recent_url='$r_url' WHERE id='$id' ";
       $res_r = mysqli_query($con,$sql_r);
       if($res_r){
           echo "data add";
            header("location:all_database.php");
       }
        else {
            echo "not add date";
        }

   }




}





?>



<div class="container p-5" >
        <h1 class="">New Recent Work</h1>      
        <?php 
        $err = $erorr ?? "";      
        if(!empty($err)){
            echo "<p class='alert alert-danger'> erorr ".implode(',',$err)."</p>";
        }
        ?>
    <form  class="p-5 w-75 " method="post" enctype="multipart/form-data">
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Recent title:  </label>              
                <input type="text" class="form-control" name="title" value = "<?php echo $get_title ?? ""; ?>" >
            </div>
            
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Recent text: </label>
                <textarea name="desk" class="form-control" id="" cols="" rows="3"><?php echo $get_desk ?? ""; ?></textarea>
            </div>

            
            <div class="input-group  mb-3 d-flex gap-2 align-items-center  ">
                <label for="" class="m-3">Recent image </label>
                <div class="file position-relative w-25 m-2">
                    <p class="w-100 bg-primary  cursor-pointer pb-2 text-white text-center" >Upload</p>
                    <input type="hidden" name="image_r" value="<?php echo $get_image ?? ""; ?>">
                <input type="file" name="image" class="w-100 position-absolute top-0 left-0 overflow-hidden  d-block " style="opacity:0;" >
                </div>
                
            </div>

            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Recent url: </label>
                <input type="text" name="url" class="form-control" value="<?php echo $get_url ?? ""; ?>" >
            </div>
            <button type="submit" class="btn btn-success text-white " name="submit">Add</button>

    </form>
</div>




<?php include "footer.php"; ?>