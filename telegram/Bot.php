<?php

namespace Telegram;
use App\Todo;

use GuzzleHttp\Client;

class Bot {
    private $token;
    private $apiUrl;
    private $client;
    private $todos;
    public function __construct() {
        $this->token = $_ENV['TELEGRAM_BOT_TOKEN']; 
        $this->apiUrl = "https://api.telegram.org/bot" . $this->token . "/";
        $this->client = new Client([
            'base_uri'=>$this->apiUrl
        ]);

        $this->todos=new Todo();
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


    public function sendTasks($userId, $chatId) {
        if ($userId) {
            $tasks = $this->todos->get($userId);
            $text = "Qilinishi kerak bo'lgan vazifalar:\n\n";
    
            $inlineKeyboard = [];
            foreach ($tasks as $task) {
                $text .= "📝 " . $task['title'] . "\n";
                $text .= "Yaratilgan sana: " . $task['created_at'] . "\n";
                $text .= "Deadline: " . $task['due_date'] . "\n";
                $text .= "---------\n";
    
                $inlineKeyboard[] = [[
                    'text' => $task['title'],
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
    }
    
    

    public function buttons($update) {
        $callbackQuery = $update['callback_query'];
        $callbackData = $callbackQuery['data'];
        $chatId = $callbackQuery['message']['chat']['id'];
    
        if (strpos($callbackData, 'task_') === 0) {
            $taskId = str_replace('task_', '', $callbackData);
            $task = $this->todos->getById($taskId);
    
            $text = "Task haqida umumiy ma'lumot:\n\n";
            $text .= "📝 Title: " . $task['title'] . "\n";
            $text .= "📅 Yaratilgan sana: " . $task['created_at'] . "\n";
            $text .= "⏰ Deadline: " . $task['due_date'] . "\n";
            $text .= "--- Status: " . $task['status'] . "\n";
    
            $inlineKeyboard = [];
    
            $inlineKeyboard[] = [
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
            ];
    
            $this->makeRequest('sendMessage', [
                'chat_id' => $chatId,
                'text' => $text,
                'reply_markup' => json_encode(['inline_keyboard' => $inlineKeyboard])
            ]);
            exit();
        }
    
        if (strpos($callbackData, 'status_') === 0) {
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
    }
    
    
}