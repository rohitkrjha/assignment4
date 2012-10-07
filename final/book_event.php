<?php
	session_start();
	$_SESSIONS['views']=1;
	if(!session_is_registered(myusername)){
		header("location:main_login.php");
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
      				      <h2>Event Booking:</h2>

      					      <form name="book" action="book.php" method="post">
            				    <b>Venue:</b> <select name="venue">
              				      <option value="CS101">CS101</option>
               				     <option value="CS102">CS102</option>
               				     </select><br/><br/>
                			    <b>Date(yyyy-mm-dd):</b><center><input type="text" name="date"></center>
              				      <b>From(hh:mm):</b><center><input type="text" name="from"></center><br/><br/>
                	    			<b>Purpose:</b><br/>
            				        <textarea rows="4" cols="40" name="purpose">
            				        </textarea><br/><br/>
            		      			  <button type="submit">Submit</button>
          			       		  </form>
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
