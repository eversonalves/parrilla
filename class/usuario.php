<?php 

include_once "db.php";


class Usuario{

    // Atributos da class Usuário.

    private $id;
    private $login;
    private $senha;
    private $nivel;

    private $pdo;
    public function __construct(){
        $this->pdo = getConnection(); // Realiza a conexão durante a criação da instancia ( objeto ).
    }
    
    // Getters e Setters - Propriedades (C#) ou metodos de acesso das linguagens de progamação.
    
    public function getId(){
        return $this->id;
    }
        
    public function getLogin(){
        return $this->login;
    }
        
    public function setLogin(string $login){
        $this->login = $login;
    }
        
    public function getSenha(){
        return $this->senha;
    }
        
    public function setSenha(string $senha){
        $this->senha = $senha;
    }
        
    public function getNivel(){
        return $this->nivel;
    }
        
    public function setNivel(string $nivel){
        $this->nivel = $nivel;  
    }
        
    // Inserindo um Usuário.
        
    public function inserir():bool{
        $sql = "INSERT INTO usuarios (login, senha, nivel) VALUES (:login, md5(:senha), :nivel)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $this->login);
        $cmd->bindValue(":senha", $this->senha);
        $cmd->bindValue(":nivel", $this->nivel);
        $cmd->execute();
        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();   // ( lastInsertId ) Retorna o ultimo Id inserido.
            return true;
        }
        return false;
    }
        
        
    // Listando Usuário.
        
    public function listar():array{
        $cmd = $this->pdo->query("SELECT * FROM usuarios ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
        
        
    // Buscando usuário por ID.
        
    public function buscarPorId(int $id):bool{
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            $this->id = $dados['id'];
            $this->login = $dados['login'];
            $this->senha = $dados['senha'];
            $this->nivel = $dados['nivel'];
            return true;
        }
        return false;
    }


    // Efetuar login.
        
    public function efetuarLogin(string $loginInformado, string $senhaInformada):bool{
        $sql = "SELECT * FROM usuarios WHERE login = :login AND senha = md5(:senha)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $loginInformado);
        $cmd->bindValue(":senha", $senhaInformada);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            $this->id = $dados['id'];
            $this->login = $dados['login'];
            $this->senha = $dados['senha'];
            $this->nivel = $dados['nivel'];
            return true;
        }
        return false;
    }


    // Atualizar usuário.

    public function atualizar(int $idUpdate):bool{
        $id = $idUpdate;
        if(!$this->id) return false;
        
        $sql = "UPDATE usuarios SET login = :login, nivel = :nivel WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $this->login);
        $cmd->bindValue(":nivel", $this->nivel);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }


    // Atualizar senha.

    public function atualizarSenha(int $idUpdate, string $novaSenha):bool{
        $id = $idUpdate;
        if(!$this->id) return false;
        
        $sql = "UPDATE usuarios SET senha = md5(:senha) WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":senha", $novaSenha);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }


    // Excluir usuário.


    public function excluir():bool{
        if(!$this->id) return false;

        $sql = "DELETE FROM usuarios WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

}

?>