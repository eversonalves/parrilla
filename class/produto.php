<?php 

include_once "db.php";


class Produto{

    // Atributos da class Produto.

    private $id;
    private $tipoId;
    private $descricao;
    private $resumo;
    private $valor;
    private $imagem;
    private $destaque;

    private $pdo;
    public function __construct(){
        $this->pdo = getConnection(); // Realiza a conexão durante a criação da instancia ( objeto ).
    }
    
    // Getters e Setters - Propriedades (C#) ou metodos de acesso das linguagens de progamação.
    
    public function getId(){
        return $this->id;
    }
        
    public function getTipoId(){
        return $this->tipoId;
    }

    public function setTipoId(int $tipoId){
        $this->tipoId = $tipoId;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao(string $descricao){
        $this->descricao = $descricao;
    }

    public function getResumo(){
        return $this->resumo;
    }

    public function setResumo(string $resumo){
        $this->resumo = $resumo;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor(float $valor){
        $this->valor = $valor;
    }

    public function getImagem(){
        return $this->imagem;
    }

    public function setImagem(string $imagem){
        $this->imagem = $imagem;
    }

    public function getDestaque(){
        return $this->destaque;
    }

    public function setDestaque(bool $destaque){
        $this->destaque = $destaque;
    }

        
        
    // Inserindo um Produtos.
        
    public function inserir():bool{
        $sql = "INSERT INTO produtos (tipo_id, descricao, resumo, valor, imagem, destaque) VALUES (:tipo_id, :descricao, :resumo, :valor, :imagem, :destaque)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":tipo_id", $this->tipoId);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":resumo", $this->resumo);
        $cmd->bindValue(":valor", $this->valor);
        $cmd->bindValue(":imagem", $this->imagem);
        $cmd->bindValue(":destaque", $this->destaque);
        $cmd->execute();
        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();   // ( lastInsertId ) Retorna o ultimo Id inserido.
            return true;
        }
        return false;
    }
        
        
    // Listando Produtos.
        
    public function listar(int $destaque = 0):array{
        if($destaque == 0){
            $cmd = $this->pdo->query("SELECT * FROM vw_produtos ORDER BY id DESC");
        }
        elseif ($destaque == 1){
            $cmd = $this->pdo->query("SELECT * FROM vw_produtos WHERE destaque = 1 ORDER BY id DESC");
        }
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
        
        
    // Buscando por ID.
        
    public function buscarPorId(int $id):array{
        $sql = "SELECT * FROM vw_produtos WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $dados = $cmd->fetch();
        // if($cmd->rowCount() > 0){
        //     $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        //     $this->id = $dados['id'];
        //     $this->tipoId = $dados['tipo_id'];
        //     $this->descricao = $dados['descricao'];
        //     $this->resumo = $dados['resumo'];
        //     $this->valor = $dados['valor'];
        //     $this->imagem = $dados['imagem'];
        //     $this->destaque = $dados['destaque'];
        //     return $this;
        //}
        return $dados;
    }


    // Buscando produto por tipo_id.
        
    public function buscarProTipoId(int $tipoId):array{
        $sql = "SELECT * FROM vw_produtos WHERE tipo_id = :tipo_id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":tipo_id", $tipoId);
        $cmd->execute();
        $dados = $cmd->fetchAll();
  
        return $dados;
    }



    // Atualizar Produtos.

    public function atualizar(int $idUpdate):bool{
        $id = $idUpdate;
        if(!$this->id) return false;
        
        $sql = "UPDATE produtos SET
        tipo_id = :tipo_id,
        descricao = :descricao,
        resumo = :resumo,
        valor = :valor,
        imagem = :imagem,
        destaque = :destaque
        WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":tipo_id", $this->tipoId);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":resumo", $this->resumo);
        $cmd->bindValue(":valor", $this->valor);
        $cmd->bindValue(":imagem", $this->imagem);
        $cmd->bindValue(":destaque", $this->destaque);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }



    // Excluir usuário.


    public function excluir(int $idExcluir):bool{
        $this->id = $idExcluir;
        if(!$this->id) return false;

        $sql = "DELETE * FROM produtos WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

}

?>

<!-- Final da tag PHP -->