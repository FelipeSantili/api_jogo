<?php

namespace App\Dao;

use App\Util\Connection;
use App\Mapper\JogoMapper;
use App\Model\Jogo;

use \Exception;

class JogoDAO {

    private $conn;
    private $jogoMapper;

    public function __construct() {
        $this->conn = Connection::getConnection();
        $this->jogoMapper = new JogoMapper();
    }

    public function list() {
        $sql = 'SELECT * FROM jogos ORDER BY id';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $this->jogoMapper->mapFromDatabaseArrayToObjectArray($result);
    }

    public function findById(int $id) {
        $sql = 'SELECT * FROM jogos WHERE id = :id';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $arrayObj = $this->jogoMapper->mapFromDatabaseArrayToObjectArray($result);

        if(count($arrayObj) == 0)
            return null;
        else if(count($arrayObj) > 1)
            new Exception("Mais de um registro encontrado para o ID " . $id);
        else
            return $arrayObj[0];
    }

    public function insert(Jogo $jogo) {
        $sql = 'INSERT INTO jogos (nome, empresa, anoLancamento, categoria, capaJogo) VALUES (:nome, :empresa, :anoLancamento, :categoria, :capaJogo)';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("nome", $jogo->getNome());
        $stmt->bindValue("empresa", $jogo->getEmpresa());
        $stmt->bindValue("anoLancamento", $jogo->getAnoLancamento());
        $stmt->bindValue("categoria", $jogo->getCategoria());
        $stmt->bindValue("capaJogo", $jogo->getCapaJogo());
        $stmt->execute();

        $id = $this->conn->lastInsertId();
        $jogo->setId($id);
        return $jogo;
    }

    public function update(Jogo $jogo) {
        $sql = 'UPDATE jogos SET nome = :nome, empresa = :empresa, anoLancamento = :anoLancamento, categoria = :categoria, capaJogo = :capaJogo WHERE id = :id';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("nome", $jogo->getNome());
        $stmt->bindValue("empresa", $jogo->getempresa());
        $stmt->bindValue("anoLancamento", $jogo->getAnoLancamento());
        $stmt->bindValue("categoria", $jogo->getCategoria());
        $stmt->bindValue("capaJogo", $jogo->getcapaJogo());
        $stmt->bindValue("id", $jogo->getId());
        $stmt->execute();

        return $jogo;
    }

    public function deleteById(int $id) {
        $sql = 'DELETE FROM jogos WHERE id = :id';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
    }

}