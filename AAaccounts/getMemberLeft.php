<?php

$column = include 'getMemberID.php'; 
$totalColumn = include 'getTotalColumn.php'; 

//var_dump($totalColumn);

$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='AAaccounts';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='123456';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";


    $dbh = new PDO($dsn, $user, $pass);
     //初始化一个PDO对象

// exec()的用法
    // $sql="update chat set iRead='2' where iRead='1'";

    $count=$dbh->exec("SET NAMES 'utf8';");


    $sql="select memberID from taskExpense ";


    $count=$dbh->query($sql);

$arrMemberID=array();

foreach($count as $row)
{
    array_push($arrMemberID,$row["memberID"]);    
};    

//var_dump($arrMemberID);

$arr1 = array_flip(array_flip($arrMemberID));

//var_dump($arr1);

$aaa=0;

$arrWithoutSame=array();

foreach($arr1 as $value)
{
    $arrWithoutSame[$aaa]=$value;

    $aaa++;
};

//var_dump($arrWithoutSame);



$membertotal=array();

for($i=0;$i<count($arrWithoutSame);$i++)
{
    $membertotal[$i]=0;
    //echo $i;
    $sql="select expense from taskExpense where memberID=".$arrWithoutSame[$i];


    $count=$dbh->query($sql);

    foreach($count as $row)
    {   
        //echo $arr[$i]." ";
        //echo $row["expense"]." ";

        $membertotal[$i]=$membertotal[$i]+$row["expense"];

        //echo $membertotal[$i]."<br>";
    }
};

//var_dump($membertotal);


$columnLeft=array();

for($i=0;$i<count($column);$i++)
{
    $columnLeft[$i]=0;
};

for($i=0;$i<count($column);$i++)
{
    $newID=$column[$i];

    for($j=0; $j<count($arrWithoutSame);$j++)
    {
        if($newID==$arrWithoutSame[$j])
        {
            //echo $i;
            $columnLeft[$i]=$membertotal[$j];
        }
    }
};

//var_dump($columnLeft);

//echo $dbh->errorCode();

for($i=0;$i<count($column);$i++)
{
    $columnLeft[$i]=$totalColumn[$i]-$columnLeft[$i];
}

return $columnLeft;

//echo $total;


 ?>