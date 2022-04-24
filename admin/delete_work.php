<?php 

include "conn.php";
$id = $_GET["delet"];
$sql = "DELETE FROM our_work_database WHERE id='$id'";
$res = mysqli_query($con,$sql);
if($res){
    header("location:work_data.php");
} else {
    echo "delete false";
}


?>