<?php
include('../app/db.php');
$sql1 = "SELECT id, storeName, url FROM pdata WHERE mailstat='N'";
$res1 = $conn->query($sql1);
while($row = $res1->fetch_array()) {
    $uid = $row['id'];
    $checkstore = $row["storeName"];
    $user_input = $row['url'];
    switch ($checkstore) {
        case 'Flipkart':
            include("fk.php");
            break;
        case 'Amazon.in':
            include("am.php");
            break;
        case 'Jabong':
            include("jb.php");
            break;
        case 'Snapdeal':
            include("sd.php");
            break;
        case 'Infibeam':
            include("ib.php");
            break;
        case 'Ebay.in':
            include("eb.php");
            break;
    }
$sql = "UPDATE pdata SET pcurr='$price3' WHERE id=$uid";
echo $sql."</br>";
$conn->query($sql);
}
?>
