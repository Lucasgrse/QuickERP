<?php

$host = 'db';
$db = 'quickerp-db';
$user = 'user';
$pass = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = file_get_contents(__DIR__ . '/sql/V1__create_initial_tables.sql');
    if($sql == false){
        throw new Exception('Erro ao ler o arquivo SQL');
    }
    $pdo->exec($sql);

    echo "Banco de dados criado e migrado com sucesso!";
} catch (PDOException $e) {
    echo "Erro de banco: " . $e->getMessage();
} catch (Exception $e) {
    echo "Erro geral: " . $e->getMessage();
}