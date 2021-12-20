<?php
    $host = 'remotemysql.com';
    $db = 'NfYGDksKBN';
    $user = 'NfYGDksKBN';
    $pass = 'Tk4lOugC9u';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    
try{
$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_ESCEPTION);

}catcg(PDOException $e){
throw bew PDOEsception($e->getMessage());
}
require_once 'crud.php';
$crud= new crud($pdo);
?>
