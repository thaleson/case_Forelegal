<?php require_once __DIR__ . '/includes/controller.php'; ?>
<?php require_once __DIR__ . '/functions/helpers.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Chat LLM</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>🧠 Chat com IA</h2>
    <form action="index.php" method="post" class="form-area">
        <textarea name="user_input" rows="3" placeholder="Digite sua mensagem aqui..." required></textarea><br>
        <div class="buttons">
            <button type="submit">Enviar</button>
            <button type="submit" name="reset" value="1" class="reset-btn">🔄 Resetar conversa</button>
        </div>
    </form>

    <div class="chat-box">
        <?php
        if (isset($_SESSION['chat'])) {
            foreach ($_SESSION['chat'] as $msg) {
                echo "<div class='bubble user'><strong>Você:</strong> " . htmlspecialchars($msg['pergunta']) . "</div>";
                echo "<div class='bubble ia'><strong>IA:</strong> " . formatResponse($msg['resposta']) . "</div>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
