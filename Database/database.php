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
        return false;
    }
    echo "Connection was successfully established!";

    return true;
}


function addPendingUser(){

    $completed = "";


    return $completed;
}

function retrievePendingUser(){

    $response = array(
        'status' => '',
        'code' => '',
        'message' => '',
        'data' => array()
    );

    if (!connectToDatabase()){

        $response['status'] = "FAILED";
        $response['message'] = "Can't connect to database";
        $response['code'] = '400';

        return json_encode($response);
    }


    $sql = "SELECT * FROM Pending";

    global $conn;
    $result = mysqli_query($conn,$sql);
    $row_count = mysqli_num_rows($result);
//    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

//    print_r($row);

    $data = array();

    if($row_count > 0){

        while($row = $result->fetch_assoc()) {
            $innerArray = array();
            foreach ($row as $key => $value){
                echo "{$key} => {$value} ";
//                array_push($innerArray, $key => $value);
            }

            array_push($data, $row);
        }

        $response['status'] = "SUCCESS";
        $response['message'] = 'Retrieve data successfully';
        $response['code'] = '200';
        $response['data'] = $data;

    }else{
        $response['status'] = "FAILED";
        $response['message'] = 'Not found on database';
        $response['code'] = '400';

//        echo "Can't found in database";
    }



    echo json_encode($response);
}

retrievePendingUser();