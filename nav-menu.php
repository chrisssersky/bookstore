<?php
if (!isset($_GET['p'])) {
    $_GET['p'] = 'home';
}
$page = $_GET['p'];
echo '<li>
        <a ' . ($page == 'home' ? 'class="selected"' : '') . ' href="/bookstore">
          <i class="fa fa-2x fa fa-home star-more"></i> 
          <span>Home</span>
        </a>
      </li>';
echo '<li>
	       <a ' . ($page == 'books' ? 'class="selected"' : '') . ' href="books">
          <i class="fa fa-2x fa-book"></i> 
          <span>Książki</span>
        </a>
      </li>';
if ($_SESSION['auth'] == true) {
    echo '<li>
       <a ' . ($page == 'shop' ? 'class="selected"' : '') . ' href="shop">
          <i class="fa fa-2x fa-shopping-cart"></i> 
          <span>Koszyk</span>
        </a>
</li>';
} else {
    echo '<li class="disabled">
       <a ' . ($page == 'naszeprace' ? 'class="selected"' : '') . '>
          <i class="fa fa-2x fa-shopping-cart"></i> 
          <span>Koszyk</span>
        </a>
</li>';
}
if ($_SESSION['auth'] == true) {
    echo '<li>
        <a ' . ($page == 'account' ? 'class="selected"' : '') . ' href="account">
          <i class="fa fa-2x fa-cog"></i> 
          <span>Konto</span>
        </a>
</li>';
} else {
    echo '<li class="disabled">
        <a ' . ($page == 'account' ? 'class="selected"' : '') . '>
          <i class="fa fa-2x fa-cog"></i> 
          <span>Konto</span>
        </a>
</li>';
}
echo '<li>
       <a ' . ($page == 'contact' ? 'class="selected"' : '') . ' href="contact">
          <i class="fa fa-2x fa-envelope"></i> 
          <span>Kontakt</span>
        </a>
      </li>';
?> 