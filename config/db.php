<?php

$host = 'localhost';
$db = 'quickerp';
$user = 'quickerp_user';
$pass = 'quickerp_user123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlFiles = glob(__DIR__ . '/../sql/*.sql');

    foreach ($sqlFiles as $file) {
        $filename = basename($file);

        $sql = file_get_contents($file);
        if ($sql === false) {
            throw new Exception("Erro ao ler o arquivo $filename");
        }

        $pdo->exec($sql);
        echo "Arquivo $filename executado com sucesso.\n";
    }

    echo "Todas as migrations foram executadas.\n";
} catch (PDOException $e) {
    echo "Erro de banco: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Erro geral: " . $e->getMessage() . "\n";
}