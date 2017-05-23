<?php

$conn = mysqli_connect("localhost", "root", "", "registo");

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
?>
