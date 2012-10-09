<?php
session_start();
$_SESSIONS['views']=1;
if(session_is_registered(myusername)){
header("location:index.php");
}
?>

<?php
        $connection = mysql_connect("localhost","root","kumarshivam");
        if(!$connection){
                die("Database connection failed :" . mysql_error());
        }
        $db_select = mysql_select_db("users1",$connection);
        if(!$db_select){
                die("Database selection failed: " . mysql_error());
        }
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
           		<li><a href="index.php">Home</a></li>
             	<li><a href="rules.html">Rules</a></li>
           		<li><a href="#">Resources</a>
                	<ul>
	           			<li><a href="cs101.php">CS101</a></li>
	       		    	<li><a href="cs102.php">CS102</a></li>
	   				</ul>
					</li>
             	<li><a href="#">Events</a>
	    				<ul>
							<li><a href="seminar.php">Seminars</a></li>
	   			  </ul>
					</li>
             	<li class="last"><a href="#">Contact Us</a></li>
     			</ul>
			</div>
			<div id="bottom">
				<div id="left">
					<div id="leftMenu">
						<!-- START OF MENU -->
						<div id="dhtmlgoodies_slidedown_menu">
							<ul>
								<li><a href="#">Signup</a>
                                                                <ul>
                                                                        <li><a href="main_signup.php">
                                                                           	Sign Up</a></li>
                                                                </ul>
								</li>
								<li><a href="#">Resources</a>
								<ul>
									<li><a href="cs101.php">
									CSE101</a></li>
									<li><a href="cs102.php">
								   CSE102</a></li>
								</ul>
								</li>
								<li><a href="#">Events</a>
								<ul>
									<li><a href="seminar.php">
										Seminars</a>
									</li>
								</ul>
								</li>
								<li><a href="#">Rules</a>
								<ul>
									<li><a href="rules.html">
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
					<form action="checklogin.php" method="post">
						<div>
							<h1>Login Form</h1>
							<label>
								<span>Username</span><input id="myusername" type="text" name="myusername" />
							</label>
							<label>
								<span>Password</span><input id="mypassword" type="password" name="mypassword" />
							</label>
							<label>
								<input class="button" type="submit" name="Submit" value="Login" />
							</label>
						</div>
					</form>
				</div>
				<div id="center">
					<p><br/>This is the <em style="color:darkgray;">Event Managenent Website</em> of <em><a href="www.cse.iitk.ac.in"  style="color:darkgray; text-decoration:none;">CSE Department</a></em> where you can book rooms for events
					 such as classes and seminars. If you do not have an account yet, just signup <a href="main_signup.php" style="color:darkgray; text-decoration:none;">here</a>.Else login into your account to manage and make bookings.<br/></p>
				</div>
				<div id="sidebar">
					<div class="box">
						<br/><h2 style="color:darkgray;">Updates</h2><br/>
						<div id="news">
						<ul>
                                <?php
                                             $qry="SELECT * FROM book ORDER BY date ASC";
                                             $result=mysql_query($qry);
                                             if(!$result){
                                                   die("database query failed: " . mysql_error());

                                             }
                                             while($row=mysql_fetch_array($result)){
						if(((strtotime($row['date']) - strtotime(date("Y-m-d"))) / (60 * 60 * 24))<=7)
                                        	     echo "<li>Room {$row['venue']} for {$row['date']} at {$row['from']} for {$row['purpose']} </li><br/>";
                                        }
                                ?>

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
