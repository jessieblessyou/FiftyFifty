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

    $sql="select * from task";


    $count=$dbh->query($sql);

// $arr=array(array("title"=>"","target"=>0));

$arr=array("","ID","name","cash","left");

//$i=1;

foreach($count as $row)
{
     array_push($arr,$row["name"]);
}
//echo $dbh->errorCode();

//var_dump($arr);

return $arr;

// echo json_encode($arr,JSON_UNESCAPED_UNICODE);



 ?>