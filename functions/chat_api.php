<?php
function call_ai_api($input) {
    $data = json_encode(['text' => $input]);

    $ch = curl_init('http://127.0.0.1:8000/gerar'); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    return $result['response'] ?? 'Erro ao gerar resposta.';
}
