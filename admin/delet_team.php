<?php 
include "conn.php";
$id = $_GET["delet"];
$sql = "DELETE FROM our_team_database WHERE id='$id'";
$res = mysqli_query($con,$sql);
if($res){
    echo "delete";
    header("location:all_database.php");
}
else {
    echo "not delete erorr";
}



?>