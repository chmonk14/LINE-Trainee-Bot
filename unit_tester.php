<?php
/**
 * Created by PhpStorm.
 * User: anantamacair
 * Date: 10/11/2017 AD
 * Time: 11:29 PM
 */

include('Database/database.php');
//include("Model/LINESource.php");

//$user = new LINEUser;
//$user->userID = 'U598fd340290868fa5b013ba502212c79';

//echo "call User profile";
//$user->getProfile();

echo addPendingUser('U598fd340290868fa5b013ba502212c79');
