
<?php

$updates=(new App\Bot())->getUpdates();

foreach($updates as $update){
    $bot->Requests($update);
}