<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
if ($_SESSION['auth'] == true && $_SESSION['login'] == true) {
    $num_rows = 1;
    $price = 0;
    $_SESSION['login'];
    $user_id = $_SESSION['user_id'];
    include "db.php";
    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER SET utf8 ");
    $query_pag_data = "SELECT b.final_purchase_id as purchase, p.book_id, k.title, k.price, p.final_purchase_id, p.quantity, b.user_id, b.purchase_status_id, s.name FROM book k, purchase_status s, final_purchase b INNER JOIN final_purchase_item p ON b.final_purchase_id = p.final_purchase_id and b.user_id='$user_id' where s.status_id=b.purchase_status_id and p.book_id=k.book_id group by k.title";
    $result_pag_data = mysql_query($query_pag_data) or die('Database error' . mysql_error());
    if (mysql_num_rows($result_pag_data) > 0) {
        while ($row = mysql_fetch_array($result_pag_data)) {
            $msg .= '<div id="itemfinal'. $row['purchase'] .'" class="col-md-12 final_book_box1">
             <div class="row">
             <div class="col-md-2">
             <img src="images/covers/' . $row['book_id'] . '.jpg" class="img-responsive book_cover small_cover">
             </div>
             <div class="col-md-3 tops"> ' . $row['title'] . ' </div>
             <div class="col-md-3"><button value="' . $row['book_id'] . '" class="btn add_rev_rat"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Dodaj recenzje</button></div>
             <div class="col-md-3"><button value="' . $row['book_id'] . '" class="btn add_rev_rat"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Oceń </button></div>
             <div class="col-md-1 tops"> <a class="delete_link_final" id="' . $row['book_id'] . '" value="' . $row['purchase'] . '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                 </div>
             </div>
             </div>
            <div id="rating_panel' . $row['book_id'] . '" class="shownone">
            <div class="col-md-12 final_book_box">
            <div class="row">
            <form id="send_review" action="add_review.php" method="post">
            <div class="col-md-6">
            <textarea name="review" class="review_box" rows="4"></textarea><br/>
            <input class="shownone" type="text" name="book_id" value="' . $row['book_id'] . '"></input>  
            <input id="success_rev" name="' . $row['book_id'] . '" class="smaller-green" type="submit" value="Opublikuj" </input>
            </form>
            </div>
            <div class="col-md-6 rating-box">
            Oceń książke w skali od 1-5. <br/><br/>
            <div value="' . $row['book_id'] . '" class="count_final_book" id="addreview' . $num_rows++ . '"></div>
                <div class="rating-desc">1 gwiazdka - bardzo zła | 2 gwiazdki - zła | 3 gwiazdki - średnia | 4 gwiazki - dobra | 5 gwiazdek - wspaniała
</div></div>
            </div>
            </div></div>';
         
        }
    } else {
        $msg = '
		<div class="nothing_here">
			<i class="fa fa-exclamation-triangle"></i> Jeszcze nie zakupiłaś/eś u nas książek. 
		</div>';
    }
} else {
    $msg = '<div class="nothing_here">
			<i class="fa fa-exclamation-triangle"></i> Musić być zalogowany. <br/> 
                        Zaloguj się lub załóż konto!
		</div>';
}
echo $msg;
