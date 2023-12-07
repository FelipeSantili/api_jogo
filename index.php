<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use App\Controller\JogoController;


require_once(__DIR__ . '/vendor/autoload.php');

$app = AppFactory::create();
$app->setBasePath("/api_jogo");

$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("");
    return $response;
});


$app->group('/jogos', function ($app) {
    $app->get('', JogoController::class . ':listar');
    $app->get('/{id}', JogoController::class . ':buscarPorId');
    $app->post('', JogoController::class . ':inserir');
    $app->put('/{id}', JogoController::class . ':editar');
    $app->delete('/{id}', JogoController::class . ':deletar');
});


$app->run();
?>