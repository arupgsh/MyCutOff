<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);

	if($user_login->login($email,$upass))
	{
		$user_login->redirect('home.php');
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>MyCutOff - Create your own deals</title>
    <meta name="description" content="Track prices on Flipkart, Amazon.in, Snapdeal, Infibeam and Jabong, get alerts when price reaches your cutoff and special offers.">
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
		<?php
		if(isset($_GET['inactive']))
		{
			?>
            <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it.
			</div>
            <?php
		}
		?>
        <form class="form-signin" method="post">
        <?php
        if(isset($_GET['error']))
		{
			?>
            <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Wrong Email or Password!</strong>
			</div>
            <?php
		}
		?>
        <h2 class="form-signin-heading">Sign In</h2>
				<p>Sign in or sign up to get price drop alerts .</p><hr>
				<input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtupass" required />
        <button class="btn btn-primary" type="submit" name="btn-login">Sign in</button>
        <a href="signup.php" style="float:right;" class="btn">Sign Up</a><hr />
        <a href="fpass.php">Lost your Password ? </a>
      </form>
	</div>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
