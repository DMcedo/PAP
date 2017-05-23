<?php

include 'dbh.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$pwd=  $_POST['pwd'];

$sql="INSERT INTO registar (nome, email, pwd)
VALUES ('$nome','$email' ,'$pwd')";
$result = mysqli_query($conn, $sql);



header("Location: index.html");
?>
