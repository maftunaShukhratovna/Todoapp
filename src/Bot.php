<?php

namespace App;

use GuzzleHttp\Client;

class Bot {
    private $token;
    private $apiUrl;
    private $client;
    private $lastUpdateId =0;

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
        $userId = $_SESSION['user']['id'] ?? null;

        if ($userId) {
            $tasks = $todo->get($userId);
            $text = "Qilinishi kerak bo`lgan vazifalar:\n\n";

            foreach ($tasks as $task) {
                $text .= "📝 " . $task['title'] . "\n";
                $text .= "Yaratilgan sana: " . $task['created_at'] . "\n";
                $text .= "Deadline: " . $task['due_date'] . "\n";
                $text .= "---------\n";
            }

            $this->sendMessage($chatId, $text);
        } else {
            $this->sendMessage($chatId, "Foydalanuvchi ID mavjud emas.");
        }
    }

    public function Requests($update) {
        if (isset($update['message']['chat']['id']) && isset($update['message']['text'])) {
            $chatId = $update['message']['chat']['id'];
            $text = $update['message']['text'];

            if ($text == '/start') {
                $this->sendMessage($chatId, "Salom! Bu ToDo App bot. /task orqali barcha tasklarni olishingiz mumkin");
            } elseif ($text == '/task') {
                $this->sendTasks($chatId);
            }
        } 
    }



    public function getUpdates() {
        $url = $this->apiUrl . 'getUpdates';
    
        if ($this->lastUpdateId > 0) {
            $url .= '?offset=' . ($this->lastUpdateId + 1);
        }
    
        $response = $this->client->get($url);
        $updates = json_decode($response->getBody(), true)['result'];
    
        if (!empty($updates)) {
            $this->lastUpdateId = end($updates)['update_id'];
        } else {
            $this->lastUpdateId++;
        }
    
        return $updates;
    }
    
}