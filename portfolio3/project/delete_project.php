<?php
include "config.php";

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM projects WHERE id=$id");

header("location:admin_dashboard.php");
?>
