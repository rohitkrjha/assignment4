<?php

ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="kumarshivam"; // Mysql password 
$db_name="users1"; // Database name 
$tbl_name="users"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword"); 
$_SESSION['need']=$myusername;
header("location:index.php");
}
else {
header("location:main_login.php");
}
ob_end_flush();
?>

