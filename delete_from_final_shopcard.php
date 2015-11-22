<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('db.php');

if ($_POST['purchase']) {
    $purchase = $_POST['purchase'];
    if ($_SESSION['auth'] == true && $_SESSION['login'] == true) {
        $user_id = $_SESSION['user_id'];
        $book_id = $_POST['book_id'];
        $sql = mysql_query("DELETE FROM `final_purchase` WHERE EXISTS (select * from final_purchase_item d where final_purchase.final_purchase_id=d.final_purchase_id and final_purchase.user_id='$user_id' and d.book_id='$book_id')");
        mysql_error();
        if ($sql) {
            echo $msg = 'Książkę usunięto z listy zakupionych produków.';
        } else {
            echo $msg = 'Something went wrong..';
        }
    }
}
