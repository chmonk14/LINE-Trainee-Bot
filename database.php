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

$url = "mysql://b6d9406a066f68:1c9f62d1@us-cdbr-iron-east-05.cleardb.net/heroku_b948dd8a5ddec00?reconnect=true"; //ClearDB for Trainee Bot
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