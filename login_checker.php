 <?php
session_start();
include "db.php";
if (isset($_POST['login_on'], $_POST['password']) && !empty($_POST['login_on']) && !empty($_POST['password'])) {
    $login          = mysql_real_escape_string($_POST['login_on']);
    $passwd         = mysql_real_escape_string($_POST['password']);
    $json['login']  = $login;
    $json['passwd'] = $passwd;
}
$sql  = mysql_query("select user_id from user where login = '$login' and password='$passwd'");
$sql1 = mysql_num_rows($sql);
if ($sql1 == 1) {
    while ($row = mysql_fetch_array($sql)) {
        $id = $row['user_id'];
    }
    $_SESSION['login'] = $login;
    $_SESSION['user']  = $id;
    $_SESSION['auth']  = true;
    echo json_encode($json);
} else {
    echo ("Something went wrong...");
}
mysql_close();
?>