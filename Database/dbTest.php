<?php
$url = "mysql://b6d9406a066f68:1c9f62d1@us-cdbr-iron-east-05.cleardb.net/heroku_b948dd8a5ddec00?reconnect=true";
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

$checkQ = "SELECT * FROM Customer";

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