<?php
require_once __DIR__ . '/../functions/chat_api.php';

session_start();

if (isset($_POST['reset'])) {
    $_SESSION['chat'] = [];
    header("Location: index.php");
    exit;
}

$input = $_POST['user_input'] ?? '';
if (!empty($input)) {
    $reply = call_ai_api($input);

    $_SESSION['chat'][] = [
        'pergunta' => $input,
        'resposta' => $reply
    ];
}
