<?php


$updates=(new App\Bot())->getUpdates();

foreach($updates as $update){
    (new App\Bot())->Requests($update);
}

