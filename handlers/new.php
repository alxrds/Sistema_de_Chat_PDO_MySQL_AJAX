<?php 
    session_start();
    include('../config.php');

    $user = $_POST['usuario'];
    $id = uniqid()."53cR37".uniqid();

    if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($user)){

        $query = $db->prepare("INSERT INTO chat SET chatkey = ?");
        $run = $query->execute([$id]);

        if($run){
            $_SESSION['user'] = $user;
            $_SESSION['chatkey'] = $id;
            header('Location: ../chat.php');
        }

    }