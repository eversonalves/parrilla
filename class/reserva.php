<?php 

include_once "db.php";


class Reserva{

    private $id_reserva;
    private $id_cliente;
    private $data_reserva;
    private $horario;
    private $qtn_pessoas;
    private $motivo;
    private $status;
    private $codigo_reserva;

    private $pdo;
    public function __construct(){
        $this->pdo = getConnection();
    }
    
    public function getIdReserva(){
        return $this->id_reserva;
    }

    public function getIdCliente(){
        return $this->id_cliente;
    }

    public function setIdCliente(int $id_cliente){
        $this->id_cliente = $id_cliente;
    }
        
    public function getDataReserva(){
        return $this->data_reserva;
    }
        
    public function setDataReserva(DateTime $data_reserva){
        $this->data_reserva = $data_reserva;
    }
        
    public function getHorario(){
        return $this->horario;
    }
        
    public function setHorario(DateTime $horario){
        $this->horario = $horario;  
    }

    public function getQtnPessoas(){
        return $this->qtn_pessoas;
    }

    public function setQtnPessoas(string $qtn_pessoas){
        $this->qtn_pessoas = $qtn_pessoas;
    }

    public function getMotivo(){
        return $this->motivo;
    }

    public function setMotivo(string $motivo){
        $this->motivo = $motivo;
    }

    public function getStatus(){
        return $this->status;
    }
        
    public function setStatus(string $status){
        $this->status = $status;
    }

    public function getCodigoReserva(){
        return $this->codigo_reserva;
    }

    public function setCodigoReserva(string $codigo_reserva){
        $this->codigo_reserva = $codigo_reserva;
    }
        
    // Inserindo um reserva.
        
    public function inserir():bool{
        $sql = "INSERT INTO reservas (id_cliente, data_reserva, horario, qtn_pessoas, motivo, status, codigo_reserva) VALUES (:id_cliente, :data_reserva, :horario, :qtn_pessoas, :motivo, :status, :codigo_reserva)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_cliente", $this->id_cliente);
        $cmd->bindValue(":data_reserva", $this->data_reserva);
        $cmd->bindValue(":horario", $this->horario);
        $cmd->bindValue(":qtn_pessoas", $this->qtn_pessoas);
        $cmd->bindValue(":motivo", $this->motivo);
        $cmd->bindValue(":status", $this->status);
        $cmd->bindValue(":codigo_reserva", $this->codigo_reserva);
        if($cmd->execute()){
            $this->id_cliente = $this->pdo->lastInsertId();
        }
        return false;
    }
        
        
    // Listando reserva.
        
    public function listar():array{
        $cmd = $this->pdo->query("SELECT * FROM reservas ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
        
        
    // Buscando reserva por ID.
        
    public function buscarPorId(int $id_reserva):bool{
        $sql = "SELECT * FROM reservas WHERE id_reserva = :id_reserva";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_reserva", $id_reserva);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            $this->id_reserva = $dados['id_reserva'];
            $this->id_cliente = $dados['id_cliente'];
            $this->data_reserva = $dados['data_reserva'];
            $this->horario = $dados['horario'];
            $this->qtn_pessoas = $dados['qtn_pessoas'];
            $this->motivo = $dados['motivo'];
            $this->status = $dados['status'];
            $this->codigo_reserva = $dados['codigo_reserva'];
            return true;
        }
        return false;
    }


    // Atualizar reserva.

    public function atualizar(int $id_UpdateReserva):bool{
        $this->id_reserva = $id_UpdateReserva;
        if(!$this->id_reserva) return false; 
        $sql = "UPDATE reservas SET id_cliente = :id_cliente, data_reserva = :data_reserva, horario = :horario, qtn_pessoas = :qtn_pessoas, motivo = :motivo, status = :status, codigo_reserva = :codigo_reserva WHERE id_reserva = :id_reserva";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_cliente", $this->id_cliente);
        $cmd->bindValue(":data_reserva", $this->data_reserva);
        $cmd->bindValue(":horario", $this->horario);
        $cmd->bindValue(":qtn_pessoas", $this->qtn_pessoas);
        $cmd->bindValue(":motivo", $this->motivo);
        $cmd->bindValue(":status", $this->status);
        $cmd->bindValue(":codigo_reserva", $this->codigo_reserva);
        $cmd->bindValue(":id_reserva", $this->id_reserva, PDO::PARAM_INT);

        return $cmd->execute();
    }


    // Excluir cliente.


    public function excluir():bool{
        if(!$this->id_reserva) return false;

        $sql = "DELETE FROM reservas WHERE id_reserva = :id_reserva";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_reserva", $this->id_reserva, PDO::PARAM_INT);

        return $cmd->execute();
    }

}

?>