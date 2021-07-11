<?php
include('../model/db.php');


 $error="";


if (isset($_POST['search'])) 
{
if (empty($_POST['username'])) 
{
$error = "input given is invalid";
}
else
{
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->searchUser($conobj,"student",$_POST['username']);

$connection->CloseCon($conobj);

}
}

?>