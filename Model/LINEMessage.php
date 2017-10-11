<?php
/**
 * Created by PhpStorm.
 * User: anantamacair
 * Date: 10/11/2017 AD
 * Time: 11:11 PM
 */

class LINEMessage{

    var $text, $messageID;

    public function __construct($JSONMessage){
        switch ($JSONMessage['type']){
            case 'text': $this->text = $JSONMessage['text']; break;
            case  'sticker': break;
            default: $this->getContent();
        }
    }

    function getContent(){

    }
}