<?php 

include_once "db.php";


class Cliente{

    // Atributos da class Cliente.

    private $id_cliente;
    private $nome_completo;
    private $cpf;
    private $email;
    private $telefone;
    private $senha;

    private $pdo;
    public function __construct(){
        $this->pdo = getConnection(); // Realiza a conexão durante a criação da instancia ( objeto ).
    }
    
    // Getters e Setters - Propriedades (C#) ou metodos de acesso das linguagens de progamação.
    
    public function getIdCliente(){
        return $this->id_cliente;
    }
        
    public function getNomeCompleto(){
        return $this->nome_completo;
    }
        
    public function setNomeCompleto(string $nome_completo){
        $this->nome_completo = $nome_completo;
    }
        
    public function getCpf(){
        return $this->cpf;
    }
        
    public function setCpf(string $cpf){
        $this->cpf = $cpf;  
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail(string $email){
        $this->$email = $email;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone(string $telefone){
        $this->$telefone = $telefone;
    }

    public function getSenha(){
        return $this->senha;
    }
        
    public function setSenha(string $senha){
        $this->senha = $senha;
    }
        
    // Inserindo um Cliente.
        
    public function inserir():bool{
        $sql = "INSERT INTO clientes (nome_completo, cpf, email, telefone, senha) VALUES (:nome_completo, :cpf, :email, :telefone, md5(:senha))";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome_completo", $this->nome_completo);
        $cmd->bindValue(":cpf", $this->cpf);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":telefone", $this->telefone);
        $cmd->bindValue(":senha", $this->senha);
        if($cmd->execute()){
            $this->id_cliente = $this->pdo->lastInsertId();   // ( lastInsertId ) Retorna o ultimo Id inserido.
            return true;
        }
        return false;
    }
        
        
    // Listando Cliente.
        
    public function listar():array{
        $cmd = $this->pdo->query("SELECT * FROM clientes ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
        
        
    // Buscando Cliente por ID.
        
    public function buscarPorId(int $id_cliente):bool{
        $sql = "SELECT * FROM clientes WHERE id_cliete = :id_cliente";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_cliente", $id_cliente);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            $this->id_cliente = $dados['id_cliente'];
            $this->nome_completo = $dados['nome_completo'];
            $this->cpf = $dados['cpf'];
            $this->email = $dados['email'];
            $this->telefone = $dados['telefone'];
            $this->senha = $dados['senha'];
            return true;
        }
        return false;
    }


    // Efetuar login cliente.
        
    public function efetuarLoginCliente(string $cpfInformado, string $emailInformada):array{
        $sql = "SELECT * FROM clientes WHERE cpf = :cpf AND email = :email";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":cpf", $cpfInformado);
        $cmd->bindValue(":email", $emailInformada);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        return $dados;
    }


    // Atualizar cliente.

    public function atualizar(int $id_clienteUpdate):bool{
        $id = $id_clienteUpdate;
        if(!$this->id_cliente) return false;
        
        $sql = "UPDATE clientes SET nome_completo = :nome_completo, telefone = :telefone WHERE id_cliente = :id_cliente";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome_completo", $this->nome_completo);
        $cmd->bindValue(":telefone", $this->telefone);
        $cmd->bindValue(":id_cliente", $this->id_cliente, PDO::PARAM_INT);

        return $cmd->execute();
    }


    // Atualizar senha cliente.

    public function atualizarSenha(int $id_clienteUpdate, string $novaSenha):bool{
        $id = $id_clienteUpdate;
        if(!$this->id_cliente) return false;
        
        $sql = "UPDATE clientes SET senha = md5(:senha) WHERE id_cliente = :id_cliente";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":senha", $novaSenha);
        $cmd->bindValue(":id_cliente", $this->id_cliente, PDO::PARAM_INT);

        return $cmd->execute();
    }


    // Excluir cliente.


    public function excluir():bool{
        if(!$this->id_cliente) return false;

        $sql = "DELETE FROM clientes WHERE id_cliente = :id_cliente";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_cliente", $this->id_cliente, PDO::PARAM_INT);

        return $cmd->execute();
    }

}

?>