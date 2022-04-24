<?php 
include "conn.php";
$id = $_GET["delet"];

$sql = "DELETE FROM admin_log_in WHERE id='$id'";
$res = mysqli_query($con,$sql);
if($res){
    header("location:admin_user.php");
}
else {
    echo "data erorr";
} 



?>