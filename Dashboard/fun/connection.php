<?php

    $dsn = "mysql:host=localhost;dbname=clothes";
    $useranme = "root";
    $password = "";
    $option = array(

        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    try{
        $coon = new PDO($dsn, $useranme, $password, $option);
        $coon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e){

        echo 'Faild Connection';
    }

