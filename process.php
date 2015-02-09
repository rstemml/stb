<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
	$message = stripslashes(strip_tags($_POST['message']));
} else {$message = 'No phone entered';}
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
<!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<link href="css/ie8.css" type="text/css" rel="stylesheet"/>
    <![endif]-->
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?php echo $name;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?php echo $email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Message</td>
    <td><?php echo $message;?></td>
  </tr>
</table>
</body>
</html>
<?php
$body = ob_get_contents();

$to = 'leibovitz.kuzen@yandex.ru';
$email = 'email@example.com';
$fromaddress = "you@example.com";
$fromname = "Online Contact";

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "mail@yourdomain.com";
$mail->FromName = "Contact Form";
$mail->AddAddress("leibovitz.kuzen@yandex.ru","Name 1"); // Put your email
$mail->AddAddress("another_address@example.com","Name 2"); // addresses here

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Demo Form:  Contact form submitted";
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient = 'leibovitz.kuzen@yandex.ru';
	$subject = 'Contact form failed';
	$content = $body;	
  mail($recipient, $subject, $content, "From: mail@yourdomain.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
