<?php
		$subject = "Your request is on our list";
		$message = "<i>When the price of your product drop below Rs. $acton we will notify you</i>";
		require_once('../mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
                $mail->Host       = "smtp-host.com";       
                $mail->Port       = 465;
                $mail->AddAddress($user_ident);
                $mail->Username="username@email.com";
                $mail->Password="password";
                $mail->SetFrom("hello@mycutoff.in","Price Drop");
                $mail->AddReplyTo("hello@mycutoff.in","Price Drop");
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
}
?>
