<?php

include 'dbh.php';

$email = $_POST['email'];
$pwd=  $_POST['pwd'];

$sql="SELECT * FROM registar WHERE email ='$email' AND pwd='$pwd'";
$result = mysqli_query($conn, $sql);

if(!$row=mysqli_fetch_assoc($result)){
    echo "email ou password incorretos!";
}else{
    echo"bem vindo!";
}

//header("Location: index.html");
?>
