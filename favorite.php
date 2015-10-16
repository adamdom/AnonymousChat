<?php
	if(!isset($_COOKIE[$_REQUEST['i']]))
	{
	setcookie($_REQUEST['i']);
	$connect = new mysqli("localhost:3306", "root", "rootpass", "pennlabs");
	$sql = 'UPDATE posts SET favorites=';
	$sql2 = ($_REQUEST['u'] + 1) . '';
	$sql = $sql . $sql2 . " WHERE id=" . $_REQUEST['i'];
	$response = $connect->query($sql);
	}
	
?>