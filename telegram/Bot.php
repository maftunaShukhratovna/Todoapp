<?php

namespace Telegram;
use App\Todo;
use App\User;

use Redis;
use GuzzleHttp\Client;

class Bot {
    public $redis;
    private $token;
    private $apiUrl;
    private $client;
    private $todos;
    private $user;
    public function __construct() {
        $this->token = $_ENV['TELEGRAM_BOT_TOKEN']; 
        $this->apiUrl = "https://api.telegram.org/bot" . $this->token . "/";
        $this->client = new Client([
            'base_uri'=>$this->apiUrl
        ]);

        $this->user = new User();
        $this->todos=new Todo();
        $this->redis=new Redis();
        $this->redis->connect('127.0.0.1', 6379);
        
    }


    public function setWebhook($url) {
        $response = $this->client->get($this->apiUrl . 'setWebhook', [
            'query' => ['url' => $url]
        ]);
        return json_decode($response->getBody(), true);
    }


    public function makeRequest(string $method, array $params){
        $this->client->post($method, ['json'=>$params]);
    }

    public function startMessage($text, $name, $chatId){
        $userId = explode('/start', $text)[1];

        if ($userId) {
            $this->user->updateTelegramId($chatId, $userId);
            $this->makeRequest('sendMessage', [
                'chat_id' => $chatId,
                'text' => 'Welcome to ToDO App!!! ' . $name . "\n/task\n/help"
            ]);
        } else {
            $this->makeRequest('sendMessage', [
                'chat_id' => $chatId,
                'text' => "Sizning ID raqamingiz mavjud emas"
            ]);
        }
        exit();
    }

    public function getTaskInfo($callbackData, $chatId, $messageId){
        $taskId = str_replace('task_', '', $callbackData);
        $task = $this->todos->getById($taskId);

        $text = "Task haqida umumiy ma'lumot:\n\n";
        $text .= "📝 Title: " . $task['title'] . "\n";
        $text .= "📅 Yaratilgan sana: " . $task['created_at'] . "\n";
        $text .= "⏰ Deadline: " . $task['due_date'] . "\n";
        $text .= "--- Status: " . $task['status'] . "\n";

        $inlineKeyboard = [
            [
                [
                    'text' => 'Pending',
                    'callback_data' => 'status_pending_' . $task['id']
                ],
                [
                    'text' => 'In Progress',
                    'callback_data' => 'status_inprogress_' . $task['id']
                ],
                [
                    'text' => 'Completed',
                    'callback_data' => 'status_completed_' . $task['id']
                ]
            ],
            [
                [
                    'text' => 'Edit',
                    'callback_data' => 'edit_' . $task['id']
                ]
            ]
        ];

        $this->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => $text,
            'reply_markup' => json_encode(['inline_keyboard' => $inlineKeyboard])
        ]);
    
    }

    public function taskMessage($chatId){
        $userId = $this->user->getUserIdByTelegramId($chatId);
        $this->sendTasks($userId, $chatId);
        exit();
    }


    public function sendTasks($userId, $chatId) {
        if ($userId) {
            $tasks = $this->todos->get($userId);
            $text = "Qilinishi kerak bo'lgan vazifalar:\n\n";
    
            $inlineKeyboard = [];
            $count=0;
            foreach ($tasks as $task) {
                $count++;
                $text .= "Task number-".$count. "\n";
                $text .= "📝 " . $task['title'] . "\n";
                $text .= "Yaratilgan sana: " . $task['created_at'] . "\n";
                $text .= "Deadline: " . $task['due_date'] . "\n";
                $text .= "---------\n";
                
                $inlineKeyboard[] = [[
                    'text' => 'Task '.$count,
                    'callback_data' => 'task_' . $task['id']
                ]];
    
            }
    
            $this->makeRequest('sendMessage', [
                'chat_id' => $chatId,
                'text' => $text,
                'reply_markup' => json_encode(['inline_keyboard' => $inlineKeyboard])
            ]);
        } else {
            $this->makeRequest('sendMessage', [
                'chat_id' => $chatId,
                'text' => "Foydalanuvchi ID si mavjud emas"
            ]);
        }
        exit();
    }

    public function StatusChange($callbackData, $chatId){
        $parts = explode('_', $callbackData);
        $status = $parts[1];
        $taskId = $parts[2];

        if ($status === 'pending') {
            $this->todos->pending($taskId);
        } elseif ($status === 'inprogress') {
            $this->todos->inProgress($taskId);
        } elseif ($status === 'completed') {
            $this->todos->complete($taskId);
        }

        $this->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => "Status '$status' ga o'zgartirildi."
        ]);
        exit();
    }

    public function EditTask($callbackData, $chatId, $messageId){
        $taskId = explode('edit_', $callbackData)[1];
        $this->redis->set('edit_'.$chatId, $taskId);

        $this->makeRequest('editMessageText', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => "Task uchun yangi title kiriting:"
        ]);
        
    }

    public function EditInput($update, $chatId){
        $taskId = $this->redis->get('edit_' . $chatId);
        $newTitle = $update['message']['text']; 

        $this->todos->updateTitle($taskId, $newTitle);

        $this->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => "Task title yangilandi: $newTitle"
        ]);

        $this->redis->del('edit_' . $chatId);
    }

}
