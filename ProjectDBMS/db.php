<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "projectdbms",
    3307
);

if(!$conn){
    die("Connection Failed");
}

?>