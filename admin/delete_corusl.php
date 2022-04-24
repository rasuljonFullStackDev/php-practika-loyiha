<?php
include "conn.php";
if(isset($_GET['delet_corus'])){
    $id = $_GET['delet_corus'];

    $sql_delete = "DELETE FROM corusel_database WHERE id=$id";
    $res_delet = mysqli_query($con,$sql_delete);

    if($res_delet){
        echo "delete";
        header("location:all_database.php");
    }

}


?>