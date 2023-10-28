<?php

    session_start();
    include('../config.php');

    $user = $_POST['usuario'];
    $id = $_POST['chatkey'];

    if($_SERVER['REQUEST_METHOD']== "POST" && !empty($user) && !empty($id)){
        $query = $db->prepare("SELECT * FROM chat WHERE chatkey = ?");
        $query->execute([$_POST['chatkey']]);
        $res = $query->fetchAll();
        if(count($res) == 0){
            echo "O chat não existe";
        }else{
            $query = $db->prepare("INSERT INTO chat SET nome = ?, chatkey = ?");
            $run = $query->execute([$user, $id]);
                if($run){
                $_SESSION['user'] = $user;
                $_SESSION['chatkey'] = $id;
                header('Location: ../chat.php');
            }
        }
    }