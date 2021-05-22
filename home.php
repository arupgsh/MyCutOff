<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Dashboard | <?php echo $row['userName']; ?></title>
        <!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
				<script src="bootstrap/js/jquery-1.9.1.min.js"></script>
				<link rel="canonical"href="https://dev.twitter.com/web/tweet-button">
				<script>
				$(function () {
	        $('form').on('submit', function (e) {
						function loading_show(){
										$('#loading').html("<img src='http://www.ajaxload.info/images/exemples/25.gif' width='24' height='24' style=''/>").fadeIn('fast');
						}
						function loading_hide(){
								$('#loading').fadeOut('fast');
						}
        		loading_show();
	          e.preventDefault();
	          $.ajax({
	            type: 'post',
	            url: 'app/form.php',
	            data: $('form').serialize(),
	            success: function (r) {
              loading_hide();
              $('#suck').html(r)
	            }
	          });
	        });
					$('form').reset();
	      });
				</script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body id="cntnt">
      	<!-- Include user menu-->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="home.php">MyCutOff</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>
                                                                <?php echo $row['userName']; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="home.php">Add Product</a>
                            </li>
                            <li>
                                <a href="mylist.php">Your List</a>
                            </li>
                            <!--<li>
                                <a href="profile.php">Edit Profile</a>
                            </li>-->
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!--/.fluid-container-->
	<!--Content area starts-->
    <div class="container">
        <div id="home-login">
        <form class="form-signin">
        <h3 class="form-signin-heading">Enter Product Url</h3>
	<p>Copy and paste the <b>product url + price</b> you want to get notified about. Currently we support Flipkart, Amazon.in, Ebay.in, Snapdeal,Jabong & Infibeam. You can request us new store on contact us page.</p><hr/>
        <input type="url" class="input-block-level" placeholder="Enter Product Url (Example: http://www.infibeam.com/Books/d....)" name="url" required />
        <input type="number" class="input-block-level" placeholder="Alert Price" name="alarm" required />
	<input type="hidden" name="user" value="<?php echo $row['userID']; ?>"/>
        <button id="but0" class="btn btn-primary" type="submit" name="btn-reset-pass">Start Tracking</button>
	<hr>
				<div id="loading"></div>
				<div id="suck"></div>
        </form>
        </div>
    </div>
        <!--Content area ends-->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
    </body>

</html>
