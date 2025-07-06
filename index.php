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
            $total = count($_SESSION['chat']);
            foreach ($_SESSION['chat'] as $index => $msg) {
                echo "<div class='bubble user'><strong>Você:</strong> " . htmlspecialchars($msg['pergunta']) . "</div>";

                if ($index === $total - 1) {
                    
                    echo "<div class='bubble ia'><strong>IA:</strong> <span class='resposta-digitando'>" . formatResponse($msg['resposta']) . "</span></div>";
                } else {
                    
                    echo "<div class='bubble ia'><strong>IA:</strong> " . formatResponse($msg['resposta']) . "</div>";
                }
            }
        }
        ?>
    </div>
</div>

<!-- Script -->
<script>
    const el = document.querySelector('.resposta-digitando');
    if (el) {
        const texto = el.innerText;
        el.innerText = '';
        let i = 0;
        const intervalo = setInterval(() => {
            el.innerText += texto.charAt(i);
            i++;
            if (i >= texto.length) {
                clearInterval(intervalo);
            }
        }, 20); 
    }
</script>
</body>
</html>
