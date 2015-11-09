<?php
mysql_connect("localhost", "root") or die ("Nie mozna sie połaczyc");
mysql_select_db("bookstore") or die ("Nie mozna sie polaczyc z baza");
error_reporting(E_ALL ^ E_NOTICE); 
?>

<?php 
$var=array();
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8 ");

$query1= mysql_query("select category.name, category.category_id, count(book_category.category_id) as items_in_cat from category left join book_category on category.category_id = book_category.category_id group by category.name order by category.name;
");

while($rekord1 = mysql_fetch_object($query1)) {
$result1[]=$rekord1;
}

$query2= mysql_query("select b.title, b.create_date, b.description, b.price, b.avg_rating, a.first_name, a.last_name, a.date_of_birth, a.country from book b, author a, book_author d where b.book_id = d.book_id and a.author_id = d.author_id");

while($rekord2 = mysql_fetch_object($query2)) {
$result2[]=$rekord2;
}

$show_data=array('category_names'=>$result1, 'book_info'=>$result2); 
echo json_encode($show_data);

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($show_data));
fclose($fp);

?>

