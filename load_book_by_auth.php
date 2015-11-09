<?php
if($_POST['author'])
{
$author_id = $_POST['author'];
include"db.php";

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8 ");
$query_pag_data = "select a.author_id, b.book_id, k.category_id, b.title, k.name, b.create_date, b.description, b.price, b.avg_rating, a.first_name, a.last_name, a.date_of_birth, a.country from book b, author a, book_author d, category k, book_category m where b.book_id = d.book_id and a.author_id = d.author_id and b.book_id = m.book_id and k.category_id = m.category_id and a.author_id = '$author_id' order by b.book_id";
$query_auth_name = "select * from author where author_id = '$author_id'";
$result_pag_data = mysql_query($query_pag_data) or die('Database error' . mysql_error());
$result_auth_name = mysql_query($query_auth_name) or die('Database error' . mysql_error());
$row1 = mysql_fetch_array($result_auth_name);
$msg = "";

if(mysql_num_rows($result_pag_data) > 0) {
$msg .= '<div class="category_name_disp"> Wybrany autor: <strong>'. $row1['first_name'] . ' ' . $row1['last_name'] .'</strong>
<br/> Data urodzenia: ' . $row1['date_of_birth'] .' <br/> Miejsce urodzenia: ' . $row1['country'] . ' <br/> Ilość książek w bazie: ' . mysql_num_rows($result_pag_data) .'</div>';
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
	Przykro nam, niestety nie mamy dostępnych książek wybranego autora.
	</div>
	';
}
echo $msg = "<div class='data'>" . $msg . "</div>";

}

