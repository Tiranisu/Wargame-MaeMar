<?php
const DB_HOST = 'db';
const DB_PORT = '5432';
const DB_NAME = 'mydb';
const DB_USER = 'postgres';
const DB_PWD = 'password';

function dbConnect(){
    $dsn = 'pgsql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
    $conn = null;
    try {
        $conn = new PDO($dsn, DB_USER, DB_PWD);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    return $conn;
}
?>
