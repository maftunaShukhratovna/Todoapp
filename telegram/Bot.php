<?php

namespace Telegram;

use App\User;
use App\Todo;

use GuzzleHttp\Client;
class Bot {
    private $token;
    private $apiUrl;
    private $client;
    private $users;
    private $todos;
    private $chatState=[];
    private $userEmails=[];

    public function __construct() {
        $this->token = $_ENV['TELEGRAM_BOT_TOKEN']; 
        $this->apiUrl = "https://api.telegram.org/bot" . $this->token . "/";
        $this->client = new Client();

        $this->users=new User();
        $this->todos=new Todo();
    }

    public function setWebhook($url) {
        $response = $this->client->get($this->apiUrl . 'setWebhook', [
            'query' => ['url' => $url]
        ]);
        return json_decode($response->getBody(), true);
    }

    public function start($chatId, $username){
        $text="Salom, {$username}!!! \nBu ToDo bot.\n/login\n/register\n/help";
        $this->sendMessage($chatId,$text);
    }
    public function login($chatId) {
        if (!isset($this->chatState[$chatId])) {
            $this->chatState[$chatId] = 'email';
            $this->sendMessage($chatId, "Email kiriting:");
            return;
        } elseif ($this->chatState[$chatId] === 'email') {
            $update = $this->getMessages();
            $email = $update['message']['text'];
            $this->userEmails[$chatId] = $email; 
            $this->chatState[$chatId] = 'password'; 
            $this->sendMessage($chatId, "Parolni kiriting:");
            return;
        } elseif ($this->chatState[$chatId] === 'password') {
            $update = $this->getMessages();
            $password = $update['message']['text'];

            $email = $this->userEmails[$chatId];
            $user = $this->users->login($email, $password);

            if ($user) {
                $this->sendMessage($chatId, 'Botga Xush kelibsiz');
            } else {
                $this->sendMessage($chatId, "Sizning emailingiz/parolingiz xato yoki mavjud emas");
            }

            unset($this->chatState[$chatId]);
            unset($this->userEmails[$chatId]);
        }
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

    public function getMessages() {
        $update = json_decode(file_get_contents('php://input'), true);
        return $update;
    }
}

