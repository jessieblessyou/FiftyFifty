<?php

//include 'getTitle.php';

$title = include 'getTaskName.php'; 

$expenseList = include 'getExpenseColumn.php'; 

$memberLeftCash = include 'getMemberLeft.php'; 

//var_dump($expenseList[5][4]);


//var_dump($title[1]);

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

    $sql="select * from memberClub";


    $count=$dbh->query($sql);

// $arr=array(array("title"=>"","target"=>0));


$set=null;

$collectAll=array();


$collectAll[0]=array();
$collectAll[1]=array();
$collectAll[2]=array();
$collectAll[3]=array();
$collectAll[4]=$memberLeftCash;

foreach($count as $row)
{
	$set=1;
     array_push($collectAll[0],$row["ID"]);
     array_push($collectAll[1],$row["ID"]);
     array_push($collectAll[2],$row["name"]);
     array_push($collectAll[3],$row["cash"]);
};


if($set==null)
{
	echo "sql server mistake";

	return;	
};


$a["draw"]=1;
$a["recordsTotal"]=count($collectAll[0]);
$a["recordsFiltered"]=count($collectAll[0]);


$titleData=array();
$backData=array();


for($x=0; $x<count($collectAll[0]); $x++)
{
	$backData[$x]=0;	
};

//var_dump($backData);


for($i=5; $i<count($title);$i++)
{
	$collectAll[$i]=$backData;
}


//var_dump($expenseList);


for ($x=0; $x<count($collectAll[0]); $x++) 
{  	
	$titleData[$x]=array();

	for($y=0; $y<count($title); $y++)
	{

		array_push($titleData[$x],$collectAll[$y][$x]);

	};
};


for ($x=0; $x<count($collectAll[0]); $x++) 
{


	if(array_key_exists($x,$expenseList))
	{
		for($y=5; $y<count($title); $y++)
		{
			if(array_key_exists($y,$expenseList[$x]))
			{
				//echo $y;
				$titleData[$x][$y]=$expenseList[$x][$y];
			}
		}

	};
};


$a["data"]=$titleData;

echo json_encode($a,JSON_UNESCAPED_UNICODE);

?>

