<?php
unset($_SESSION["client_id"]);
unset($_SESSION["log_in"]);
unset($_SESSION['user_id']);
header("location:log_in.php");
?>