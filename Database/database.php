<?php
/**
 * Created by PhpStorm.
 * User: Ideapad
 * Date: 22-Nov-16
 * Time: 12:33 PM
 */

/*
 * Host: us-cdbr-iron-east-05.cleardb.net
 * Port: 3306
 * User: b6d9406a066f68
 * SSL: enabled with DHE-RSA-AES256-SHA
*/

$conn; //database connection

function connectToDatabase(){
    $url = "mysql://b6d9406a066f68:1c9f62d1@us-cdbr-iron-east-05.cleardb.net/heroku_b948dd8a5ddec00?reconnect=true"; //ClearDB for Trainee Bot
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

// Create connection
    global $conn;
    $conn = new mysqli($hostname, $username, $password, $database);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connection was successfully established!";

}

connectToDatabase();

function addPendingUser(){

    $completed = "";


    return $completed;
}

function retrievePendingUser(){

    $sql = "SELECT * FROM Pending";

    global $conn;
    $result = mysqli_query($conn,$sql);
    $row_count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $replyStr = "Error fetching data from database";

    $data = array();

    if($row_count > 0){

        foreach ($row as $key => $value){
            echo "{$key} => {$value} ";
//            array_push($data, )
        }

    }else{
        $replyStr = "Can't found in database";
    }

    $response = array(
        'status' => '',
        'code' => '',
        'message' => '',
        'data' => $data
    );

    json_encode($response);

    echo $replyStr;
}

retrievePendingUser();