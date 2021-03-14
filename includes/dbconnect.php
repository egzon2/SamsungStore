<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=samsungstore", "root", "");
    }catch(PDOException $pdo){
        die("Lidhja me DB - DESHTOJ!");
    }
?>