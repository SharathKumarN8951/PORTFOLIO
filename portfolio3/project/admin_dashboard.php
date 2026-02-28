<?php
include "config.php";
if(!isset($_SESSION['admin'])){
 header("location:admin_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#05070d;
color:#fff;
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.container{
width:95%;
max-width:1100px;
display:grid;
grid-template-columns:1fr 1fr;
gap:40px;
}

/* CARD */

.card{
background:rgba(255,255,255,0.04);
padding:35px;
border-radius:18px;
border:1px solid rgba(0,242,255,0.25);
box-shadow:0 0 30px rgba(0,242,255,0.2);
}

/* TITLES */

h2{
color:#00f2ff;
margin-bottom:20px;
text-align:center;
}

/* FORM */

form input,
form textarea{
width:100%;
padding:12px;
margin-bottom:15px;
border:none;
border-radius:8px;
background:#0b1220;
color:#fff;
}

form textarea{
resize:none;
height:90px;
}

form input::placeholder,
form textarea::placeholder{
color:#888;
}

button{
width:100%;
padding:12px;
background:#00f2ff;
border:none;
border-radius:30px;
font-weight:600;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#00c8d6;
box-shadow:0 0 20px #00f2ff;
}

/* PROJECT LIST */

.project{
background:#0b1220;
padding:15px;
border-radius:10px;
margin-bottom:12px;
display:flex;
justify-content:space-between;
align-items:center;
}

.project b{
color:#00f2ff;
}

/* ACTIONS */

.actions a{
color:#00f2ff;
margin-left:10px;
text-decoration:none;
font-size:14px;
}

.actions a:hover{
text-decoration:underline;
}

/* FOOTER LINKS */

.footer-links{
margin-top:25px;
text-align:center;
}

.footer-links a{
color:#aaa;
margin:0 10px;
text-decoration:none;
}

.footer-links a:hover{
color:#00f2ff;
}

/* MOBILE */

@media(max-width:900px){
.container{
grid-template-columns:1fr;
}
}

</style>
</head>

<body>

<div class="container">

<!-- UPLOAD CARD -->
<div class="card">

<h2>Add New Project</h2>

<form action="upload_project.php" method="post" enctype="multipart/form-data">

<input type="text" name="title" placeholder="Project Title" required>

<textarea name="description" placeholder="Project Description" required></textarea>

<input type="text" name="demo" placeholder="Live Demo URL">

<input type="text" name="code" placeholder="Code URL">

<input type="text" name="tags" placeholder="HTML,CSS,PHP,AI">

<input type="file" name="image" required>

<button type="submit" name="upload">Upload Project</button>


</form>

</div>

<!-- MANAGE CARD -->
<div class="card">

<h2>Manage Projects</h2>

<?php
$data=mysqli_query($conn,"SELECT * FROM projects");

while($row=mysqli_fetch_assoc($data)){
?>

<div class="project">

<b><?php echo $row['title']; ?></b>

<div class="actions">
<a href="edit_project.php?id=<?php echo $row['id'];?>">Edit</a>
<a href="delete_project.php?id=<?php echo $row['id'];?>"
onclick="return confirm('Delete this project?')">Delete</a>
</div>

</div>

<?php } ?>

<div class="footer-links">
<a href="change_password.php">Change Password</a> |
<a href="logout.php">Logout</a>
</div>

</div>

</div>

</body>
</html>
