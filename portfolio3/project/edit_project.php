<?php
include "config.php";

$id = $_GET['id'];

// Fetch project
$query = mysqli_query($conn, "SELECT * FROM projects WHERE id='$id'");
$row = mysqli_fetch_assoc($query);

if (!$row) {
    die("Project not found!");
}

// Update project
if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $demo_url = $_POST['demo_url'];

    // If new image uploaded
    if (!empty($_FILES['image']['name'])) {

        $image_name = time() . "_" . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_name, "uploads/" . $image_name);

        // Update with image
        mysqli_query($conn, "UPDATE projects SET 
            title='$title',
            description='$description',
            demo_url='$demo_url',
            image='$image_name'
            WHERE id='$id'
        ");

    } else {

        // Update without changing image
        mysqli_query($conn, "UPDATE projects SET 
            title='$title',
            description='$description',
            demo_url='$demo_url'
            WHERE id='$id'
        ");
    }

    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Project</title>

<style>
body{
font-family:Arial;
background:#0b0f1a;
color:white;
padding:40px;
}

form{
max-width:400px;
margin:auto;
background:#111;
padding:25px;
border-radius:10px;
}

input, textarea{
width:100%;
padding:10px;
margin:10px 0;
border-radius:5px;
border:none;
}

button{
padding:10px 25px;
background:#00f2ff;
border:none;
cursor:pointer;
font-weight:bold;
}

img{
width:100%;
border-radius:8px;
margin-top:10px;
}
</style>

</head>

<body>

<h2>Edit Project</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="title" value="<?php echo $row['title']; ?>" required>

<textarea name="description" rows="4" required><?php echo $row['description']; ?></textarea>

<input type="text" name="demo_url" value="<?php echo $row['demo_url']; ?>">

<p>Current Image:</p>
<img src="uploads/<?php echo $row['image']; ?>">

<input type="file" name="image">

<button type="submit" name="update">Update</button>

</form>

</body>
</html>
