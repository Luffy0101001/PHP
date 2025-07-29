<?php
    $hostname="localhost";
    $dbname="crud";
    $user="root";
    $password="";
    $DSN="mysql:host=$hostname;dbname=$dbname;password=$password";

    try{
        $pdo = new PDO($DSN,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "connected"; 
    }catch(PDOException $e){
        echo "error".$e->getMessage();
    }
?>