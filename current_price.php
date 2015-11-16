<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
if ($_SESSION['auth'] = true && $_SESSION['login'] == true) {
    $num_rows = 1;
    $price    = 0;
    $user_id = $_SESSION['user_id'];
    include "db.php";
    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER SET utf8 ");
    $query_pag_data = "SELECT  k.price, p.quantity  FROM book k, purchase_status s, purchase b INNER JOIN purchase_item p ON b.purchase_id = p.purchase_id and b.user_id='$user_id' where s.status_id=b.purchase_status_id and p.book_id=k.book_id";
    $result_pag_data = mysql_query($query_pag_data) or die('Database error' . mysql_error());
    if (mysql_num_rows($result_pag_data) > 0) {
         while ($row = mysql_fetch_array($result_pag_data)) {
		$price = $price + $row['price'] * $row['quantity'];
		$msg['price'] = $price;
		}
		$msg['elements'] = mysql_num_rows($result_pag_data);
		echo json_encode($msg);
	} else { $msg['price'] = $msg = 'Something went wrong...'; };
} else 	{ $msg['price'] = $msg = 'Something went wrong...'; };
	
	?>
		
		