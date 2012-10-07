<?php
session_start();
$_SESSIONS['views']=1;
if(!session_is_registered(myusername)){
header("location:main_login.php");
}
?>
