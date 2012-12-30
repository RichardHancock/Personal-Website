<!DOCTYPE html>       
<html>
	
	<head>
		<meta charset="UTF-8">
		<title>Space Crazy: Contact</title>
		<link rel="stylesheet" href="css/style.css" >
		<script src="js/functions.js" type="text/javascript"></script>
	</head>

	<body>
		<div id="Banner"><a href="home.html"><h1>Space Crazy Productions</h1></a></div>
		<div id="Nav">
			<div id="Navleft">
				<ul>
					<li><a href="home.html">Home</a></li>
					<li><a href="projects.html">Projects</a></li>
					<li><a href="video.html">Videos</a></li>
					<li><a href="links.html">Links</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div>
			<div id="Navcenter">
				<!-- Social Icons -->
				<ul>
					<li><img src="res/icons/Facebook.png" onclick="social('Facebook')" alt="Facebook"/></li>
					<li><img src="res/icons/Twitter.png" onclick="social('Twitter')" alt="Twitter"/></li>
					<li><img src="res/icons/GooglePlus.png" onclick="social('Google+')" alt="Google+"/></li>
					<li><img src="res/icons/YouTube.png" onclick="social('YouTube')" alt="YouTube"/></li>
					<li><img src="res/icons/LinkedIn.png" onclick="social('LinkedIn')" alt="LinkedIn"/></li>
					<li><img src="res/icons/GitHub.png" onclick="social('GitHub')" alt="GitHub"/></li>
				</ul>
			</div>
			<div id="Navright">
				<input type="text" class="text" name="search" placeholder="Search Term"/> 
				<input type="button" onclick="search()" name="searchbutton" value="Search" />
			</div>
		</div>

		<!-- Contact Form Main PHP Block -->
		<?php if ($_POST['submitted']) {
			// Fetching details from the form and storing in variables
			$name = $_POST['name'];
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			$result = 0;

			// Where Email is sent
			$mail_to = "admin@spacecrazyproductions.com";
			
			// Body
			$body = 'From: '.$name."\n";
			$body .= 'E-mail: '.$email."\n";
			$body .= 'Subject: '.$subject."\n";
			$body .= 'Message: '."\n".$message;

			$headers = 'From: '.$email."\r\n";
			$headers .= 'Reply-To: '.$email."\r\n";
 			
 			// Name longer than 0 Validation
			if(strlen($name) <= 0) {
				$error1 = True;
			}
			// Email longer than 0 and in correct format Validation
			if(strlen($email) <= 0) {
				$error2 = True;
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error3 = True;
			}
			// Subject chosen Validation
			if($service == "Please Select") {
				$error4 = True;
				if($service == "Legal Message") {
					$mail_to = "legal@spacecrazyproductions.com";
				}
			}
			// Message longer than 0 Validation
			if(strlen($message) <= 0) {
				$error5 = True;
			}

			if($error1 || $error2 || $error3 || $error4 || $error5) {
				$result = 1;
			}else{
				$result = 2;
				mail($mail_to, $subject." from ".$name, $body, $headers);
			}
		} ?>
		<!-- END - Contact Form Main PHP Block -->

		<div id="Content">

			<div class="contactWrapper">
				<form action="contact.php" method="post">
					Name: <br>
					<input type="text" placeholder="Your Name" name="name"><span class="errorMsg"><?php if($error1) {echo "Please enter your name.";} ?></span><br>
					Email: <br>
					<input type="text" placeholder="Your Email" name="email"><span class="errorMsg"><?php if($error2) {echo "Please enter your Email Address.";} elseif($error3) {echo "Please enter a valid Email Address.";} ?></span><br>
					Subject: <br>
					<select name="subject">
						<option value="Please Select">Select One</option>
						<option value="General Message">General</option>
						<option value="Web Bug Report">Website Problem/Bug</option>
						<option value="Program Bug Report">Program/Game Problem/Bug</option>
						<option value="Legal Message">Legal Issues</option>
					</select><span class="errorMsg"><?php if($error4) {echo "Please choose a subject.";} ?></span><br>
					Message: <br>
					<textarea name="message" placeholder="Your Message" rows="5" cols="20"></textarea>
					<span class="errorMsg"><?php if($error5) {echo "Please enter your message.";} ?></span><br>
					<input type="hidden" name="submitted" value=1>
					<input type="submit" value="Submit">
					<input type="reset" value="Reset"><br>
					<span class="resultMsg"><?php if($result == 1) {echo "Please correct the form and re-submit it.";} 
					elseif($result == 2) {echo "E-mail sent successfully";} ?></span>
				</form>
			</div>

			<div class="contactText">
				<h3 class="title">Contact</h3>
				<p>
					If you need to contact me use the contact form on the right or use the email addresses listed below:
				</p>
				<dl>
					<dt>General</dt>
					<dd>admin@spacecrazyproductions.com</dd>
					<dt>Legal</dt>
					<dd>legal@spacecrazyproductions.com</dd>
				</dl>
			</div>

		</div>

		<div id="Footer">
			<p style="text-align:center;">Copyright 2012 Richard Hancock</p>
		</div>
	</body>
</html>