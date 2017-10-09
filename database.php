<?php
/**
 * Created by PhpStorm.
 * User: Ideapad
 * Date: 22-Nov-16
 * Time: 12:33 PM
 */

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