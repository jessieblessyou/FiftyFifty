<?php

$uName=$_POST['memeberName'];
$uCash=$_POST['memeberCash'];


$conn = mysqli_connect('localhost', 'root', '123456','AAaccounts');


    mysqli_query($conn,"set names 'utf8' ");

    $sql="INSERT INTO memberClub (name,cash) VALUES ('".$uName."','".$uCash."')";

    //echo $sql;

    $result=mysqli_query($conn,$sql);

    echo $result;

 ?>