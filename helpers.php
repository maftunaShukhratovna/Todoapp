<?php
function view (string $page, array $data = []) {
    extract($data);
    require 'view/' . $page . '.php';
}

function redirect(string $url) {
    header('Location: '. $url);
}

function apiResponse($data){
    header('Content-Type: application/json');
    echo json_encode($data);
}

