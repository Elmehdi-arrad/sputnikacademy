<?php
session_start();

try
{
	$db = new PDO("mysql:host=localhost;dbname=spotnic",'root','root');
}
catch (Exception $e)
{
	echo "Database Error : ".$e->getmessage();
	exit();
}
?>