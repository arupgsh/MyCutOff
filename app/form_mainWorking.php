<?php
#-- Getting user inputs 
$user_input=$_POST['url'];
$user_ident=$_POST['email_user'];
$acton=$_POST['alarm'];
#-- Detecting store name
$checkstore = parse_url($user_input);
$checkstore = $checkstore['host'];
//echo $checkstore;
if($checkstore=='www.flipkart.com'){
	echo "Flipkart Detected";
	$store= "Flipkart";
}
elseif($checkstore=='www.amazon.in'){
        echo "Amazon.in Dtected";
        $store= "Amazon";
}
elseif($checkstore=='www.jabong.com'){
        echo "Jabong Dtected";
        $store= "Jabong";
}
elseif($checkstore=='www.snapdeal.com'){
        echo "Snapdeal Dtected";
        $store= "Snapdeal";
}
elseif($checkstore=='www.paytm.com'){
        echo "Paytm Dtected";
        $store= "Paytm";
}
else{
echo "Don't Mess with Us";
}
#-- Palying with switch
switch ($checkstore) {
    case 'www.flipkart.com':
        include("fkload.php");
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
}
/*#-- Playing with the url input
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$user_input);
curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_ENCODING, "");
$pagebody=curl_exec($ch);
curl_close ($ch);

include('simple_html_dom.php');
$html = str_get_html($pagebody);

foreach($html->find('.selling-price') as $price1)
	echo $price1."</br>";
   	$price2 = preg_replace("/<span (.*?)>/","", $price1);
	$price3 = preg_replace('/[a-zA-Z or . or ,]/',"",$price2);
	echo $price3;

#-- Connection db to input
$servername = "localhost";
$username = "mysql_user";
$password = "password";
$dbname = "mydname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO url (email,url, pricenow, pricealt)
VALUES ('$user_ident','$user_input', '$price3', '$acton')";

if ($conn->query($sql) === TRUE) {
	include("mail.php");
    echo "</br>Well bro, we've heared what you are looking for";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
