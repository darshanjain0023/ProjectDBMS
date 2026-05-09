<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>

        body{
            background:#0D1117;
            color:white;
            font-family:Arial;
            padding:40px;
        }

        .card{
            background:#161B22;
            padding:30px;
            border-radius:12px;
            width:400px;
            margin:auto;
            border:1px solid #30363D;
        }

        h1{
            color:#58A6FF;
        }

        p{
            font-size:18px;
            margin:15px 0;
        }

        .avatar{
            width:80px;
            height:80px;
            border-radius:50%;
            background:#58A6FF;
            color:#0D1117;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:32px;
            font-weight:bold;
            margin:auto;
            margin-bottom:20px;
        }

        .logout{
            display:inline-block;
            margin-top:20px;
            padding:10px 20px;
            background:#F85149;
            color:white;
            text-decoration:none;
            border-radius:8px;
        }

    </style>

</head>

<body>

<div class="card">

<div class="avatar">
<?php echo strtoupper(substr($user['first_name'],0,1)); ?>
</div>

<h1>Welcome <?php echo $user['first_name']; ?>!</h1>

<p><strong>First Name:</strong>
<?php echo $user['first_name']; ?>
</p>

<p><strong>Last Name:</strong>
<?php echo $user['last_name']; ?>
</p>

<p><strong>Email:</strong>
<?php echo $user['email']; ?>
</p>

<p><strong>Role:</strong>
<?php echo $user['role']; ?>
</p>

<a href="logout.php" class="logout">
Logout
</a>

</div>

</body>
</html>