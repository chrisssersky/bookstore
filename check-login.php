<?php
include "db.php";

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    
    $sql = "select * from user where login = '$login' LIMIT 1;";
    $results = mysql_query($sql);
    if (mysql_num_rows($results) == 1) {
        echo 'false';
    } else {
        echo 'true';
    }
    
} else {
    echo "false";
}
?>