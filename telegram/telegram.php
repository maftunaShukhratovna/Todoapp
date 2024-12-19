<?php
use App\Todo;
use App\User;
use Telegram\Bot;

$bot = new Bot();
$user = new User();
$todos = new Todo();

$bot->setWebhook("https://0450-92-63-204-127.ngrok-free.app/telegram");

$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $text = $update['message']['text'];
    $name = $update['message']['chat']['first_name'];

    if (mb_stripos($text, '/start') !== false) {
        $userId = explode('/start', $text)[1];

        if ($userId) {
            $user->updateTelegramId($chatId, $userId);
            $bot->makeRequest('sendMessage', [
                'chat_id' => $chatId,
                'text' => 'Welcome to ToDO App!!! ' . $name . "\n/task\n/help"
            ]);
        } else {
            $bot->makeRequest('sendMessage', [
                'chat_id' => $chatId,
                'text' => "Sizning ID raqamingiz mavjud emas"
            ]);
        }
        exit();
    }

    if ($text == '/task') {
        $userId = $user->getUserIdByTelegramId($chatId);

        $bot->sendTasks($userId, $chatId);
        exit();
    }
}


if(isset($update['callback_query'])){
    $bot->buttons($update);
    exit();
}












    

