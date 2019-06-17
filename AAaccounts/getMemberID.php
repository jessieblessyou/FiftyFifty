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

    $sql="select ID from memberClub";


    $count=$dbh->query($sql);

$arr=array();


$set=null;


foreach($count as $row)
{
	$set=1;
    array_push($arr,$row["ID"]);

};

if($set==null)
{
	echo "sql server mistake";

	return;	
};


return $arr;





 ?>