<?php

$uID=$_POST['data'];



$conn = mysqli_connect('localhost', 'root', '123456','AAaccounts');


    mysqli_query($conn,"set names 'utf8' ");

     $sql="delete from taskExpense where memberID=".$uID;

    //echo $sql;

    $result=mysqli_query($conn,$sql);

    //echo $result;
    $sql="delete from memberClub where ID=".$uID;

    $result=mysqli_query($conn,$sql);

    echo $result;

 ?>