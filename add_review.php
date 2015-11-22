<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('db.php');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8 ");
if ($_POST['book_id'] && $_POST['review']) {
    $book_id = $_POST['book_id'];
    $review = $_POST['review'];
    if ($_SESSION['auth'] == true && $_SESSION['login'] == true) {
        $user_id = $_SESSION['user_id'];
        $numer_id = mysql_query("select comment_id from book_comment order by comment_id desc");
        $row = mysql_fetch_row($numer_id);
        $numer = $row[0] + 1;

        $purchase = mysql_query("INSERT INTO `book_comment`(`comment_id`, `book_id`, `user_id`, `comment`) VALUES ('$numer','$book_id','$user_id','$review')");
        if ($purchase) {
            echo $msg = 'Dodano recenzje!';
        } else {
            echo $msg = 'Nie dodano recenzji!';
        }
    }
} else {
    echo $msg = 'Nie dodano recenzji!';
}
