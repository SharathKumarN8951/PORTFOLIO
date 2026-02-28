<?php
include "config.php";

if(isset($_POST['change'])){

$old=md5($_POST['old']);
$new=md5($_POST['new']);

$check=mysqli_query($conn,
"SELECT * FROM admin WHERE password='$old'");

if(mysqli_num_rows($check)>0){
 mysqli_query($conn,
 "UPDATE admin SET password='$new'");
 echo "Password Changed";
}else{
 echo "Wrong Old Password";
}
}
?>

<form method="post">

<input type="password" name="old"
placeholder="Old Password" required><br><br>

<input type="password" name="new"
placeholder="New Password" required><br><br>

<button name="change">Change Password</button>

</form>
