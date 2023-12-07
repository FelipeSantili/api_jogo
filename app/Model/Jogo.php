<?php

namespace App\Model;

use JsonSerializable;

class Jogo implements JsonSerializable {

    private ?int $id;
    private ?string $nome;
    private ?string $empresa;
    private ?string $capaJogo;

    public function __construct() {
        $this->id = 0;
        $this->nome = null;
        $this->empresa = null;
        $this->capaJogo = null;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'empresa' => $this->empresa,
            'capaJogo' => $this->capaJogo,
        ];
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of empresa
     */ 
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set the value of empresa
     *
     * @return  self
     */ 
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get the value of capaJogo
     */ 
    public function getCapaJogo()
    {
        return $this->capaJogo;
    }

    /**
     * Set the value of capaJogo
     *
     * @return  self
     */ 
    public function setCapaJogo($capaJogo)
    {
        $this->capaJogo = $capaJogo;

        return $this;
    }
    

}