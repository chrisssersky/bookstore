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
    $query_pag_data = "SELECT b.purchase_id as purchase, p.book_id, k.title, k.price, p.purchase_id, p.quantity, b.user_id, b.purchase_status_id, s.name FROM book k, purchase_status s, purchase b INNER JOIN purchase_item p ON b.purchase_id = p.purchase_id and b.user_id='$user_id' where s.status_id=b.purchase_status_id and p.book_id=k.book_id";
    $result_pag_data = mysql_query($query_pag_data) or die('Database error' . mysql_error());
    if (mysql_num_rows($result_pag_data) > 0) {
        
        $msg = '<div class="table-responsive">
            <table class="table table-striped">
	<thead>
        <tr>
          <th>#</th>
          <th>Okładka</th>
          <th>Tytuł</th>
          <th>Ilość <div class="status_change" id="status_change_q"></th>
		  <th>Cena</th>
		  <th>Usuń</th>
        </tr>
      </thead>
      <tbody>
       ';
        while ($row = mysql_fetch_array($result_pag_data)) {
            $msg .= ' 
          <tr id="item' . $row['purchase'] . '" class="multiple" value="' . $row['book_id'] . '">
		  <th id="auto_num">' . $num_rows++ . '</th>
          <td><img src="images/covers/' . $row['book_id'] . '.jpg" class="book_cover small_cover"></td>
          <td>' . $row['title'] . '</td>
          <td id="quantity:' . $row['purchase_id'] . '" contenteditable="true">' . $row['quantity'] . '</td>
		  <td>' . $row['price'] . ' zł </td>
		  <td> <a class="delete_link" value="' . $row['purchase'] . '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a> </td>
';
            $price = $price + $row['price'] * $row['quantity'];
        }
        $msg .= '		
			</tr>
			</tbody>	
			</table>
			</div>
		<div id="price_block" class="row">
			<div class="col-md-6 show_price_shopcard">
				Całkowity koszt zamówienia: <span id="price_shopcard">' . $price . '</span> zł</div>
			<div class="col-md-6">
				<input id="paycard" type="submit" class="btn-form btn-form-full" name="submit" value="Zapłać i zrealizuj zamówienie"/>
			</div>
		</div></br></br>';
    } else {
        $msg = '
		<div class="nothing_here">
			<i class="fa fa-exclamation-triangle"></i> Twój koszyk jest pusty. 
		</div>';
    }
} else {
    $msg = '<div class="nothing_here">
			<i class="fa fa-exclamation-triangle"></i> Musić być zalogowany. <br/> 
                        Zaloguj się lub załóż konto!
		</div>';
}
echo $msg;
