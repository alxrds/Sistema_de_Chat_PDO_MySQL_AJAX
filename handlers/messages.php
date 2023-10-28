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
                $chat .= '<div class="single-message"><strong>'.$message->user.': </strong>'.$message->message.'<span>'.date('d-m-Y H:i:s', strtotime($message->date)).'</span></div>';
            }
            echo $chat;

        break;

    }