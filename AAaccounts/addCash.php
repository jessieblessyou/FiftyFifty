<?php

$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='AAaccounts';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='123456';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";


$cashID=$_POST['cashID'];
$cashNumber=$_POST['cashNumber'];

    $dbh = new PDO($dsn, $user, $pass);
     //初始化一个PDO对象

// exec()的用法
    // $sql="update chat set iRead='2' where iRead='1'";

    $count=$dbh->exec("SET NAMES 'utf8';");

    $sql="SELECT cash FROM memberClub WHERE ID=".$cashID;


    $count=$dbh->query($sql);


foreach($count as $row)
{
     //var_dump($row['cash']);

     $result=$row['cash']+$cashNumber;
};

//echo $result;

   $sql='UPDATE memberClub SET cash="'.$result.'" WHERE ID='.$cashID=$_POST['cashID'];

   $count=$dbh->query($sql);


   if($count!=false)
   {
   	 echo "1";		
   }



 ?>