<?php

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include 'db.php';

$first_name = $_SESSION['user'];

$sql = "SELECT * FROM users WHERE first_name='$first_name'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<title>Profile</title>

<style>

body{
    background:#0D1117;
    color:white;
    font-family:Arial;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.profile-card{
    background:#161B22;
    width:420px;
    padding:35px;
    border-radius:14px;
    border:1px solid #30363D;
    text-align:center;
}

.avatar{
    width:90px;
    height:90px;
    border-radius:50%;
    background:#58A6FF;
    color:#0D1117;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:36px;
    font-weight:bold;
    margin:auto;
    margin-bottom:20px;
}
.profile-img{
    width:90px;
    height:90px;
    border-radius:50%;
    object-fit:cover;
    margin:auto;
    margin-bottom:20px;
    border:3px solid #58A6FF;
    display:block;
}

h1{
    margin-bottom:25px;
}

.info{
    text-align:left;
    margin-top:20px;
}

.info p{
    margin:15px 0;
    font-size:17px;
}

.label{
    color:#58A6FF;
    font-weight:bold;
}

.btn{
    display:inline-block;
    margin-top:25px;
    padding:12px 22px;
    background:#58A6FF;
    color:#0D1117;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
}

.logout{
    background:#F85149;
    color:white;
    margin-left:10px;
}

</style>

</head>

<body>

<div class="profile-card">
    <form action="upload.php"
method="POST"
enctype="multipart/form-data">

<input type="file"
name="profile_image"
required>

<button type="submit" class="btn">
Upload Image
</button>

</form>

<?php
if(!empty($user['profile_image'])){
?>

<img src="uploads/<?php echo $user['profile_image']; ?>"
class="profile-img">

<?php
}
else{
?>

<div class="avatar">
<?php echo strtoupper(substr($user['first_name'],0,1)); ?>
</div>

<?php
}
?>

<h1>
<?php echo $user['first_name']; ?>
<?php echo $user['last_name']; ?>
</h1>

<div class="info">

<p>
<span class="label">Email:</span>
<?php echo $user['email']; ?>
</p>

<p>
<span class="label">Role:</span>
<?php echo $user['role']; ?>
</p>

</div>

<a href="index.php" class="btn">
Home
</a>

<a href="logout.php" class="btn logout">
Logout
</a>

</div>

</body>
</html>