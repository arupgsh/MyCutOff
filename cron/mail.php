<?php
		$subject = "Price Drop Detected";
		$message = "
		<table align='left' valign='middle'>
		<tbody>
		<tr><td><b>A drop in price observed for following product</b></td></tr>
		<tr></tr>
		<tr><td><img src='$pimg' height='160'></td></tr>
		<tr><td><b>$ptitle</b></td></tr>
		<tr><td><b>Rs. $palrt</b></td></tr>
		<tr><td><b><a href='http://mycutoff.in/store.php?id=$pid'><b>Buy Now!</b></a></td></tr>
		</tbody>
		</table>
		";
		echo $message;
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug  = 0;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "ssl";
                $mail->Host       = "smtpdomain.com";
                $mail->Port       = 465;
                $mail->AddAddress($umail);
                $mail->Username="username@email.com";
                $mail->Password="password";
                $mail->SetFrom("hello@mycutoff.in","MyCutOff Alert");
                $mail->AddReplyTo("hello@mycutoff.in","MyCutOff Alert");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();

/*
require_once "../mailer/PHPMailerAutoload.php";

//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "alert@testcamp.in";
$mail->FromName = "Price Drop";

//To address and name
$mail->addAddress("$user_ident", "User");
$mail->addAddress("$user_ident"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("noreply@testcamp.in", "Reply");

//CC and BCC
//$mail->addCC("ccexample.com");
//$mail->addBCC("bccexample.com");
//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Your request is on our list";
$mail->Body = "<i>When the price of your product drop below Rs. $acton we will notify you</i>";
$mail->AltBody = "Link in plain text goes here";

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}*/
?>
