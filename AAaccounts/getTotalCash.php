<?php

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

    $sql="select cash from memberClub";


    $count=$dbh->query($sql);


// $arr=array();
$total=0;
// $i=5;

foreach($count as $row)
{

     // array_push($arr,array("title"=>$row["name"],"targets"=>$i));

     // $i++;
	$total=$total+$row["cash"];

	//echo $row["cash"]."<br>";

}
//echo $dbh->errorCode();

echo $total;


 ?>