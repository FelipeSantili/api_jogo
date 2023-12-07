<?php

namespace App\Service;

use App\Model\Jogo;

class JogoService {

    public function validar(Jogo $jogo) {
        if(! $jogo->getNome())
            return "O campo nome é obrigatório.";
            
        if(! $jogo->getEmpresa())
            return "O campo empresa é obrigatório.";

        if(! $jogo->getAnoLancamento() > 1990)
            return "O ano de lançamento deve ser maior que 1990.";

        if(! $jogo->getCategoria())
            return "O campo categoria é obrigatório.";
        
        if(! $jogo->getCapaJogo())
            return "O campo capa do jogo é obrigatório.";
        
        return null;
    }
    
}