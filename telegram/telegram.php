<?php
use Telegram\Bot;
$bot = new Bot();

var_dump($bot->setWebhook("https://20c4-185-139-138-4.ngrok-free.app/telegram"));

$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $text = $update['message']['text'];
    $name = $update['message']['chat']['first_name'];

    if (mb_stripos($text, '/start') !== false) {
        $bot->startMessage($text, $name, $chatId);
    }
    if ($text == '/task') {
        $bot->taskMessage($chatId);    
    }
}


if(isset($update['callback_query'])){
    $callbackQuery = $update['callback_query'];
    $callbackData = $callbackQuery['data'];
    $chatId = $callbackQuery['message']['chat']['id'];
    $messageId = $callbackQuery['message']['message_id'];

    if (strpos($callbackData, 'task_') === 0) {
        $bot->getTaskInfo($callbackData, $chatId, $messageId);
    } elseif (strpos($callbackData, 'status_') === 0) {
        $bot->StatusChange($callbackData, $chatId);
    } elseif (strpos($callbackData, 'edit_') === 0) {
        $bot->EditTask($callbackData, $chatId, $messageId);
    } 
} elseif ($bot->redis->exists('edit_'.$chatId)) {
    $bot->EditInput($update, $chatId);
}












    

