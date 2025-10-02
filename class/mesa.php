<?php
include_once "db.php";

class mesa{

    private $id_mesa;
    private $numero_mesa;
    private $capacidade;

    private $pdo;
    public function __construct(){
        $this->pdo = getConnection(); 
    }

    public function getIdMesa(){
        return $this->id_mesa;
    }

    public function getNumeroMesa(){
        return $this->numero_mesa;
    }

    public function setNumeroMesa(string $numero_mesa){
        $this->numero_mesa = $numero_mesa;
    }

    public function getCapacidade(){
        return $this->capacidade;
    }

    public function setCapacidade(string $capacidade){
        $this->capacidade = $capacidade;
    }

    // Insert mesa
    public function inserir():bool {
        $sql = "INSERT INTO mesas (numero_mesa, capacidade) VALUES (:numero_mesa, :capacidade)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":numero_mesa", $this->numero_mesa);
        $cmd->bindValue(":capacidade", $this->capacidade);
        if($cmd->execute()){
            $this->id_mesa = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    // Listar mesa
    public function listar():array {
        $cmd = $this->pdo->query("SELECT * FROM mesas ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar por ID
    public function buscarPorId(int $id_mesa):array {
        $sql = "SELECT * FROM mesas WHERE id_mesa = :id_mesa";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_mesa", $id_mesa);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar mesa
    public function atualizar(int $idUpdateMesa):bool {
        $this->id_mesa = $idUpdateMesa;
        if(!$this->id_mesa) return false;
        $sql = "UPDATE mesas SET numero_mesa = :numero_mesa, capacidade = :capacidade WHERE id_mesa = :id_mesa";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":numero_mesa", $this->numero_mesa);
        $cmd->bindValue(":capacidade", $this->capacidade);
        $cmd->bindValue(":id_mesa", $this->id_mesa, PDO::PARAM_INT);

        return $cmd->execute();
    }

    // Excluir mesa
    public function excluir(int $idExcluirMesa):bool {
        $this->id_mesa = $idExcluirMesa;
        if(!$this->id_mesa) return false;

        $sql = "DELETE FROM mesas WHERE id_mesa = :id_mesa";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_mesa", $this->id_mesa, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>