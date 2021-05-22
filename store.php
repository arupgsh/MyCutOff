<?php
if (empty($_GET['id'])) exit('Nothing Here Bro!');
#-- Message for the username
//echo "<h3>Hang on buddy we are looking for the product</h3>";
#-- Get the id from url
$aff = $_GET['id'];
#-- Connection db to input
include("app/db.php");
// Getting the dirty database content
$sql = "SELECT url, storeName FROM pdata WHERE id='$aff'";
$result = $conn->query($sql);

if(mysqli_num_rows($result)>0){
while($row = $result->fetch_assoc()) {
//    echo "id: " .$row["url"]. " - Name: " . $row["storeName"];
    $url = $row["url"];
    $checkstore = $row["storeName"];
}
}else{ echo "Invalid Product Url!";}
switch ($checkstore) {
    case 'Flipkart':
        header('Location:'.$url."&affid=arupwptro");
        break;
    case 'Amazon.in':
        header('Location:'.$url."&tag=tech015-21");
        break;
    case 'Jabong':
        header('Location:'."https://clk.omgt5.com/?AID=605651&PID=9170&WID=51492&r=".$url);
        break;
    case 'Snapdeal':
        header('Location:'.$url."&utm_source=aff_prog&utm_campaign=afts&offer_id=16&aff_id=10715");
        break;
    case 'Infibeam':
        header('Location:'.$url."&trackId=coupontray");
        break;
    case 'Ebay.in':
        header('Location:'."http://tracking.vcommission.com/aff_c?offer_id=1018&aff_id=25090&source=".$url."&url=http%3A%2F%2Frover.ebay.com%2Frover%2F1%2F4686-203594-43235-14%2F4%3Fmpre%3D".$url);
        break;
}
?>
