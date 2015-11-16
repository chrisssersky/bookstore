<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('db.php');
if ($_POST['book_id']) {
    $book_id = $_POST['book_id'];
    if ($_SESSION['auth'] = true && $_SESSION['login'] == true) {
        $numer_id  = mysql_query("select purchase_id from purchase order by purchase_id desc");
        $row       = mysql_fetch_row($numer_id);
        $numer     = $row[0] + 1;
        $numer_id1 = mysql_query("select purchase_item_id from purchase_item order by purchase_item_id desc");
        $row1      = mysql_fetch_row($numer_id1);
        $numer1    = $row[0] + 1;
        $user_id   = $_SESSION['user_id'];
        $purchase  = mysql_query("INSERT INTO `purchase`(`purchase_id`, `user_id`, `purchase_status_id`) VALUES ('$numer', '$user_id' ,'2')");
        if ($purchase) {
            $purchase_item = mysql_query("INSERT INTO `purchase_item`(`purchase_item_id`, `book_id`, `purchase_id`, `quantity`) VALUES ('$numer1', '$book_id', '$numer','1')");
        }
    }
}
?>