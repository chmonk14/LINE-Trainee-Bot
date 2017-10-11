<?php
/**
 * Created by PhpStorm.
 * User: anantamacair
 * Date: 10/11/2017 AD
 * Time: 3:56 PM
 */

function residentialReply($inputMessage){

    $replyMessage = "";

    if (stripos($inputMessage, 'elec') ){
        $replyMessage .= 'electric';
    }else{
        $replyMessage .= 'not electric';
    }

    return $replyMessage;
}