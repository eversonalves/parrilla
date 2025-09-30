<?php
include_once "db.php";

class Tipo {

    private $id;
    private $sigla;
    private $rotulo;
    private $pdo;

    public function __construct(){
        $this->pdo = getConnection(); 
    }

    public function getId(){
        return $this->id;
    }

    public function getRotulo(){
        return $this->rotulo;
    }

    public function setRotulo(string $rotulo){
        $this->rotulo = $rotulo;
    }

    public function getSigla(){
        return $this->sigla;
    }

    public function setSigla(string $sigla){
        $this->sigla = $sigla;
    }

    // Insert
    public function inserir():bool {
        $sql = "INSERT INTO tipos (sigla, rotulo) VALUES (:sigla, :rotulo)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":sigla", $this->sigla);
        $cmd->bindValue(":rotulo", $this->rotulo);
        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    // Listar
    public function listar():array {
        $cmd = $this->pdo->query("SELECT * FROM tipos ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar por ID
    public function buscarPorId(int $id):array {
        $sql = "SELECT * FROM tipos WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar
    public function atualizar(int $idUpdate):bool {
        $this->id = $idUpdate;
        if(!$this->id) return false;

        $sql = "UPDATE tipos SET 
                sigla = :sigla,
                rotulo = :rotulo
                WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":sigla", $this->sigla);
        $cmd->bindValue(":rotulo", $this->rotulo);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

    // Excluir 
    public function excluir(int $idExcluir):bool {
        $this->id = $idExcluir;
        if(!$this->id) return false;

        $sql = "DELETE FROM tipos WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>