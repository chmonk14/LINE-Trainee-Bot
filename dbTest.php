<?php
$url = "mysql://nizsshzp1ukftvyw:vn7ew1j2gc9od9ry@sulnwdk5uwjw1r2k.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/ngv6y5a1x2oslw5x";
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection was successfully established!";

$checkQ = "SELECT state FROM Accessory WHERE accID=1";

$result = mysqli_query($conn,$checkQ);
$row_count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$replyStr = "Error fetching data from database";


if($row_count == 1){

    if($row['state']){
        $replyStr = "Light is on";
    }else{
        $replyStr = "Light is off";
    }

}else{
    $replyStr = "Can't found in database";

}


echo $replyStr;