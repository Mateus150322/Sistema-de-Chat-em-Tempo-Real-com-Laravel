
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======


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
>>>>>>> 43a15f9396d0b5099918cf8b16ba6f523087334d
