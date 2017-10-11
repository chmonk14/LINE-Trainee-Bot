<?php
/**
 * Created by PhpStorm.
 * User: anantamacair
 * Date: 10/11/2017 AD
 * Time: 11:05 PM
 */

class LINEEvent
{

    /*
    {
  "replyToken": "nHuyWiB7yP5Zw52FIkcQobQuGDXCTA",
  "type": "message",
  "timestamp": 1462629479859,
  "source": {
    "type": "user",
    "userId": "U206d25c2ea6bd87c17655609a1c37cb8"
  },
  "message": {
    "id": "325708",
    "type": "text",
    "text": "Hello, world"
  }
}
    */
    var $replyToken, $message, $user;


    function __construct($JSONEvent){

        $this->replyToken = $JSONEvent['replyToken'];

        switch ($JSONEvent['type']){
            case 'message': $this->message = new LINEMessage($JSONEvent['message']); break;

            default:    break;
        }

        $this->source = new LINESource($JSONEvent['source']);
    }
}