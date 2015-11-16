<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	include('db.php');
	
	if($_POST['purchase'])
	{
		$purchase = $_POST['purchase'];
		if ($_SESSION['auth'] = true && $_SESSION['login'] == true) {
			
			$sql = mysql_query("DELETE FROM `purchase` WHERE `purchase_id` = '$purchase'");	
			
			if($sql) {
				$msg ='Książka została usunięta z koszyka.';
			} 
			else
			{
				$msg ='Something went wrong..';
			};	
			
		};
	};	
?>