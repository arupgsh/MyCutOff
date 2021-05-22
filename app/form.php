<?php
//blocking direct form access
if (empty($_POST['url'])) exit('<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button><strong>Nothing Found!</strong></div>');
#-- Getting user inputs
$user_input=$_POST['url'];
$user_ident=$_POST['user'];
$acton=$_POST['alarm'];
# The app db file
include("db.php");
#-- Getting Smart by checking http and www
$add = '';
$add .= strpos($user_input,'http://') !== false ? '' : 'http://';
$add .= $user_input;
$user_input = $add;
#-- Detecting store name
$checkstore = parse_url($user_input);
$checkstore = $checkstore['host'];
//Filtering unwanted requests
$storecheck = array('www.flipkart.com', 'www.amazon.in', 'www.jabong.com', 'www.snapdeal.com', 'www.infibeam.com', 'www.ebay.in');
if(!in_array($checkstore,$storecheck)){
  exit('<div class="alert alert-failure"><button class="close" data-dismiss="alert">×</button><strong>Not a valid Product URL</strong></div>');
}
#-- Playing with switch
switch ($checkstore) {
    case 'www.flipkart.com':
        include("fkload.php");
        $store = 'Flipkart';
        break;
    case 'www.amazon.in':
        include("amload.php");
        $store = 'Amazon.in';
        break;
    case 'www.jabong.com':
        include("jbload.php");
        $store = 'Jabong';
        break;
    case 'www.snapdeal.com':
        include("sdload.php");
        $store = 'Snapdeal';
        break;
    case 'www.infibeam.com':
        include("ibload.php");
        $store = 'Infibeam';
        break;
    case 'www.ebay.in':
        include("ebload.php");
        $store = 'Ebay.in';
        break;
}
# Checking if the user is dirty
$_title3=mysql_escape_string($title3);
$sql1 = "SELECT ptitle FROM pdata WHERE ptitle='$_title3' AND storeName='$store' AND userID='$user_ident'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
exit('<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button><strong>Product is already on your list!</strong></div>');
}
# the success part handleing
echo '<div class="alert alert-success">';
echo '<button class="close" data-dismiss="alert">×</button>';
echo '<strong>Success! The item has been added on your  wishlist</strong></div>';
echo "<table class='table table-striped'><thead><tr><th>Product Image</th><th>Product Details</th></tr></thead><tbody>";
echo '<tr><td><img class="pimg" src="'.$image3.'"></td>';
echo '<td><b>Product Name:</b>'.$title3;
echo '<br><b>Current Price:</b>&nbsp Rs.'.$price3;
echo '<br><b>Alert Price:</b>&nbsp Rs.'.$acton;
echo '<br><b>Store Name:</b>'.$store.'</td></tr>';
echo "</tbody></table>";

#-- Inserting new records on the table
$sql = "INSERT INTO pdata (userID, url, pricenow, pcurr, pricealt, ptitle, pimg, storeName, mailstat)
VALUES ('$user_ident','$user_input', '$price3', '$price3', '$acton', '$_title3', '$image3', '$store', 'N')";
$conn->query($sql);
/*if ($conn->query($sql) === TRUE) {
	include("mail.php");
    echo "</br>Well bro, we've heared what you are looking for";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
$conn->close();
?>
