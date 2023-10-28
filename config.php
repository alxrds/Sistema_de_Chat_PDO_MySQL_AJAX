<?php

    $dbhost = 'localhost';
    $dbname = 'chat';
    $dbuser = 'root';
    $dbpass = '';

    try{
        $db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");
    }catch(Exception $e){
        echo "Ocorreu o seguinte erro: ", $e->getMessage(), "\n";
    }
