<?php

$taskName=$_POST["taskName"];
$expenseNumber=$_POST["expenseNumber"];
$memberID=$_POST["memberID"];


$idList=explode(',',$memberID); 


//var_dump($title[1]);
//echo $taskName;


$conn = mysqli_connect('localhost', 'root', '123456','AAaccounts');


    mysqli_query($conn,"set names 'utf8' ");

    $sql='select ID from task where name="'.$taskName.'"';

    //echo $sql;

    $result=mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($result);

    //var_dump($row);

    if($row==null)
    {
    	echo 4;
    	return;
    };

    //echo $row["ID"];

    for($i=0; $i<count($idList);$i++)
    {
    	//echo $idList[$i];

        $sqlAgain1='SELECT expense FROM taskExpense WHERE taskID='.$row["ID"].' and memberID='.$idList[$i];

        $resultAgain1=mysqli_query($conn,$sqlAgain1);

        $rowAgain1=mysqli_fetch_assoc($resultAgain1);

        if($rowAgain1["expense"]>0)
        {
            //var_dump($sqlAgain1);

            echo 2;

            return;
        };
   
    };


    for($i=0; $i<count($idList);$i++)
    {
        //echo $idList[$i];

        $sqlAgain2='INSERT INTO taskExpense ( taskID, memberID, expense) VALUES ("'.$row["ID"].'","'.$idList[$i].'","'.$expenseNumber.'")';

        $resultAgain2=mysqli_query($conn,$sqlAgain2);

        //var_dump($resultAgain2);

        if($resultAgain2==false)
        {
            echo 5;

            return;
        };  
    };

echo 1;

 ?>