<?php
use Telegram\Bot;

$bot=new Bot();

var_dump($bot->setWebhook("https://7409-92-63-204-127.ngrok-free.app/telegram"));

$update=$bot->getMessages();

if (isset($update['message']['chat']['id']) && isset($update['message']['text'])) {
    $chatId = $update['message']['chat']['id'];
    $text = $update['message']['text'];
    $username=$update['message']['chat']['first_name'];

    if($text=='/start'){
        $bot->start($chatId, $username);
    } elseif ($text=='/login'){
        $bot->login($chatId);
    }
    // } elseif ($text=='/register'){
    //     $bot->register($chatId);
    // }
}







    

