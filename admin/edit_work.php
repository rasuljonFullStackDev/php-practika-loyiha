<?php 
include "header.php";
include "conn.php";
$id = $_GET["edit"];
$sql_e = "SELECT * FROM our_work_database WHERE  id='$id'";
$res_e = mysqli_query($con,$sql_e);
foreach ($res_e as $key => $edit) {
    $e_name = $edit["work_name"];
    $e_desc = $edit["work_descr"];
    $e_key = $edit["filter_key"];
    $e_img = $edit["image"];
}

$erorr = [];
if(isset($_POST['submit'])){
    if(empty($_POST["name"])){
        $erorr[] = "project name";
    }
    if(empty($_POST["describe"])){
        $erorr[] = "project describe";
    }
    if(empty($_POST["key"])){
        $erorr[] = "project filter key";
    }
    if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) !="image"){
        if(empty($e_img)){
        $erorr[] = "project image";
        }
    }

    if(empty($erorr)){
        $name = $_POST['name'];
        $describe = $_POST['describe'];
        $key = $_POST['key'];
        $img = $_FILES['image'];
        if(substr($_FILES['image']["type"],0,stripos($_FILES['image']["type"],'/')) ==="image"){
            $imgPath = "worImg/".$img["name"];
            move_uploaded_file($img["tmp_name"],$imgPath);
        }
        else {
             $imgPath = $e_img;
        }

        $sql_w = "UPDATE  our_work_database SET work_name='$name',work_descr='$describe',filter_key='$key',image='$imgPath' WHERE id='$id'";
        $res = mysqli_query($con,$sql_w);
        if($sql_w){
            echo "data sucsessfuly";
            header("location:work_data.php");
        } else {
            $erorr[] = 'data with erorr';
        }
    }



}


?>


<div class="container p-5" >
        <h1 class="">New project</h1>      
        <?php 
        $err = $erorr ?? "";      
        if(!empty($err)){
            echo "<p class='alert alert-danger'> erorr ".implode(',',$err)."</p>";
        }
        ?>
    <form  class="p-5 w-75 " method="post" enctype="multipart/form-data">
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Project name:  </label>              
                <input type="text" class="form-control" value="<?php echo $e_name ?? ""; ?>" name="name" >
            </div>
            
          
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Project Filter key:  </label>              
                <input type="text" class="form-control" name="key"value="<?php echo $e_key ?? ""; ?>" >
            </div>
             
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Project describe:  </label>              
                <textarea name="describe" id="" cols="30" style="width: 100%;" rows="10">
            <?php echo $e_desc ?? ""; ?></textarea>
            </div>
            
            <div class="input-group  mb-3 d-flex gap-2 align-items-center  ">
                <label for="" class="m-3">Team person image </label>
                <div class="file position-relative w-25 m-2">
                <p class="w-100 bg-primary  cursor-pointer pb-2 text-white text-center" >Upload</p>
                <input type="hidden" name="edit_img " value = "<?php echo $e_img ?? ""; ?>">
                <input type="file" name="image" class="w-100 position-absolute top-0 left-0 overflow-hidden  d-block " style="opacity:0;" >
                </div>
                
            </div>

            
            <button type="submit" class="btn btn-success text-white " name="submit">Add</button>

    </form>
</div>



<?php include "footer.php"; ?>