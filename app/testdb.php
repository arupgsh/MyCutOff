<?php
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

$sql = "SELECT id, email, url, pricenow, pricealt FROM url";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

    // output data of each row

    while($row = $result->fetch_assoc()) {

        echo "Url -".$row["url"]." Id: " . $row["id"]. " - Email: " . $row["email"]. " -Current Price " . $row["pricenow"]." -Alert Price ".$row["pricealt"]. "<br>";

    }

} else {

    echo "0 results";

}

$conn->close();

?>
