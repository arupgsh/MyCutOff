<?php
include_once('../app/db.php');
$sql1 = "SELECT p.id ,p.pcurr, p.ptitle, p.pimg, p.pricealt, u.userEmail FROM pdata as p, tbl_users as u WHERE p.userID = u.userID AND mailstat='N'";
$res1 = $conn->query($sql1);
while($row = $res1->fetch_array()) {
      //echo $row['pcurr']."</br>".$row['pricealt']."</br>".$row['userEmail'];
      $umail = $row['userEmail'];
      $pcurr = $row['pcurr'];
      $ptitle = $row['ptitle'];
      $pimg = $row['pimg'];
      $pid = $row['id'];
      $palrt = $row['pricealt'];
      if($palrt>=$pcurr){
      include('mail.php');
      $sql = "UPDATE pdata SET mailstat='Y' WHERE id=$pid";
      echo $sql."</br>";
      $conn->query($sql);
      }
}
?>
