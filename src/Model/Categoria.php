<?php
namespace GaleriaPHP\Model;
use \PDOException;
use \PDO;

class Categoria
{
    private $id;
    private $nome;
    private $userId;
    private $con;

    public function __construct($id = null)
    {
        $this->id = $id;
        $this->con = new PDO($_ENV["DB_DSN"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function create()
    {
        try {
            $sql = $this->con->prepare("INSERT INTO categoria(id, nome, userId) values(null, ?, ?)");
            $sql->execute([$this->nome, $this->userId]);
        } catch (PDOException $e) {
            $_SESSION['msg'] = 'Ops! algo deu errado' . $e;
        }
    }
    public function listAll()
    {
        try {
            $sql = $this->con->prepare('SELECT * FROM categoria WHERE userId = ?;');
            $sql->execute([$this->userId]);
            $row = $sql->fetchAll(PDO::FETCH_OBJ);
            return $row;

            require_once 'src/View/upload.php';
        } catch (PDOException $e) {
            $_SESSION['msg'] = 'Ops! algo deu errado' . $e;
        }
    }

    //getters and setters 
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->userId = $id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
