<?php
session_start();
if(!empty($_SESSION['id'])){
    header("location: /dashboard");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/styles/register.css">
</head>
<body>
    <form action="/auth-register" method="post">
        <img src="/media/user.svg" alt="">
        <h3>Bem-vindo Novo Usuario</h3>
        <p>Porfavor Insira Seus Dados</p>
         <label for="name">
            Name
            <input type="text" name="name" placeholder="Name">
        </label>
        <label for="email">
            Email
            <input type="email" name="email" placeholder="Email">
        </label>
        <label for="pass">
            Password
            <input type="password" name="pass" placeholder="Password">
        </label>
        <button class="submit" type="submit" >Registrar-se</button>
        <p>Ja tem uma conta? <a href="/login">Sign In</a></p>
    </form>
    <div class="infobox">
        <h1><a class="icon" href="/">RE<span class="greem">E</span>-TOOLS</a></h1>
        <p>
            Bem-vindo ao sistema.
            Este site foi desenvolvido para disponibilizar ferramentas de trabalho que ajudam a aumentar a produtividade e a eficiência dos colaboradores em suas atividades diárias. Nosso objetivo é facilitar a execução das tarefas, tornando os processos mais rápidos, organizados e práticos.
        </p>

        <p>
            Caso encontre alguma dúvida durante o uso do sistema ou identifique qualquer erro, problema ou comportamento inesperado, pedimos que entre em contato com o responsável pelo sistema para receber auxílio ou informar a situação. Dessa forma, poderemos corrigir eventuais falhas e continuar melhorando a plataforma para todos os usuários.
            Agradecemos sua colaboração e desejamos um excelente trabalho.
        </p>
    </div>
</body>
</html>