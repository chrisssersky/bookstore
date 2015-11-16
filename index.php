<?php session_start();  
   error_reporting( E_ALL & ~E_NOTICE );
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>BookStore - Internetowa księgarnia!</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="shortcut icon" href="fav.ico">
      <meta name="Keywords" content="">
      <meta name="Description" content="">
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="style.css" rel="stylesheet">
      <script src="jquery-1.11.1.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <!--<script src="bootstrap-rating.js"></script> -->
	  <script type="text/javascript" src="datepicker/bootstrap-datepicker.js"></script>
	 <script type="text/javascript" src="datepicker/bootstrap-datepickerpl.js" charset="UTF-8"></script>
	 <script type="text/javascript" src="ratings/jquery.raty.js"></script>
	  <link rel="stylesheet" href="ratings/jquery.raty.css">
	<link rel="stylesheet" href="datepicker/datepicker3.css">
      <script src="jquery-validate.js"></script>
      <script src="app.js"></script>
      <link href="miso/stylesheet.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   </head>
   <body>
      <nav class="navbar navbar-vertical-left">
         <ul class="nav navbar-nav">
            <?php include('nav-menu.php')?>
         </ul>
      </nav>
      <div class="container main_box_head">
         <div class="row">
            <div class="col-md-6" style="padding-top:5px;">
               <span class="name_italic">Największy wybór książek w sieci! 
               <?php if ($_SESSION['login'] == true) {
                  ?>Witaj <b><?php echo $_SESSION['login'] ?></b>.</span> <?php } else {?>
               Zostań naszym użytkownikiem.
               <?php } ?>
            </div>
            <div class="col-md-2">
               <?php if ($_SESSION['auth'] == true && $_SESSION['login'] == true) {
                  ?> <button  id="logout" class="login-btn">Wyloguj <span class="glyphicon glyphicon-log-out"></span></button> <?php
                  } else {?>
               <button class="login-btn" type="button" data-toggle="modal" data-target="#myLogin">
               Logowanie <span class="caret"></span>
               </button> <?php } ?>
               <div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myLogin">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="myLoginLabel">Zaloguj się</h4>
                        </div>
                        <div class="modal-body">
                           Jeżeli jesteś naszym użytkownikiem, wpisz swoje dane i zaloguj się do serwisu <span class="name_italic">Bookstore</span>.<br/><br/>
						   <div class="errors" id="error_login"></div>
                           <form action="login_checker.php" method="post" id="login-form">
                              <label>Login:</label>
                              <input class="contact-input" type="text" placeholder="Login" id="login_on" name="login_on"/>
                              <label>Hasło:</label>
                              <input class="contact-input" placeholder="Password" type="password" id="password" name="password"/>
                        </div>
                        <div class="modal-footer">
                        <input type="submit" class="btn-form" name="submit" value="Zaloguj się"/>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-2">
                <?php if ($_SESSION['auth'] == true && $_SESSION['login']== true) { ?> 
				<button id="add_user_main_btn" class="regiser-btn disabled" type="button">
               Rejestracja <span class="caret"></span></button>
				<?php } else { ?>
			   <button id="add_user_main_btn" class="regiser-btn" type="button" data-toggle="modal" data-target="#myRegister">
               Rejestracja <span class="caret"></span>
				</button> <?php } ?>
               <div class="modal fade" id="myRegister" tabindex="-1" role="dialog" aria-labelledby="myRegister">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="myRegisterabel">Zarejestruj się</h4>
                        </div>
                        <div id="add_user_box" class="modal-body">
                           <form action="form_response.php" method="post" id="add_user">
                              Jeżeli chcesz zostać naszym użytkownikiem, wpisz swoje dane a następnie zaloguj się do serwisu <span class="name_italic">Bookstore.</span><br/><br/>
                              <label>Login:</label>
                              <input class="contact-input" type="text" placeholder="Login" id="login" name="login"/>
                              <label>Hasło:</label>
                              <input class="contact-input" placeholder="Password" type="password" id="passwd" name="passwd"/>
                              <label>E-mail:</label>
                              <input class="contact-input" placeholder="E-mail" type="email" id="email" name="email"/>
                              <br/><br/>
                              <label>Imię:</label>
                              <input class="contact-input" placeholder="First name" type="text" id="first_name" name="first_name"/>
                              <label>Nazwisko:</label>
                              <input class="contact-input" placeholder="Last Name" type="text" id="last_email" name="last_name"/>
                              <label>Data urodzenia:</label>
                              <input class="contact-input" placeholder="Date of birth" type="text" id="date_of_birth" name="date_of_birth"/>
                              <label>Płeć:</label>
                              <select class="contact-input" name="sex">
                                 <option value="1">Mężczyzna</option>
                                 <option value="2">Kobieta</option>
                              </select>
                              <label>Adres:</label>
                              <input class="contact-input" placeholder="Address" type="text" id="address" name="address"/>
                              <label>Kraj:</label>
                              <input class="contact-input" placeholder="Country" type="text" id="country" name="country"/>
                        </div>
                        <div id="button_add_user" class="modal-footer">
                        <input type="submit" class="btn-form" name="submit" value="Zarejestruj się"/>
                        </div>
                        </form>
                        <div id="add_user_success" class="modal-body"></div>
                        <div id="user_added" class="modal-footer">
                           <div class="btn-form success-btn"><i class="fa fa-check-square-o"></i> Użytkownik został dodany pomyślnie.</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-2">
               <a href="contact"><button class="contact-btn" type="button">
               Kontakt  &nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
               </button></a>
            </div>
         </div>
      </div>
      <div class="container main_box_logo">
         <div class="row">
            <div class="col-md-6">
               <img src="logo.png" class="img-responsive"alt=""/>
            </div>
            <div class="col-md-6">
			... <?php echo $_POST['purchase']; ?>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row book_mark">
            <div class="col-md-8 search_form">
               <?php if($_GET['p'] == 'books') { ?>
               <form action="load_book_by_type.php" method="post" id="type_word">
                  <div class="input-group">
                     <input type="text" class="form-control form_green" placeholder="Podaj nazwę książki, imię lub nazwisko autora.." name="word" id="word">
                     <span class="input-group-btn">
                     <button class="btn btn-default btn_green" name="submit" type="submit"><i class="fa fa-search"></i></button>
                     </span>
                  </div>
               </form>
               <?php } ?>
            </div>
            <div class="col-md-3">
               <div id="err_place"></div>
            </div>
            <div class="col-md-1 bookmark_end visible-lg"><img src="bookstore-end.png" alt=""/></div>
         </div>
      </div>
      <?php  if (!isset($_GET['p'])) 
         {
         $_GET['p'] = 'home'; 
         }
         $page = $_GET['p']; 
         
         switch($page) {
             case 'books':?>
      <div class="container main_box_1">
         <div class="row">
            <div class="col-md-8">
               <div class="new_ones">
                  <h1>Księgozbiór</h1>
                  <div id="loading"></div>
                  <div id="book">
                     <div class="data"></div>
                     <div class="pagination"></div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="bestseller">
                  <h2>Kategorie</h2>
                  <ul class="category_names" id="category_names"></ul>
               </div>
            </div>
         </div>
      </div>
      <?php break;
         case 'contact': ?>
      <div class="container">
         <div class="row main_box_1">
            <div class="col-md-4">
               <div class="bestseller contact-box">
                  <h2>Kontakt</h2>
                  W razie pytań dotyczących oferty lub zamówienia prosimy o kontakt z Biurem Obsługi Klienta Księgarni Internetowej <i>BookStore</i>. <br/><br/><br/>
                  Infolinia: <span class="single_contact_info">+48 123 456 789</span><br/><br/><br/>
                  Adres e-mail:  <span class="single_contact_info">biuro@bookstore.pl</span><br/><br/><br/>
                  Biuro Obsługi Klienta czynne w dniach:<br/> <span class="single_contact_info">poniedziałek-piątek </span> w godzinach <span class="single_contact_info">9.00-17.00</span><br/><br/><br/>
                  Pytania możecie kierować na podany adres e-mail lub korzystając z formularza znajdującego się obok. Postaramy się rozwiązać każdy problem.
               </div>
            </div>
            <div class="col-md-8">
               <div class="new_ones">
                  <h1>Wyślij wiadomość</h1>
                  <form action="send_email.php" method="post" id="send_email">
                     <label>Imię Nazwisko / Firma:</label>
                     <input class="contact-input" type="text" placeholder="Name / Company name" id="imie" name="imie"/>
                     <label>Adres e-mail:</label>
                     <input class="contact-input" placeholder="E-mail" type="email" id="email" name="email"/>
                     <label>Temat:</label>
                     <input class="contact-input" placeholder="Subject" type="text" id="temat" name="temat"/>
                     <label>Treść wiadomości:</label>
                     <textarea class="contact-input" rows="6"  name="wiadomosc" id="wiadomosc"></textarea>
                     <div class="btn-right"><input type="submit" class="btn-form" name="submit" value="Wyślij wiadomość"/></div>
                     <div class="success" id="submited"></div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php break;
         case 'account': ?>
      <div class="container">
         <div class="row main_box_1">
            <div class="col-md-4">
               <div class="bestseller contact-box">
                  <h2>Menu</h2>
                  <button class="btn btn-cms-menu"><span class="glyphicon glyphicon-plus"></span> Dodaj książkę</button>
                  <button class="btn btn-cms-menu"><span class="glyphicon glyphicon-trash"></span> Usuń książkę</button>
                  <button class="btn btn-cms-menu"><span class="glyphicon glyphicon-trash"></span> Usuń użytownika</button>
                  <button class="btn btn-cms-menu"><span class="glyphicon glyphicon-edit"></span> Edytuj swoje dane</button>
               </div>
            </div>
            <div class="col-md-8">
               <div class="new_ones">
                  <h1>Zarządzaj kontem</h1>
                  <div class="makespace"></div>
               </div>
            </div>
         </div>
      </div>
      <?php  break;
         case 'shop':
           ?>
		   <div class="container main_box_1">
         <div class="row">
            <div class="col-md-8">
               <div class="new_ones">
                  <h1>Twój koszyk</h1>
 				<div id="load_shop_card"></div> 
               </div>
			      <div class="new_ones">
                  <h1>Zakupione produkty</h1>
 				<div id=""></div> 
               </div>
            </div>
			<div class="col-md-4">
               <div class="bestseller">
                  <h2>Informacje</h2>
				  <div class="shop_card_info">
				  Użytkownik może edytować listę produktów w koszyku, zmieniać ilość zamawianych egzemplarzy, usuwać z listy. Cena zamówienia zostanie obliczona automatycznie po wprowadzonych zmianach.<br/><br/>
				  
				  Naszym Klientom oferujemy następujące możliwości dostawy i zapłaty:
				  <ul>				  
				  <li>Kurier, płatność przelewem lub kartą.</li>
				  <li>Kurier, płatność przy odbiorze.</li>
				  <li>Paczkomaty InPost, odbiór osobisty, płatność przelewem lub kartą.</li>
				  <li>Poczta Polska, dostawa do domu, płatność przelewem lub kartą.</li>
				  </ul>
				  
				  Po zakupieniu produktów w naszym sklepie, prosimy o wystawienie oceny oraz dodanie własnej recenzji. <br/></br>
				  <strong>Masz pytania?</strong></br>
				  Nasi doświadczeni pracownicy chętnie Ci pomogą.</br></br>

				  Infolinia: <span class="single_contact_info"> +48 123 456 789</span>
				  
				  </div>
				  </div>
            </div>       
         </div>
      </div>
		   <?php
           break;
         
           case 'home':
               ?>
			   <div class="container main_box_1">
         <div class="row">
            <div class="col-md-8">
               <div class="new_ones">
                  <h1>Nowości</h1>
 				<div id="load_new_ones"></div>  
               </div>
            </div>
            <div class="col-md-4">
               <div class="bestseller">
                  <h2>Bestsellery</h2>
				  <div id="load_bestsellers"></div>
               </div>
            </div>
         </div>
      </div>
	  <?php
           break;
         }
         ?>
      <div class="container footer">
         <div class="row">
            <div class="col-md-3">
               BookStore - Największy wybór książek w sieci! <br/><br/>
               Projekt i realizacja:<br/>
               <a href="#">Krzysztof Serafin</a>
            </div>
            <div class="col-md-3 footer-box">
               <ul class="footer_list">
               <li><a href="/bookstore">Strona główna</a></li>
               <li><a href="books">Dostępne książki</a></li>
               <li><a href="account">Twoje konto</a></li>
               <li><a href="shop">Twój koszyk</a></li>
			   </ul>
            </div>
            <div class="col-md-3 footer-box">
               Infolinia: +48 123 456 789 <br/><br/>
               Biuro Obsługi Klienta:<br/>
               poniedziałek-piątek w godzinach 9:00-17:00
            </div>
            <div class="col-md-3 footer-box">
               Adres e-mail: biuro@bookstore.pl<br/>
               <a href="contact">Formularz kontakowy</a><br/><br/>
               BookStore 2015 &copy; All right reserved.
            </div>
         </div>
      </div>
   </body>
</html>