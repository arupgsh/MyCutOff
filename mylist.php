<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}
//$delete = $_GET['d'];
//echo $delete;
//$page = $_GET['p'];
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt1 = $user_home->runQuery("SELECT * FROM pdata WHERE userID=:uid AND mailstat='N'");
$stmt1->execute(array(":uid"=>$_SESSION['userSession']));
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total = $stmt1->rowCount();;
//$pnoa = ceil($total/10);
?>

<!DOCTYPE html>
<html class="no-js">

    <head>
        <title>Tracking List</title>
        <!-- Bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
				<link rel="canonical"href="https://dev.twitter.com/web/tweet-button">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body id="cntnt">
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
                            <li>
                                <a href="home.php">Add Product</a>
                            </li>
                            <li class="active">
                                <a href="mylist.php">Your List</a>
                            </li>
<!--                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Tutorials <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li><a href="http://www.codingcage.com/search/label/PHP OOP">PHP OOP</a></li>
                                    <li><a href="http://www.codingcage.com/search/label/P">PHP P</a></li>
                                    <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
                                    <li><a href="http://www.codingcage.com/search/label/Bootstrap">Bootstrap</a></li>
                                    <li><a href="http://www.codingcage.com/search/label/CRUD">CRUD</a></li>
                                </ul>
                            </li>
                            <li>
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
			        <div class="form-signin">
			        <h3 class="form-signin-heading">Products on Your List</h3>
				<p>You have currently <b><?php echo $total?></b> items on your list. To add nore visit <b>Add Product</b> page. Want any product removed, <a href="https://twitter.com/mycutoff" target="_blank"><b>tweet us!</b></a></p><hr/>
				<?php
				echo "<table class='table table-striped'><thead><tr><th>Product Image</th><th>Product Details</th><th>Purchase</th></tr></thead><tbody>";
				while($row1 = $stmt1->fetch( PDO::FETCH_ASSOC )){
				echo "<tr><td><img class='pimg' src='".$row1['pimg']."'></td>";
				echo "<td><b>Product name : </b>".$row1['ptitle'];
				echo "</br> <b>Alert price : </b> Rs.".$row1['pricealt'];
				echo "</br> <b>Last checked: </b> Rs.".$row1['pcurr'];
				echo "</br> <b>Store Name : </b>".$row1['storeName']."</td>";
		//		echo "<td><a href='?d=".$row1['id']."'class='btn btn-danger'>Delete</a></td>";
				echo "<td><a href='store.php?id=".$row1['id']."' target='_blank' class='btn btn-success'>Buy Now</a></td></tr>";
				}
				echo "</tbody></table>";
//				echo'<ul class="pagination"><li class="active"><a href="mylist.php?p='.$pno.'>'.$pno++.'</a></li></ul>';
				?>
						</div>
			        </div>
			    </div>
			        <!--Content area ends-->
        <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>

    </body>

</html>
