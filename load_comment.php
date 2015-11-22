<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
if ($_POST['book_id']) {
    $bookcat = 1;
    $book_id = $_POST['book_id'];
    include"db.php";

    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER SET utf8 ");
    $query_pag_data = "select c.comment_id, c.book_id, c.user_id, c.comment, DATE_FORMAT(c.time, '%m-%d-%Y %k:%i') as date, b.user_id, b.login from book_comment c, user b where c.user_id=b.user_id and c.book_id='$book_id'";

    $result_pag_data = mysql_query($query_pag_data) or die('Database error' . mysql_error());
    $msg = '';

    if (mysql_num_rows($result_pag_data) > 0) {
        while ($row = mysql_fetch_array($result_pag_data)) {

            $msg .=
                    '
<div class="col-md-12 comment_box">
   <div class="row">
      <div class="comment_name">Autor recenzji: <span class="single_author_info">' . $row['login'] . '</span> | Dodano: ' . $row['date'] . '  </div>
      <div class="comment_content"> ' . $row['comment'] . '</div>
   </div>
</div>';
        }
    } else {
        $msg .= '
	
<div class="col-md-12 comment_box">
   <div class="row"><i class="fa fa-exclamation-triangle"></i>
	Przykro nam, ta książka nie posiada żadnej recenzji.
	</div></div>
	';
    }
    echo $msg;
}

