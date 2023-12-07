<?php

namespace App\Service;

use App\Model\Jogo;

class JogoService {

    public function validar(Jogo $jogo) {
        if(! $jogo->getNome())
            return "O campo nome é obrigatório.";
            
        if(! $jogo->getEmpresa())
            return "O campo empresa é obrigatório.";
        
        if(! $jogo->getCapaJogo())
            return "O campo capa do jogo é obrigatório.";
        
        return null;
    }
    
}