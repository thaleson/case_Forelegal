# 🧠 Chat com IA (PHP + Python)

Sistema simples e funcional de **chat com IA**, usando:

- 🐍 **FastAPI** (Python) no backend  
- 🐘 **PHP** no frontend com HTML/CSS  
- 🌐 Comunicação via HTTP entre PHP e FastAPI  
- 🔐 Suporte a `.env` com chave da API (Groq ou OpenAI)  
- 📦 Sem necessidade de Docker — ideal para **testes rápidos** no [Replit](https://replit.com/) ou localmente  

---

## ✨ Funcionalidades

| Recurso           | Descrição                                                                 |
|-------------------|---------------------------------------------------------------------------|
| 🧠 Chat com IA     | Você digita mensagens, a IA responde com base no modelo Groq/OpenAI       |
| 🧵 Histórico       | Armazena perguntas e respostas na sessão (em PHP)                         |
| 🌐 API Python      | Usa FastAPI para gerar respostas via POST `/gerar`                        |
| 🔒 Variáveis .env  | Configurações sensíveis como chave da API ficam em `.env`                |

---

## 🚀 Como Executar

### 🔧 Requisitos

- Python 3.10+
- PHP 7.4+
- Navegador moderno
- Git (opcional)
- Opcional: Conta no [Replit](https://replit.com/)

---

### 🐍 Backend (Python)

1. Acesse a pasta do backend:
```bash
cd backend_python
```

2. Instale as dependências:
```bash
pip install -r requirements.txt
```

3. Crie um arquivo `.env` com sua chave:
```env
GROQ_API_KEY="sua-chave-aqui"
MODEL="llama3-70b-8192"
```

4. Rode o backend:
```bash
uvicorn main:app --host=0.0.0.0 --port=8501
```

---

### 🐘 Frontend (PHP)

1. Inicie o servidor PHP:
```bash
php -S localhost:8000
```

2. Acesse via navegador:
```
http://localhost:8000
```

3. Pronto! Envie mensagens para a IA.

---

## 💻 Instalação por Sistema Operacional

### 🪟 Windows
- Instale Python no [site oficial](https://www.python.org/)
- Instale PHP no [site do PHP](https://windows.php.net/download)
- Rode os comandos via CMD ou PowerShell

### 🐧 Linux (Ubuntu/Debian)
```bash
sudo apt update
sudo apt install python3 python3-pip php
```

### 🍎 macOS
```bash
brew install python php
```

---

## 📁 Estrutura de Pastas

```
.
├── backend_python/
│   ├── main.py
│   ├── requirements.txt
│   └── .env.example
├── includes/
├── functions/
├── css/
│   └── style.css
├── index.php
```

---

## 🛡️ Segurança

- ⚠️ **Nunca envie sua `.env` para repositórios públicos**
- ✅ Use `.env.example` para exemplos
- 🔐 Variáveis sensíveis são carregadas com `python-dotenv`

---

## 📜 Licença

Este projeto é de uso educacional. Sinta-se livre para modificar!

---

Feito com ❤️ por [Thaleson](https://github.com/thaleson19)