<?php
session_start();
$_SESSIONS['views']=1;
if(!session_is_registered(myusername)){
header("location:main_login.php");
}
?>

<html>
<body>
Login Successful
<form action="Logout.php" method="post">
<input type="submit" value="Log Out"/>
</form>
</body>
</html>
