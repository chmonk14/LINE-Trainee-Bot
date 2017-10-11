<?php
/**
 * Created by PhpStorm.
 * User: anantamacair
 * Date: 10/11/2017 AD
 * Time: 11:29 PM
 */

include("Model/LINESource.php");

$user = new LINEUser();
$user->userID = 'U598fd340290868fa5b013ba502212c79';
$user->getProfile();
