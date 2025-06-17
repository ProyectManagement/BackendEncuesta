<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .chat-container {
            width: 400px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .chat-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .chat-body {
            height: 300px;
            overflow-y: auto;
            padding: 10px;
            background-color: #fff;
        }
        .chat-input {
            display: flex;
            border-top: 1px solid #ccc;
        }
        .chat-input input {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
        }
        .chat-input button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .chat-input button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-bottom: 10px;
        }
        .message.user {
            text-align: right;
            color: #007bff;
        }
        .message.bot {
            text-align: left;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">Chatbot</div>
        <div class="chat-body" id="chat-body"></div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="Escribe tu pregunta...">
            <button onclick="sendMessage()">Enviar</button>
        </div>
    </div>

    <script>
        const chatBody = document.getElementById('chat-body');

        function sendMessage() {
            const userInput = document.getElementById('user-input');
            const question = userInput.value.trim();

            if (!question) return;

            // Mostrar pregunta del usuario
            appendMessage(question, 'user');

            // Limpiar input
            userInput.value = '';

            // Enviar pregunta al backend
            fetch('/chatbot/ask', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ question })
            })
            .then(response => response.json())
            .then(data => {
                // Mostrar respuesta del bot
                appendMessage(data.response, 'bot');
            })
            .catch(error => {
                console.error('Error:', error);
                appendMessage('Ocurrió un error al procesar tu solicitud.', 'bot');
            });
        }

        function appendMessage(message, sender) {
            const messageElement = document.createElement('div');
            messageElement.classList.add('message', sender);
            messageElement.textContent = message;
            chatBody.appendChild(messageElement);

            // Desplazar hacia abajo
            chatBody.scrollTop = chatBody.scrollHeight;
        }
    </script>
</body>
</html>