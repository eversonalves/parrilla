<?php 

include_once "db.php";


class Tipo{

    // Atributos da class Usuário.

    private $id;
    private $sigla;
    private $rotulo;

    private $pdo;
    public function __construct(){
        $this->pdo = getConnection(); // Realiza a conexão durante a criação da instancia ( objeto ).
    }
    
    // Getters e Setters - Propriedades (C#) ou metodos de acesso das linguagens de progamação.
    
    public function getId(){
        return $this->id;
    }
        
    public function getSigla(){
        return $this->sigla;
    }
        
    public function setSigla(string $sigla){
        $this->sigla = $sigla;
    }
        
    public function getRotulo(){
        return $this->rotulo;
    }
        
    public function setRotulo(string $rotulo){
        $this->rotulo = $rotulo;
    }
        

    // Inserindo Nivel.
        
    public function inserir():bool{
        $sql = "INSERT INTO tipos (sigla, rotulo) VALUES (:sigla, :rotulo)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":sigla", $this->sigla);
        $cmd->bindValue(":rotulo", $this->rotulo);
        $cmd->execute();
        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();   // ( lastInsertId ) Retorna o ultimo Id inserido.
            return true;
        }
        return false;
    }
        
        
    // Listando Nivel.
        
    public function listar():array{
        $cmd = $this->pdo->query("SELECT * FROM tipos ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
        
}
?>