<?php
include "config.php";

if(isset($_POST['upload'])){

$title=$_POST['title'];
$desc=$_POST['description'];
$demo=$_POST['demo'];

$img=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"project/uploads/".$img);

mysqli_query($conn,
"INSERT INTO projects(title,description,image,demo_url)
VALUES('$title','$desc','$img','$demo')");

header("location:admin_dashboard.php");
}
?>
