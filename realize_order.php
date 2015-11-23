<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('db.php');
if ($_POST['finalbooks']) {
    if ($_SESSION['auth'] == true && $_SESSION['login'] == true) {
      $book_id=$_POST['finalbooks'];
    
        $numer_id  = mysql_query("SELECT final_purchase_id FROM final_purchase order by final_purchase_id desc");
        $row       = mysql_fetch_row($numer_id);
        $numer     = $row[0] + 1;
        $numer_id1 = mysql_query("SELECT final_purchase_item_id FROM final_purchase_item  order by final_purchase_item_id desc");
        $row1      = mysql_fetch_row($numer_id1);
        $numer1    = $row[0] + 1;
        $user_id   = $_SESSION['user_id'];
        $purchase  = mysql_query("INSERT INTO `final_purchase`(`final_purchase_id`, `user_id`, `purchase_status_id`) VALUES ('$numer','$user_id','1')");
        if ($purchase) {
            $purchase_item = mysql_query("INSERT INTO `final_purchase_item`(`final_purchase_item_id`, `book_id`, `final_purchase_id`, `quantity`) VALUES ('$numer1','$book_id', '$numer','1')");
             $delete_item = mysql_query("DELETE FROM `purchase` WHERE user_id = '$user_id'; ");
            
            
        }
        echo mysql_error();  
  
    }
}
