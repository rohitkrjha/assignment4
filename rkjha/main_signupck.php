<?php
include "include/z_db.php";
$userid=$_POST['userid'];
$_SESSION['need']=$_userid;
$password=$_POST['password'];
$agree=$_POST['agree'];
$todo=$_POST['todo'];
$email=$_POST['email'];
$name=$_POST['name'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Test</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/loginstyle.css" />
		<link rel="stylesheet" type="text/css" href="css/slidedown-menu2.css">
		<script type="text/javascript" src="js/slidedown-menu2.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.vticker-min.js"></script>
		
		
		
		<script type="text/javascript">
		$(function(){
      	$("#news").vTicker({
			animation: 'fade',
			mousePause: true,
			showItems: 5
			});
		});
		</script>
	</head>

	<body>
		<div id="container">
		<div id="header">
			<div id="header_logo">
				<a href="www.iitk.ac.in" ><img src="images/iitk-logo.png" alt="IIT Kanpur Logo" id="img_logo"/></a>
			</div>
			<div id="header_text">
				<p>Department of Computer Science and Engineering</br>IIT Kanpur</p>
			</div>
			<div id="header_sideimage">
				<a href="www.cse.iitk.ac.in"><img src="images/cse-iitk.jpg" alt="CSE IIT Kanpur" id="img_sideimage"/></a>
			</div>
		</div>
		<div id="mainbody">
			<div id="top">
				<div id="top_left">
					<p>EVENT MANAGEMENT PLATFORM</p>
				</div>
				<div id="top_right">
                                        <?php
                                        if(isset($_SESSION['need']))
                                        echo"<p>Welcome <b>{$_SESSION['need']}</b></p>";
                                        else
                                        echo "<p>Welcome <b>Guest</b></p>";
                                        ?>
				</div>
			</div>
			<div id="navigation">
     			<ul>
           		<li><a href="#">Home</a></li>
             	<li><a href="#">Rules</a></li>
           		<li><a href="#">Resources</a>
                	<ul>
	           			<li><a href="#">CS101</a></li>
	       		    	<li><a href="#">CS102</a></li>
	   				</ul>
					</li>
             	<li><a href="#">Events</a>
	    				<ul>
							<li><a href="#">Seminars</a></li>
	   			  </ul>
					</li>
             	<li class="last"><a href="#">Contact Me</a></li>
     			</ul>
			</div>
			<div id="bottom">
				<div id="left">
					<div id="leftMenu">
						<!-- START OF MENU -->
						<div id="dhtmlgoodies_slidedown_menu">
							<ul>
								<li><a href="#">Profile</a>
								<ul>
									<li><a href="#">
										View Profile</a></li>
									<li><a href="change_password.php">
										Change Password</a></li>
								</ul>
								</li>
								<li><a href="#">Booking</a>
								<ul>
									<li><a href="#">
										Book an event</a></li>
								</ul>
								</li>
								<li><a href="#">Resources</a>
								<ul>
									<li><a href="#">
									CSE101</a></li>
									<li><a href="#">
								   CSE102</a></li>
								</ul>
								</li>
								<li><a href="#">Events</a>
								<ul>
									<li><a href="#">
										Seminars</a>
									</li>
								</ul>
								</li>
								<li><a href="#">Rules</a>
								<ul>
									<li><a href="#">
										Rules</a></li>
								</ul>
								</li>
							</ul>
						</div>
					<!-- END OF MENU -->
					<script type="text/javascript">
						expandFirstItemAutomatically = 1;
						expandMenuItemByUrl = false;
						initSlideDownMenu();
					</script>
					</div>
					<form action="logout.php" method="post">
						<div>
							<input class="button" type="submit" value="Log Out"/>
						</div>
					</form>
				</div>
				<div id="center">
				<?php
				if(isset($todo) and $todo=="post"){

				$status = "OK";
				$msg="";

				// if userid is less than 3 char then status is not ok
				if(!isset($userid) or strlen($userid) <3){
				$msg=$msg."User id should be =3 or more than 3 char length<BR>";
				$status= "NOTOK";}

				if(!ctype_alnum($userid)){
					$msg=$msg."User id should contain alphanumeric  chars only<BR>";
					$status= "NOTOK";}	


				if(mysql_num_rows(mysql_query("SELECT username FROM users WHERE username = '$userid'"))){
					$msg=$msg."Userid already exists. Please try another one<BR>";
					$status= "NOTOK";}


				if (strlen($password) < 3){
					$msg=$msg."Password must be more than 3 char legth<BR>";
					$status= "NOTOK";}

				if ($agree<>"yes") {
					$msg=$msg."You must agree to terms and conditions<BR>";
					$status= "NOTOK";}

				if($status<>"OK"){
				echo "<font face='Verdana' size='2' color=red>$msg</font><br><center><input type='button' value='Retry' onClick='history.go(-1)'></center>";
				}else{ // if all validations are passed.
				$query=mysql_query("insert into users(username,password) values('$userid','$password')");
				{echo "<font face='Verdana' size='2' color=green>Welcome, You have successfully signed up<br><br><a href=main_login.php>Click here to login</a><br></font>";}
				}
				}
				?>
				</div>
				<div id="sidebar">
					<div class="box">
						<br/><h2 style="color:darkgray;">Updates</h2><br/>
						<div id="news">
						<ul>
							<li>CSE101 booked for Sunday from 11am to 1pm.<br></li>
							<li>CSE Lounge booked for Sunday from 10am to 1pm.<br> </li>
							<li>CSE102 and CSE103 available for booking.<br></li>
							<li>CSE101 booked for Sunday from 11am to 1pm.<br></li>
							<li>CSE Lounge booked for Sunday from 10am to 1pm.<br> </li>
							<li>CSE102 and CSE103 available for booking.<br></li>
						</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p>Designed by <b><em>Rohit Kumar Jha</em></b> as a part of CS251 assignment.</p>
		</div>
		</div>

</body>

</html>
