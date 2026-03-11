

```markdown
# Sistema de Chat em Tempo Real com Laravel

Projeto desenvolvido para a disciplina de Sistemas Distribuídos.

O sistema implementa:

- Autenticação de usuários
- Envio de e-mail de boas-vindas utilizando fila (queue)
- Chat em tempo real utilizando WebSocket

---

# Funcionalidades

## 1. Autenticação de usuário

O sistema permite:

- Cadastro de usuário
- Login
- Logout

Após realizar login, o usuário pode acessar o chat em tempo real.

---

## 2. Envio de e-mail com fila

Quando um usuário se registra:

1. Um job é adicionado à fila
2. O sistema envia um e-mail de boas-vindas
3. A fila é processada automaticamente

O envio de e-mail é realizado utilizando Mailtrap.

---

## 3. Chat em tempo real

O chat permite:

- envio de mensagens entre usuários logados
- atualização automática da tela
- comunicação em tempo real

A comunicação é feita usando WebSocket com Laravel Reverb.

---

# Tecnologias utilizadas

- PHP
- Laravel
- Laravel Reverb (WebSocket)
- Laravel Queue
- Mailtrap
- JavaScript
- Vite

---

# Requisitos

Para executar o projeto é necessário ter instalado:

- PHP 8+
- Composer
- Node.js
- NPM
- SQLite ou MySQL

---

# Instalação do projeto

Clone o repositório:

```

git clone [https://github.com/Mateus150322/Sistema-de-Chat-em-Tempo-Real-com-Laravel.git](https://github.com/Mateus150322/Sistema-de-Chat-em-Tempo-Real-com-Laravel.git)

```

Entre na pasta do projeto:

```

cd Sistema-de-Chat-em-Tempo-Real-com-Laravel

```

---

# Instalar dependências

Instalar dependências do Laravel:

```

composer install

```

Instalar dependências do frontend:

```

npm install

```

Instalar bibliotecas do WebSocket:

```

npm install laravel-echo pusher-js

```

---

# Configurar ambiente

Copie o arquivo `.env`:

```

cp .env.example .env

```

Gerar chave da aplicação:

```

php artisan key:generate

```

---

# Configurar Broadcast e WebSocket

No `.env` configure:

```

BROADCAST_CONNECTION=reverb

REVERB_SERVER_HOST=0.0.0.0
REVERB_SERVER_PORT=8080

REVERB_HOST=127.0.0.1
REVERB_PORT=8080
REVERB_SCHEME=http

```

---

# Configurar fila

No `.env`:

```

QUEUE_CONNECTION=database

```

---

# Criar banco de dados

Execute:

```

php artisan migrate

```

Isso criará as tabelas:

- users
- jobs
- failed_jobs
- messages

---

# Executar o projeto

Para rodar o sistema é necessário iniciar **4 processos**.

### Servidor Laravel

```

php artisan serve

```

Acesse:

```

[http://127.0.0.1:8000](http://127.0.0.1:8000)

```

---

### Servidor WebSocket

```

php artisan reverb:start

```

---

### Compilar frontend

```

npm run dev

```

---

### Processar fila

```

php artisan queue:work --sleep=30 --tries=5

```

---

# Como testar

1. Acesse `/register`
2. Crie um usuário
3. Faça login
4. Abra o chat em dois navegadores
5. Envie mensagens e observe que elas aparecem em tempo real

---

# Estrutura principal

```

app
├ Controllers
│ ├ AuthController.php
│ └ ChatController.php
│
├ Events
│ └ MessageSent.php
│
├ Mail
│ └ Welcomemail.php
│
└ Models
└ Message.php

resources
└ views
├ login.blade.php
├ register.blade.php
├ chat.blade.php
└ emails
└ welcome.blade.php

```

---

# Autor

Mateus Lima

Disciplina: **Sistemas Distribuídos**
