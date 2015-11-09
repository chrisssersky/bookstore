<?php
include "db.php";
$num_rows = 1;
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8 ");
$query_pag_data = "select b.book_id, a.author_id, k.category_id, b.title, k.name, b.create_date, b.description, b.price, b.avg_rating, a.first_name, a.last_name from book b, author a, book_author d, category k, book_category m where b.book_id = d.book_id and a.author_id = d.author_id and b.book_id = m.book_id and k.category_id = m.category_id order by b.avg_rating desc LIMIT 5";
$result_pag_data = mysql_query($query_pag_data) or die('Database error' . mysql_error());
$msg = "";
while ($row = mysql_fetch_array($result_pag_data)) {
    $msg .= ' 
<div class="row">
   <div class="col-md-11 book_single_best">
      <div class="col-md-1 book_content2"><span class="num_best">' . $num_rows++ . '.</span></div>
      <div class="col-md-3 book_content2">
         <img src="images/covers/' . $row['book_id'] . '.jpg" class="img-responsive book_cover">
      </div>
      <div class="col-md-8 book_content3">
         <h4>' . $row['title'] . '</h4>
         ' . $row['first_name'] . ' ' . $row['last_name'] . '<br/>
         <div class="rating1"> Ocena: ' . $row['avg_rating'] . '/5</div>
         <div class="row">
            <div class="col-md-6 best_single_price">
               <span class="single_price_best">' . $row['price'] . ' zł</span>
            </div>
            <div class="col-md-6">
               <button class="add_purchase">Koszyk <i class="fa fa-shopping-cart"></i>
               </button>
            </div>
         </div>
      </div>
   </div>
</div>
';
}
echo $msg;

