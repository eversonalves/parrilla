<?php    // Conexão com o Banco de dados

    function getConnection(): PDO{ 
        static $pdo; 
        if ($pdo === null){    // ( = ) Atribuição ( == ) Comparação  ( === ) Comparação tipo e valor.
            $pdo = new PDO(
                "mysql:host=10.53.160.6;dbname=evers710_reis_parrilla", // ip do banco e nome do banco
                "evers710_reis",  // usuario do banco
                "@E88096293r",  // senha do usuario do banco
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }
        return $pdo;
    } 
    
?>