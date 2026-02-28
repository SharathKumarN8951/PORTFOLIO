<!-- <?php
include "config.php";
$result=mysqli_query($conn,"SELECT * FROM projects");
?>

<h2>My Projects</h2>

<div style="display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div style="background:#111;padding:20px;border-radius:10px">

<img src="uploads/<?php echo $row['image'];?>"
style="width:100%;height:180px;object-fit:cover">

<h3><?php echo $row['title'];?></h3>

<p><?php echo $row['description'];?></p>

<a href="<?php echo $row['demo_url'];?>"
target="_blank">Live Demo</a>

</div>

<?php } ?>

</div> -->
