<?php
    session_start();
    include('../config.php');
    
    switch($_REQUEST['action']){
        
        case "sendMessage":

            $query = $db->prepare("INSERT INTO messages SET user = ?, message = ?, chatkey = ?");
            $run = $query->execute([$_SESSION['user'], $_REQUEST['message'], $_SESSION['chatkey']]);

            if($run){
                echo 1;
                exit;
            }
            
        break;

        case "getMessages":
            
            $query = $db->prepare("SELECT * FROM messages WHERE chatkey = ?");
            $run = $query->execute([$_SESSION['chatkey']]);

            $rs = $query->fetchAll(PDO::FETCH_OBJ);

            $chat = '';
            foreach($rs as $message){

                if($message->user == $_SESSION['user']){
                    $style = 'style="border: 3px solid green; background: lightgreen"';
                }else{
                    $style = 'style="border: 3px solid gray; background: lightgray"';
                }

                $chat .= 
                '<div class="single-message"'.$style.'>
                    <strong>'.$message->user.': </strong>
                    <br>'.$message->message.
                    '<span>'.date('d-m-Y H:i:s', strtotime($message->date)).
                    '</span>
                </div>';
            }
            echo $chat;

        break;

    }