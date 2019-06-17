<?php


$column = include 'getMemberID.php'; 

$tableRow = include 'getTaskID.php'; 

//var_dump($tableRow);


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

    $sql="select * from taskExpense";
    $count=$dbh->query($sql);

// $arr=array(array("title"=>"","target"=>0));

// $arr1=array();
// $arr2=array();
// $arr3=array();


//var_dump($count);

$set=null;

$arr=array();

$newColumnID=null;
$newRowID=null;


foreach($count as $row)
{
	$set=1;

	for($i=0;$i<count($column);$i++)
	{
		if($column[$i]==$row["memberID"])
		{
			$newColumnID=$i;

			//echo $i;
		};
	};

	for($j=0;$j<count($tableRow);$j++)
	{
		if($tableRow[$j]==$row["taskID"])
		{
			$newRowID=$j;

			// echo $tableRow[$j]."  ";

			// echo $row["taskID"]."  ";

			// echo $j."<br>";

		};
	};		


	if(!array_key_exists($newColumnID,$arr))
	{	
		//echo $row["memberID"];
		$arr[$newColumnID]=array();
		//array_push($arr[$row["memberID"]],($row["taskID"]+4));

		$arr[$newColumnID][$newRowID]=$row["expense"];
	}
	else
	{
		$arr[$newColumnID][$newRowID]=$row["expense"];
	};	


	// array_push($arr1,$row["taskID"]);
	// array_push($arr1,$row["memberID"]);
	// array_push($arr1,$row["expense"]);
};


//var_dump($arr);

if($set==null)
{
	echo "0";

	return;	
};

return $arr;

?>

