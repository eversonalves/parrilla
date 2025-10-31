<?php 

    namespace App;
    use PDO;

    function getConnection(): PDO{  //  Retorna um objeto PDO.
        static $pdo; 
        if ($pdo === null){    // ( = ) Atribuição ( == ) Comparação  ( === ) Comparação tipo e valor.
            $pdo = new PDO(
                //"mysql:host=192.168.20.113;dbname=tdszuphpdb01", // Server casa.
                "mysql:host=10.91.47.222;dbname=tdszuphpdb01",  // server escola.
                "root",  // Usuário do Banco de Dados.
                "123",  //  Senha do Banco de Dados.
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }
        return $pdo;
    } 
?>