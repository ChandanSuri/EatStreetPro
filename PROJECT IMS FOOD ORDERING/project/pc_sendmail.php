<html>
<head> 
<title>Mail Sent!</title> 
</head> 
<body> 
<?php 
$full_name = $_POST['name1']; 
$email_id = $_POST['email1'];
$subject = $_POST['sub1']; 
$message = $_POST['msg1'];
$to = "deepak96garg@gmail.com";
$headers = 'From ' . $full_name . '\r\n'; 
$mailsent = mail($to, $subject, $message, $headers);
if ($mailsent) {
 echo 'Congrats The following message has been sent: <br><br>'; 
echo '<b>To:</b>'.$to.'<br>'; 
echo '<b>From:</b> '.$email_id.'<br>'; 
echo '<b>Subject:</b> '.$subject.'<br>'; 
echo '<b>Message:</b><br>'; 
echo $message; 
} 
else { 
echo 'There was an error...'; 
} 
?> 
</body>
 </html>
