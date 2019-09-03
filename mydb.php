<?php

function db_connect(){

    $db_user = "user1";
    $db_pass = "vagrant";
    $db_host = "localhost";
    $db_name = "test_db";
    $db_type = "mysql";

    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

    try{
        $pdo = new PDO($dsn, $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        print "接続しました...<br>";

    }catch(PDOException $Exception){
        die('エラー：'.$Exception->getMessage());
    }
    
    return $pdo;

}
?>