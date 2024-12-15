<?php

namespace App;

use GuzzleHttp\Client;

class Bot {
    private $token;
    private $apiUrl;
    private $client;

    public function __construct() {
        $this->token = $_ENV['TELEGRAM_BOT_TOKEN'];
        $this->apiUrl = "https://api.telegram.org/bot" . $this->token . "/";
        $this->client = new Client();
    }

    public function sendMessage($chatId, $text) {
        $url = $this->apiUrl . "sendMessage";

        $this->client->post($url, [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => $text
            ]
        ]);
    }

    public function sendTasks($chatId) {
        $todo = new Todo();
        $tasks = $todo->get($_SESSION['user']['id']);

        $text = "Qilinishi kerak bo`lgan vazifalar:\n\n";

        foreach ($tasks as $task) {
            $text .= "📝 " . $task['title'] . "\n";
            $text .= "Yaratilgan sana: " . $task['created_at'] . "\n";
            $text .= "Deadline: " . $task['due_date'] . "\n";
            $text .= "---------\n";
        }

        $this->sendMessage($chatId, $text);
    }

    public function Requests($update) {
        if (isset($update['message'])) {
            $chatId = $update['message']['chat']['id'];
            $text = $update['message']['text'];

            if ($text == '/start') {
                $this->sendMessage($chatId, "Salom! Bu ToDo App bot. /task orqali barcha tasklarni olishingiz mumkin");
            } elseif ($text == '/task') {
                $this->sendTasks($chatId);
            }
        } else {
            error_log("Yangilanishda 'message' kaliti mavjud emas.");
        }
    }

    
    public function getUpdates() {
        $url = $this->apiUrl . 'getUpdates';
        $response = $this->client->get($url);
        return json_decode($response->getBody(), true)['result'];
    }
}


