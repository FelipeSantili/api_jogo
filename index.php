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

//Rotas de jogos
$app->get('/jogos', 'App\Controller\JogoController:listar');
$app->get("/jogos/{id}", JogoController::class . ":buscarPorId");
$app->post("/jogos", JogoController::class . ":inserir");
$app->put("/jogos/{id}", JogoController::class . ":editar");
$app->delete("/jogos/{id}", JogoController::class . ":deletar");


//--------Executa o framework slim--------
$app->run();