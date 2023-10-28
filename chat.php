<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>53CR37 | Online Chat</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <h3> ChatId: <?=$_SESSION['chatkey']?></h3>
    <h3> Usuário: <?=$_SESSION['user']?></h3>
    <h3> <a href="logout.php"> Sair </a></h3>
    <div id="wrapper">
        <div class="chat_wrapper">
            <div id="chat"></div>
            <form action="" method="POST">
                <textarea name="message" id="message" class="textarea" cols="30" rows="1"></textarea>
            </form>
        </div>
    </div>

    <script>

        setInterval(() => {
            loadChat();
        }, 1000);

        function loadChat(){
            $.post('handlers/messages.php?action=getMessages', function(response){
                $('#chat').html(response);
                $('#chat').scrollTop($('#chat').prop('scrollHeight'));
            });
        }

        $('.textarea').keyup(function(e){
            if(e.which == 13){
                $('form').submit();
            }
        });

        $('form').submit(function(){
            var message = $('.textarea').val();
            $.post('handlers/messages.php?action=sendMessage&message='+message, function(response){
                if(response == 1){
                    loadChat()
                    $('form')[0].reset();
                }
            });
            return false;
        });

    </script>
    
</body>
</html>