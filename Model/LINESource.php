<?php
/**
 * Created by PhpStorm.
 * User: anantamacair
 * Date: 10/11/2017 AD
 * Time: 11:15 PM
 */

class LINESource
{

    var $user, $group;

    public function __construct($JSONSource){
        switch ($JSONSource['type']) {
            case 'user' : $this->user = new LINEUser($JSONSource);
        }
    }

}

class LINEUser{

    var $userID, $profileURL, $displayName;

    public function __construct($JSONSource)
    {
        $this->userID = $JSONSource['userId'];
        $this->getProfile();

    }

    public function getProfile(){
        //GET https://api.line.me/v2/bot/profile/{userId}

        $response = http_get("https://api.line.me/v2/bot/profile/".$this->userID, array("timeout"=>1), $info);
        print_r($info);

    }
}

class LINEGroup{

    var $groupID, $users;

    public function __construct($JSONSource){
        $this->groupID = $JSONSource['groupId'];
    }
}