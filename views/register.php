<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
</head>
<body>
    <div>
        <h2>Cadastro de usuario</h2>
        <form method="post" action="">
            <label for="">Nome</label>
            <input type="text" name id="nome" riquired>
 
            <label for="">Email</label>
            <input type="email" name id="email" riquired>
 
            <label for="">Senha</label>
            <input type="senha" name id="senha" riquired>
 
            <label for="">Perfil</label>
            <select name="perfil" id="perfil">
            <option value="admin">admin</option>
            <option value="gestor">gestor</option>
            <option value="colaboradr">colaborador</option>
        </select>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="">Voltar ao login</a>
    </div>
</body>
</html>