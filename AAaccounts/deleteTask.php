<?php

$uName=$_POST['data'];

//echo $uName;


//$conn = mysqli_connect('localhost', 'root', '123456','AAaccounts');


    //mysqli_query($conn,"set names 'utf8' ");

    // $sql='delete from task where name="'.$uName.'"';

    // //echo $sql;

   	// mysqli_query($conn,$sql);

    // $result=mysqli_affected_rows($conn);

    //$sql='select * from task where name="'.$uName.'"';

    //$result=mysqli_query($conn,$sql);

    //$result=mysqli_affected_rows($conn);

    //var_dump($result);


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

    $sql='select * from task where name="'.$uName.'"';


    $count=$dbh->query($sql);

$set=null;

foreach($count as $row)
{
	$set=1;
    $taskID=$row["ID"];

};

if($set==null)
{
	echo "sql server mistake";

	return;	
};

//var_dump($taskID);

	$sql="delete from taskExpense where taskID=".$taskID;

	$count = $dbh->exec($sql);

	$sql="delete from task where ID=".$taskID;

	$count = $dbh->exec($sql);

	echo $count;




 ?>