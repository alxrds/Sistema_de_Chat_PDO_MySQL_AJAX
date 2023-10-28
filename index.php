<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>53CR37 | Online Chat</title>
</head>
<body>
    <h1> Bem vindo ao 53CR37 </h1>
    <h3>O que você deseja?</h3>
    <h4>iniciar uma nova conversa</h4>
    <form action="handlers/new.php" method="POST"><br>
        <input type="text" name="usuario" placeholder="digite seu nome" required><br>
        <button>iniciar</button>
    </form>
    <h4>entrar em uma conversa</h4>
    <form action="handlers/exist.php" method="POST">
        <input type="text" name="usuario" placeholder="digite seu nome" required><br>
        <input type="text" name="chatkey" placeholder="digite o id da conversa" required><br>
        <button>entrar</button>
    </form>
</body>
</html>


    