<?php
function formatResponse($text) {
    $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
    return nl2br($text);
}
