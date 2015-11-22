<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('db.php');
if ($_POST['book_id'] && $_POST['score']) {
    $book_id = $_POST['book_id'];
    $score = $_POST['score'];
    if ($_SESSION['auth'] == true && $_SESSION['login'] == true) {
        $numer_id  = mysql_query("SELECT avg_rating FROM book where book_id='$book_id'");
        $row       = mysql_fetch_row($numer_id);
        $numer     = $row[0];
        
        $avg = ($numer + $score)/2;
        
        $purchase  = mysql_query("UPDATE `book` SET `avg_rating`='$avg' where book_id='$book_id'");
        if ($purchase) {
            echo $msg = 'Dziękujemy za ocenę!';
        }
    }
}
