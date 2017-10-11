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

        if($JSONSource['type'] == 'user'){
            $this->user = new LINEUser($JSONSource);
        }
        if($JSONSource['type'] == 'group'){
            $this->group = new LINEGroup($JSONSource);
        }
    }

}

class LINEUser{

    var $userID, $profileURL, $displayName, $statusMessage;

    public function __construct($JSONSource)
    {
        $this->userID = $JSONSource['userId'];
        $this->getProfile();

    }

    public function getProfile(){
        //GET https://api.line.me/v2/bot/profile/{userId}

//        $response = http_get("https://api.line.me/v2/bot/profile/".$this->userID, array("timeout"=>1), $info);
//        print_r($info);

        $access_token = '0njYhyMYv+lXVSXcyIq4uE2/2SFfVI5BFEKs+Kn4L7CCjn9VMbgZcDqllPSHiXox1bnPsA4W4GmTQzQbt2bzC5jmC2fR0099pfxWTby/iS7NTHdqwy35ku5/hFLiXWzYgoR3uLRTkatY4Ew1flWgvAdB04t89/1O/w1cDnyilFU=';
        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

        $url = "https://api.line.me/v2/bot/profile/".$this->userID;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;

        $JSONUser = json_decode($response, true);
        echo '</br>decode'.$JSONUser['data']['pictureUrl'];


    }
}

class LINEGroup{

    var $groupID, $users;

    public function __construct($JSONSource){
        $this->groupID = $JSONSource['groupId'];
    }
}