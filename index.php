<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use App\Controller\JogoController;

require_once(__DIR__ . '/vendor/autoload.php');

//--------Habilita o framework Slim--------
$app = AppFactory::create();
$app->setBasePath("/api_jogo"); //Adicionar o nome da pasta do projeto


//--------Opções do framework Slim--------
$app->addBodyParsingMiddleware(); //Disponibliza o conteúdo recebido no corpo da requisição no objeto Request
$app->addErrorMiddleware(true, true, true); //Retorna um erro do Framework caso não tratado


//--------Rotas disponiblizadas pela API--------

//Rotas de jogos

$app->get("/jogos", JogoController::class . ":listarJogo");
$app->get("/jogos/{id}", JogoController::class . ":buscarJogoPorId");
$app->post("/jogos", JogoController::class . ":inserirJogo");
$app->put("/jogos/{id}", JogoController::class . ":atualizarJogo");
$app->delete("/jogos/{id}", JogoController::class . ":deletarJogo");


//--------Executa o framework slim--------
$app->run();