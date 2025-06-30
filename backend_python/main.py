from fastapi import FastAPI, Request
from pydantic import BaseModel
import requests
import os
from fastapi.middleware.cors import CORSMiddleware

app = FastAPI()

# Permitir chamadas do PHP (localhost)
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"], 
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


GROQ_API_KEY = os.getenv("GROQ_API_KEY")
MODEL = os.getenv("MODEL", "llama3-70b-8192")  


class Prompt(BaseModel):
    text: str

@app.post("/gerar")
def gerar_resposta(prompt: Prompt):
    url = "https://api.groq.com/openai/v1/chat/completions"
    headers = {
        "Authorization": f"Bearer {GROQ_API_KEY}",
        "Content-Type": "application/json"
    }
    payload = {
        "model": MODEL,
        "messages": [
            {"role": "system", "content": "Você é um assistente útil e direto."},
            {"role": "user", "content": prompt.text}
        ],
        "temperature": 0.7
    }

    

    try:
        response = requests.post(url, json=payload, headers=headers)
        data = response.json()
        

        reply = data.get("choices", [{}])[0].get("message", {}).get("content", "Erro ao gerar resposta.")
    except Exception as e:
        print(f"❌ Erro na requisição: {e}")
        reply = "Erro na chamada à API."

    return {"response": reply}


if __name__ == "__main__":
    
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8501, log_level="info")