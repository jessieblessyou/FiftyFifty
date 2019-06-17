<?php

$memberLeftCash = include 'getMemberLeft.php'; 


$total=0;


for($i=0;$i<count($column);$i++)
{
    $total=$total+$memberLeftCash[$i];
};    

echo $total;


 ?>