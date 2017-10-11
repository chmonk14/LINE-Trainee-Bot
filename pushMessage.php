<?php
/**
 * Created by PhpStorm.
 * User: anantamacair
 * Date: 10/11/2017 AD
 * Time: 4:21 PM
 */

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('<channel access token>');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('<to>', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
