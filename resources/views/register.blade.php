<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Nome"><br><br>
        <input type="email" name="email" placeholder="E-mail"><br><br>
        <input type="password" name="password" placeholder="Senha"><br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <br>
    <a href="{{ route('login.form') }}">Já tenho conta</a>
</body>
</html>