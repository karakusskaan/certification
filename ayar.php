<?php
try {
    $db= new PDO("mysql:host=localhost; dbname=pdo_dersleri","root","" );
    $db ->query("SET CHARSET UTF8");

} catch (PDOException $a) {
    die("hata: ". $a->getMessage());
}