    <?php 

    function getConnection(): PDO{  //  Retorna um objeto PDO.
        static $pdo; 
        if ($pdo === null){    // ( = ) Atribuição ( == ) Comparação  ( === ) Comparação tipo e valor.
            $pdo = new PDO(
                "mysql:host=10.91.47.50;dbname=tdszuphpdb01",  // Host e nome do Banco de Dados.
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