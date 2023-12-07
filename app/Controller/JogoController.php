<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\JogoDAO;
use App\Mapper\JogoMapper;
use App\Model\Jogo;
use App\Service\JogoService;
use App\Util\MensagemErro;

use \PDOException;

class JogoController {

    private $jogoDAO;
    private $jogoMapper;
    private $jogoService;

    public function __construct() {
        $this->jogoDAO = new JogoDAO();
        $this->jogoMapper = new JogoMapper();
        $this->jogoService = new JogoService();
    }

    public function listarJogo(Request $request, Response $response, array $args): Response {
        
        $jogos = $this->jogoDAO->list();

        $json = json_encode($jogos, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

        $response->getBody()->write($json);
        
        return $response
                ->withStatus(200)
                ->withHeader('Content-Type', 'application/json');
    }

    public function buscarjogoPorId(Request $request, Response $response, array $args): Response {

		$jogo = $this->jogoDAO->findById($args["id"]);

		if ($jogo) {
			$json = json_encode($jogo, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

			$response->getBody()->write($json);

			return $response
				->withStatus(202)
				->withHeader("Content-type", "application/json");
		}

		return $response->withStatus(404);
    }

	public function inserirJogo(Request $request, Response $response, array $args): Response {

		$jsonArrayAssoc = $request->getParsedBody();

		$jogo = $this->jogoMapper->mapFromJsonToObject($jsonArrayAssoc);

        $erros = $this->jogoService->validar($jogo);

        if ($erros) {
            $jsonErro = MensagemErro::getJSONErro($erros, "", 400);
            $response->getBody()->write($jsonErro);
            return $response;
        }

		$jogo = $this->jogoDAO->insert($jogo);

		$json = json_encode($jogo, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        

		$response->getBody()->write($json);

		return $response->withStatus(201);
	}

    public function editarJogo(Request $request, Response $response, array $args): Response {

        $id = $args['id'];
        $jsonData = $request->getParsedBody();

        $jogo = $this->jogoDAO->findById($id);

        if (!$jogo) {
            return $response->withStatus(404);
        }

        $jogo->setNome($jsonData['nome'] ?? $jogo->getNome());
        $jogo->setEmpresa($jsonData['empresa'] ?? $jogo->getEmpresa());
        $jogo->setCapaJogo($jsonData['capaJogo'] ?? $jogo->getCapaJogo());
    

        $jogo = $this->jogoDAO->update($jogo);

        $json = json_encode($jogo, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

        $response->getBody()->write($json);

        return $response->withStatus(200);
    }

    public function deletarJogo(Request $request, Response $response, array $args): Response {
        $id = $args['id'];

        $jogo = $this->jogoDAO->findById($id);

        if (!$jogo) {
            return $response->withStatus(404);
        }

        $this->jogoDAO->deleteById($id);

        return $response->withStatus(204);
    }
}