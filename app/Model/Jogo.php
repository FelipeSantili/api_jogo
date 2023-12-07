<?php

namespace App\Model;

use JsonSerializable;

class Jogo implements JsonSerializable {

    private ?int $id;
    private ?string $nome;
    private ?string $empresa;
    private ?int $anoLancamento;
    private ?string $categoria;
    private ?string $plataforma;
    private ?string $capaJogo;

    public function __construct() {
        $this->id = 0;
        $this->nome = null;
        $this->empresa = null;
        $this->anoLancamento = 0;
        $this->categoria = null;
        $this->plataforma = null;
        $this->capaJogo = null;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'empresa' => $this->empresa,
            'anoLancamento' => $this->anoLancamento,
            'categoria' => $this->getCategoriaName(),
            'plataforma' => $this->getPlataformaName(),
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
     * Get the value of anoLancamento
     */ 
    public function getAnoLancamento()
    {
        return $this->anoLancamento;
    }

    /**
     * Set the value of anoLancamento
     *
     * @return  self
     */ 
    public function setAnoLancamento($anoLancamento)
    {
        $this->anoLancamento = $anoLancamento;

        return $this;
    }

    public function getCategoria(): ?string {
        return $this->categoria;
    }

    public function getCategoriaName(): ?string {
        if ($this->categoria == 'A')
            return "Ação";
        elseif ($this->categoria == 'R')
            return "RPG";
        elseif ($this->categoria == 'V')
            return "Aventura";
        elseif ($this->categoria == 'P')
            return "Puzzle";
        elseif ($this->categoria == 'F')
            return "FPS";

        return '';
    }

    public function setCategoria(?string $categoria) {
        $this->categoria = $categoria;

        return $this;
    }

    public function getPlataforma(): ?string {
        return $this->plataforma;
    }

    public function getPlataformaName(): ?string {
        if ($this->plataforma == 'P')
            return "Playstation";
        elseif ($this->plataforma == 'C')
            return "PC";
        elseif ($this->plataforma == 'X')
            return "Xbox";
        elseif ($this->plataforma == 'N')
            return "Nintendo";
        elseif ($this->plataforma == 'M')
            return "Multiplataforma";

        return '';
    }

    public function setPlataforma(?string $plataforma) {
        $this->plataforma = $plataforma;

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