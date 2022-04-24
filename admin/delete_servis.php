<?php 
include "conn.php";
$id = $_GET['delete'];
$delet_sql = "DELETE FROM services_database WHERE id='$id'";
$res = mysqli_query($con,$delet_sql);

if($res){
    echo "dalete";
    header("location:all_database.php");
} else 




?>