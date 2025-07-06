<?php
require_once __DIR__ . '/../functions/chat_api.php';

session_start();

if (!isset($_SESSION['chat'])) {
    $_SESSION['chat'] = [];
}

// Se for resetar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    $_SESSION['chat'] = [];
    header("Location: index.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_input'])) {
    $input = trim($_POST['user_input']);

    if (!empty($input)) {
        $reply = call_ai_api($input);

        $_SESSION['chat'][] = [
            'pergunta' => $input,
            'resposta' => $reply
        ];
    }

    // 🔁 Redireciona após o POST pra evitar reenvio
    header("Location: index.php");
    exit;
}
