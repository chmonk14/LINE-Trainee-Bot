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
//        die("Connection failed: " . $conn->connect_error);
        return false;
    }
//    echo "Connection was successfully established!";

    return true;
}


function addPendingUser($userToken){

    $response = array(
        'status' => 'FAILED',
        'code' => '400',
        'message' => '',
        'data' => array()
    );

    global $conn;
    if (!connectToDatabase()){

        $response['message'] = "Can't connect to database";

        echo json_encode($response);
    }

    $sql_does_exist = "SELECT * FROM Pending WHERE LINE_token = $userToken";

    if (mysqli_query($conn,$sql_does_exist)->num_rows == 0){

        $sql_insert = "INSERT INTO Pending (LINE_token) VALUES ($userToken)";

        if ($conn->query($sql_insert) === TRUE) {
            $response['message'] = "We have registered you to server, please wait for confirmation";
        } else {
            $response['message'] = "You already registered please wait for confirmation";
        }


    }else{
        $response['message'] = "You already registered please wait for confirmation";
        echo json_encode($response);

    }

    echo json_encode($response);
}

function retrievePendingUser(){

    $response = array(
        'status' => 'FAILED',
        'code' => '400',
        'message' => '',
        'data' => array()
    );

    if (!connectToDatabase()){
        $response['message'] = "Can't connect to database";

        return json_encode($response);
    }


    $sql = "SELECT * FROM Pending";

    global $conn;
    $result = mysqli_query($conn,$sql);
    $row_count = mysqli_num_rows($result);
//    print_r($row);
    $data = array();

    if($row_count > 0){

        while($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }

        $response['status'] = "SUCCESS";
        $response['message'] = 'Retrieve data successfully';
        $response['code'] = '200';
        $response['data'] = $data;

    }else{
        $response['message'] = 'Not found on database';
    }



    echo json_encode($response);
}

addPendingUser('C6be51751590f25151557e043873ff257');