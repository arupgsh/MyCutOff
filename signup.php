<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));

	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$code))
		{
			$id = $reg_user->lasdID();
			$key = base64_encode($id);
			$id = $key;

			$message = "
						Hello $uname,
						<br /><br />
						Welcome to MyCutOff!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://mycutoff.in/verify.php?id=$id&code=$code'>Verify Account</a>
						<br /><br />
						Thanks,
						</br>MyCutOff Team";

			$subject = "Confirm Registration";

			$reg_user->send_mail($email,$message,$subject);
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account.
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Signup to Get Started</title>
    <meta content="description" content="Sign up for MyCutOff">
    <!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
        <!--Including guest user header-->
    <?php include("umenu.php");?>
    <div class="container">
	<div id="home-login">
	<?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Sign Up</h2>
	<p>Sign up for MyCutOff and set up custmized price drop alerts for free.</p><hr>
        <input type="text" class="input-block-level" placeholder="Name" name="txtuname" required />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtpass" required />
        <button class="btn btn-medium btn-primary" type="submit" name="btn-signup">Sign Up</button>
        <a href="index.php" style="float:right;" class="btn btn-medium">Sign In</a><hr>
      </form>
	</div>
    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
