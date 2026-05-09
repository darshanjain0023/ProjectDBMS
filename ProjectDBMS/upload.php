<?php

session_start();

include 'db.php';

if(isset($_FILES['profile_image'])){

    $image_name = time() . "_" . $_FILES['profile_image']['name'];

    $tmp_name = $_FILES['profile_image']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "uploads/" . $image_name
    );

    $first_name = $_SESSION['user'];

    $sql = "UPDATE users
    SET profile_image='$image_name'
    WHERE first_name='$first_name'";

    mysqli_query($conn, $sql);

    header("Location: profile.php");

}

?>