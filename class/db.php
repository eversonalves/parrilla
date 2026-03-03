<?php 

    namespace App;
    use PDO;

    function getConnection(): PDO{  //  Retorna um objeto PDO.
        static $pdo; 
        if ($pdo === null){    // ( = ) Atribuição ( == ) Comparação  ( === ) Comparação tipo e valor.
            $pdo = new PDO(
                //"mysql:host=192.168.20.113;dbname=tdszuphpdb01", // Server casa.
                "mysql:host=10.53.160.6;dbname=evers710_reis_parrilla",  // server escola.
                "evers710_reis",  // Usuário do Banco de Dados.
                "@E88096293r",  //  Senha do Banco de Dados.
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }
        return $pdo;
    } 
?>