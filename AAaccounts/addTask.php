<?php

$uName=$_POST['taskName'];


$title = include 'getTaskName.php'; 


$judge="";

for($i=0; $i<count($title); $i++)
{
	if($uName==$title[$i])
	{
		$judge="same";
	};	
}

if($judge=="same")
{
	echo 0;

	return;
};

$conn = mysqli_connect('localhost', 'root', '123456','AAaccounts');


    mysqli_query($conn,"set names 'utf8' ");

    $sql="INSERT INTO task (name) VALUES ('".$uName."')";

    //echo $sql;

    $result=mysqli_query($conn,$sql);

    echo $result;

 ?>