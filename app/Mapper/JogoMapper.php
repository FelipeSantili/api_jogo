<?php

namespace App\Mapper;

use App\Model\Jogo;

class JogoMapper {

    public function mapFromDatabaseArrayToObjectArray($regArray) {
        $arrayObj = array();

        foreach($regArray as $reg) {
            $regObj = $this->mapFromDatabaseToObject($reg);
            array_push($arrayObj, $regObj); 
        }

        return $arrayObj;
    }

    public function mapFromDatabaseToObject($regDatabase) {
        $obj = new Jogo();
        if(isset($regDatabase['id'])) 
            $obj->setId($regDatabase['id']);
        
        if(isset($regDatabase['nome']))
            $obj->setNome($regDatabase['nome']);

        if(isset($regDatabase['empresa']))
            $obj->setEmpresa($regDatabase['empresa']);

        if(isset($regDatabase['anoLancamento']))
        $obj->setAnoLancamento($regDatabase['anoLancamento']);

        if(isset($regDatabase['categoria']))
        $obj->setCategoria($regDatabase['categoria']);

        if(isset($regDatabase['plataforma']))
        $obj->setPlataforma($regDatabase['plataforma']);
        
        if(isset($regDatabase['capaJogo']))
            $obj->setCapaJogo($regDatabase['capaJogo']);
        
        return $obj;
    }

    public function mapFromJsonToObject($regJson) {
        //Reaproveita o método
        return $this->mapFromDatabaseToObject($regJson);
    }

}