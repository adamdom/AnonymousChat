<?php
	$message = "";
	if(isset($_REQUEST['i']))
	{
		$message = $_REQUEST['i'];
	}
	
	$code = "";
	if(isset($_REQUEST['c']))
	{
		$code = $_REQUEST['c'];
	}
	
	$message = htmlspecialchars($message);
	$message = stripslashes($message);
	if(strcmp(substr($message,0,1), "#") == 0)
	{
		$message = substr($message,1, strlen($message)-1);
	}
	
	$connect = new mysqli("localhost:3306", "root", "rootpass", "pennlabs");
	$sql = "INSERT INTO posts (messages, code) VALUES ('" . $message . "'," . $code . " )";
	$response = $connect->query($sql);
	if($response)
	{
		echo "Posted Message: " . $message;
	}
?>