<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])
</head>
<body>
    <h2>Chat em Tempo Real</h2>

    <p>Usuário logado: <strong>{{ auth()->user()->name }}</strong></p>
    <a href="{{ route('logout') }}">Sair</a>

    <hr>

    <div id="chat-box" style="border:1px solid #000; height:300px; overflow-y:auto; padding:10px;">
        @foreach($messages as $msg)
            <p>
                <strong>{{ $msg->user->name }}:</strong>
                {{ $msg->message }}
                <small>({{ $msg->created_at->format('H:i:s') }})</small>
            </p>
        @endforeach
    </div>

    <br>

    <form id="chat-form">
        <input type="text" id="message" name="message" placeholder="Digite sua mensagem" style="width:300px;">
        <button type="submit">Enviar</button>
    </form>

    <script>
        window.addEventListener('load', function () {
            const chatBox = document.getElementById('chat-box');
            const form = document.getElementById('chat-form');
            const input = document.getElementById('message');

            console.log('Echo carregado no load?', window.Echo);

            form.addEventListener('submit', async function (e) {
                e.preventDefault();

                const message = input.value.trim();
                if (!message) return;

                try {
                    const response = await fetch("{{ route('chat.send') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({ message })
                    });

                    const data = await response.json();
                    console.log('Mensagem enviada:', data);

                    input.value = '';
                } catch (error) {
                    console.error('Erro ao enviar mensagem:', error);
                }
            });

            if (window.Echo) {
                window.Echo.channel('chat-channel')
                    .listen('.message.sent', (e) => {
                        console.log('Evento recebido:', e);

                        const p = document.createElement('p');
                        p.innerHTML = `<strong>${e.message.user.name}:</strong> ${e.message.message} <small>(${new Date(e.message.created_at).toLocaleTimeString()})</small>`;
                        chatBox.appendChild(p);
                        chatBox.scrollTop = chatBox.scrollHeight;
                    });
            } else {
                console.error('window.Echo não foi carregado.');
            }
        });
    </script>
</body>
</html>