<?php
  include"db.php";
  $numer_id= mysql_query("select user_id from user order by user_id desc");
  $row = mysql_fetch_row($numer_id);
  $numer = $row[0]+1;
  
  $json = array(
  	'user_id' => 0,
	'role_id' => 0,
	'detail_id' =>0,
	'login' => 0,
  	'passwd' => 0,
  	'email' => 0,
  	'first_name' => 0,
  	'last_name' => 0,
  	'date_of_birth' => 0,
  	'sex' => 0,
	'address' =>0,
  	'country' => 0,
  	);
  	
  if(isset($_POST['login'], $_POST['passwd'],
   $_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['date_of_birth'], $_POST['sex'], $_POST['address'], $_POST['country']) && !empty($_POST['login']) &&  !empty($_POST['passwd']) &&
   !empty($_POST['email']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['date_of_birth']) && !empty($_POST['sex']) && !empty($_POST['address']) && !empty($_POST['country']) ) {
	$login = $_POST['login'];
  	$passwd = $_POST['passwd'];
  	$email = $_POST['email'];
  	$first_name = $_POST['first_name'];
  	$last_name = $_POST['last_name'];
  	$date_of_birth = $_POST['date_of_birth'];
	$sex = $_POST['sex'];
	$address = $_POST['address'];
	$country = $_POST['country'];
  	$role_id = 2;
	
	$json['user_id'] = $numer;
	$json['role_id'] = 2;
	$json['detail_id'] = $numer;
  	$json['login'] = $login;
  	$json['passwd'] = $passwd;
  	$json['email'] = $email;
  	$json['first_name'] = $first_name;
  	$json['last_name'] = $last_name;
  	$json['date_of_birth'] = $date_of_birth;
  	$json['sex'] = $sex;
  	$json['address'] = $address;
	$json['country'] = $country;
   }
  
  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER SET utf8 ");
  
  $sql2 = "INSERT INTO `user_details`(`detail_id`, `first_name`, `last_name`, `date_of_birth`, `sex`, `street`, `country`) VALUES ('$numer', '$first_name', '$last_name', STR_TO_DATE('$date_of_birth', '%Y-%m-%d'), '$sex' ,'$address', '$country')";

  $sql = "INSERT INTO `user`(`user_id`, `role_id`, `detail_id`, `login`, `password`, `email`) VALUES ('$numer', '$role_id', '$numer', '$login', '$passwd', '$email')";  
  
  $result1 = mysql_query($sql2);
  $result = mysql_query($sql);
  
  if($result1)
  { mysql_close();
  $result = mysql_query($sql);
  echo json_encode($json);
  }
  else
  {
  echo("Something went wrong...");
  }
  
  mysql_close();
  
  ?>