<?php
include "config.php";

if(isset($_POST['login'])){
 $u=$_POST['username'];
 $p=md5($_POST['password']);

 $q=mysqli_query($conn,
 "SELECT * FROM admin WHERE username='$u' AND password='$p'");

 if(mysqli_num_rows($q)>0){
   $_SESSION['admin']=$u;
   header("location:admin_dashboard.php");
 }else{
   echo "Invalid Login";
 }
}
?>

<form method="post">
<h2>Admin Login</h2>
<input type="text" name="username" placeholder="Username" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>
<button name="login">Login</button>
</form>
