<?php
$field_name = $_POST['name'];
$field_email = $_POST['email'];
$field_message = $_POST['message'];

$mail_to = 'ygrichman@mail.com'; // Test Email address
$subject = 'Message from a site visitor: '.$field_name;

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '."\n".$field_message;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Thank you for the message. We will contact you shortly.');
		window.location = 'http://spacecrazyproductions.com/dev/contact.html'; 
		//Domain tenative
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed.');
		window.location = 'http://spacecrazyproductions.com/dev/contact.html'; 
		//Domain tenative
	</script>
<?php
}
?>