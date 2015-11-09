<?php
if($_POST['word'])
{
$word_typed = $_POST['word']; 
include"db.php";

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8 ");
$query_pag_data = "select a.author_id, k.category_id, b.book_id, b.title, k.name, b.create_date, b.description, b.price, b.avg_rating, a.first_name, a.last_name, a.date_of_birth, a.country from book b, author a, book_author d, category k, book_category m where b.book_id = d.book_id and a.author_id = d.author_id and b.book_id = m.book_id and k.category_id = m.category_id and (b.title like '%$word_typed%' or a.first_name like '%$word_typed%' or a.last_name like '%$word_typed%' ) order by b.book_id";
$result_pag_data = mysql_query($query_pag_data) or die('Database error' . mysql_error());
$msg = "";

if(mysql_num_rows($result_pag_data) > 0) {
$msg .= '<div class="category_name_disp">Szukana fraza: <strong>' . $word_typed .  '</strong><br/>  Ilość wyszukań: <strong>' . mysql_num_rows($result_pag_data) .'</strong></div>';
while ($row = mysql_fetch_array($result_pag_data)) {
	
$msg .= 
'
<div class="col-md-12 book_display">
   <div class="row">
      <div class="col-md-6 book_content1">
         <h3>' . $row['title'] . '</h3>
      </div>
      <div class="col-md-6 book_content2">
         <div class="autor_category"> <a class="author_info" value="' .$row['author_id']. '">' . $row['first_name'] . ' ' . $row['last_name'] . '</a> ( ' . $row['create_date'] . ' ) <i>Kategoria: </i> <a class="cat_info sort_book" value="'.$row['category_id'].'">' . $row['name'] . '</a></div>
      </div>
   </div>
</div>
<div class="col-md-12 book_display2">
   <div class="col-md-2 book_content2">
      <img src="images/covers/' . $row['book_id'] . '.jpg"/ class="img-responsive book_cover">
   </div>
   <div class="col-md-7 book_content4 ">
      <div class="more">' . $row['description'] . '</div>
   </div>
   <div class="col-md-3 book_content3">
      <div class="col-md-12">
         <div class="row">
            <div class="price"> Cena: <span class="single_price">' . $row['price'] . ' zł</span></div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="row">
            <div class="rating">' . $row['avg_rating'] . '</div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="row">
            <div class="add_purchase"> Dodaj do koszyka <i class="fa fa-shopping-cart"></i></div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="row">
            <div class="add_comment">Recenzje ()</i>
            </div>
         </div>
      </div>
   </div>
</div>';

}}
else {
	$msg .= '
	<div class="nothing_here"> <i class="fa fa-frown-o fa-5x"></i> <br/><br/>
	Szukana fraza: <strong>' . $word_typed .  '</strong><br/> 
	Przykro nam, niestety nie znaleźliśmy wybranej książki w naszej bazie.
	</div>
	';
}
echo $msg = "<div class='data'>" . $msg . "</div>";

} else { 
$msg = "";
echo $msg .= '<div class="nothing_here"> <i class="fa fa-exclamation-triangle fa-5x"></i> <br/><br/> Wpisz do pola wyszukiwania jakieś wyrażenie. </div>' ;}

