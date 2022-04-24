<?php include "header.php";
include "conn.php";
$erorr = [] ?? "";
if(isset($_POST['submit'])){
    if(empty($_POST['title'])){
        $erorr['title'] = "erorr emputy title";
    }
    if(empty($_POST['text'])){
        $erorr['text'] = "erorr emputy text";
    }
    if(empty($_POST['url'])){
        $erorr['url'] = "erorr emputy url";
    }
    if(empty($erorr)){
        $title = $_POST['title'];
        $text = $_POST['text'];
        $url = $_POST['url'];
        $sql_send = "INSERT INTO corusel_database(title,text,corusel_url)
        VALUES('$title','$text','$url')
        ";
        $res_send = mysqli_query($con,$sql_send);
        if($res_send){
            header("location:all_database.php");
        } else {
            echo "database not erorr";
        }
    }
}
?> 

<div class="container p-5" >
        <h1 class="">New admin</h1>
       
            <?php
            $er_title  = $erorr['title'] ?? "";
            if(!empty($er_title)){
                echo 
                "
                <p class='alert alert-danger'>$er_title</p>
                ";
            } 
            $er_text  = $erorr['text'] ?? "";
            if(!empty($er_text)){
                echo 
                "
                <p class='alert alert-danger'>$er_text</p>
                ";
            } else {
               echo "";
            }
            $er_url  = $erorr['url'] ?? "";
            if(!empty($er_url)){
                echo 
                "
                <p class='alert alert-danger'>$er_url</p>
                ";
            } else {
               echo "";
            }
            
            
            ?>
      
    <form  class="p-5 w-75 " method="post">
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">Title:  </label>


                
                <input type="text" class="form-control" name="title" >
            </div>
            
            <div class="input-group  mb-3   ">
                <label for="" class="m-3">text: </label>
                <textarea name="text" class="form-control" id="" cols="20" rows="10"></textarea>
            </div>

            <div class="input-group  mb-3   ">
                <label for="" class="m-3">coruserl_url: </label>
                <input type="text" name="url" class="form-control" >
            </div>
            
            <button type="submit" class="btn btn-success text-white " name="submit">Add</button>

    </form>
</div>
<?php include "footer.php"; ?>