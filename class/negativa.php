<?php
include_once "db.php";

class Negativa{

    private $id_negativa;
    private $id_reserva;
    private $motivo_negativa;
    private $data_registro;

    private $pdo;
    public function __construct(){
        $this->pdo = getConnection(); 
    }

    public function getIdNegativa(){
        return $this->id_negativa;
    }

    public function getIdReserva(){
        return $this->id_reserva;
    }

    public function setIdReserva(int $id_reserva){
        $this->id_reserva = $id_reserva;
    }
    
    public function getMotivoNegativa(){
        return $this->motivo_negativa;
    }

    public function setMotivoNegativa(string $motivo_negativa){
        $this->motivo_negativa = $motivo_negativa;
    }

    public function getDataRegistro(){
        return $this->data_registro;
    }

    public function setDataRegistro(DateTime $data_registro){
        $this->data_registro = $data_registro;
    }

    // Insert negativa
    public function inserir():bool {
        $sql = "INSERT INTO negativas (motivo_negativa, data_registro) VALUES (:motivo_negativa, :data_registro)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":motivo_negativa", $this->motivo_negativa);
        $cmd->bindValue(":data_registro", $this->data_registro);
        if($cmd->execute()){
            $this->id_negativa = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    // Listar negativa
    public function listar():array {
        $cmd = $this->pdo->query("SELECT * FROM negativas ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar por ID
    public function buscarPorId(int $id_negativa):array {
        $sql = "SELECT * FROM negativas WHERE id_negativa = :id_negativas";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_negativa",$id_negativa);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar negativa
    public function atualizar(int $idUpdateNegativa):bool {
        $this->id_negativa = $idUpdateNegativa;
        if(!$this->id_negativa) return false;
        $sql = "UPDATE negativas SET id_reserva = :id_reserva, motivo_negativa = :motivo_negativa, data_registro = :data_registro WHERE id_negativa = :id_negativa";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_reserva", $this->id_reserva);
        $cmd->bindValue(":motivo_negativa", $this->motivo_negativa);
        $cmd->bindValue(":data_registro", $this->data_registro);
        $cmd->bindValue(":id_negativa", $this->id_negativa, PDO::PARAM_INT);

        return $cmd->execute();
    }

    // Excluir negativa
    public function excluir(int $idExcluirNegativa):bool {
        $this->id_negativa = $idExcluirNegativa;
        if(!$this->id_negativa) return false;

        $sql = "DELETE FROM negativas WHERE id_negativa = :id_negativa";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_negativa", $this->id_negativa, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>