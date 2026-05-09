<?php

include 'db.php';

$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirmPassword'];
$role = $_POST['role'];

$terms = isset($_POST['terms']) ? 1 : 0;

if($password != $confirm_password){
    die("Passwords do not match");
}

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users
(first_name,last_name,email,password,role,terms)

VALUES

('$first_name','$last_name','$email',
'$password','$role','$terms')";

if(mysqli_query($conn,$sql)){
    echo "Registration Successful";
}
else{
    echo "Error: " . mysqli_error($conn);
}

?>