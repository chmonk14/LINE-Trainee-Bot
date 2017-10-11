<?php
echo "I am a bot";

include 'bot-function.php';
include 'Reply/Residential.php';

$data; //reply data

function reply ($replyMessage){
    global $data;

    $messages2 = [
        'type' => 'text',
        'text' => $replyMessage
    ];

    array_push($data['messages'], $messages2);
}

$access_token = '0njYhyMYv+lXVSXcyIq4uE2/2SFfVI5BFEKs+Kn4L7CCjn9VMbgZcDqllPSHiXox1bnPsA4W4GmTQzQbt2bzC5jmC2fR0099pfxWTby/iS7NTHdqwy35ku5/hFLiXWzYgoR3uLRTkatY4Ew1flWgvAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');

// Parse JSON
$events = json_decode($content, true);

//PROXY
//$proxy = 'velodrome.usefixie.com:80';
//$proxyauth = 'fixie:1sESv3OLyAM3Han';

// Validate parsed JSON data
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {

        reply("what i get : ".var_export($event,true));

        // Reply only when message sent is in 'text' format
        if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
            // Get text sent
            $text = $event['message']['text'];
            // Get replyToken
            $replyToken = $event['replyToken'];

            // Build message to reply back
            $messages = [
                'type' => 'text',
                'text' => 'from Trainee Bot. Ver. 0.0.3 : '.$text
            ];

            // Make a POST Request to Messaging API to reply to sender
            $url = 'https://api.line.me/v2/bot/message/reply';


            //reply
            $data = [
                'replyToken' => $replyToken,
                'messages' => [$messages],
            ];


            $userID = $event['source']['userId'];
//            reply("user ID : ".$userID);

            reply(residentialReply($text));

//            //reply to sth "light"
//            if(stripos($text, 'light') !== false){
//                reply(isLightOn());
//            }
//
//            //reply to sth "turn"
//            if(stripos($text, 'turn') !== false){
//                if (stripos($text, 'on') !== false) reply(turnLightON(true));
//                else if (stripos($text, 'off') !== false) reply(turnLightON(false));
//            }
//
//            //reply to sth equation
//            $isEquation = isEquation($text);
//            if($isEquation[0]){
//                reply("Ans: ".$isEquation[1]);
//
//            }
//
//            //reply to sth "sticker"
//            if(stripos($text, 'sticker') !== false){
//                $tempMessage = [
//                       "type" => "sticker",
//                        "packageId" => "1",
//                        "stickerId" => "1"
//
//                ];
//
//                array_push($data['messages'], $tempMessage);
//            }
//
//            //reply to sth "photo"
//            if(stripos($text, 'photo') !== false){
//                $tempMessage = [
//                    "type" => "image",
//                    "originalContentUrl" => "https://40.media.tumblr.com/da455c51e4468e705a61f1800763c0e8/tumblr_niyf6pOg441sqk7hko1_1280.jpg",
//                    "previewImageUrl" => "https://40.media.tumblr.com/da455c51e4468e705a61f1800763c0e8/tumblr_niyf6pOg441sqk7hko1_1280.jpg"
//
//                ];
//
//                array_push($data['messages'], $tempMessage);
//            }



            $post = json_encode($data);
            $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//            curl_setopt($ch, CURLOPT_PROXY, $proxy);
//            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);

            $result = curl_exec($ch);
            curl_close($ch);

            echo $result . "\r\n";
        }
    }
}
echo "OK";