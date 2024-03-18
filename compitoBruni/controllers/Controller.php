<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
include __DIR__ . '/../views/Alunni.php';
include __DIR__ . '/../Classe.php';
include __DIR__ . '/../views/Show.php';

class AlunniController
{
    function index(Request $request, Response $response, $args) {
        $miaclasse = new Classe();
        $view = new Alunni();
        $view->setData($miaclasse);
        $response->getBody()->write($view->render());
        return $response;
    }

    function show(Request $request, Response $response, $args) {
        $miaclasse = new Classe();
        $nome= $args['nome_alunno'];
        $x['alunno'] = $miaclasse->getAlunnoByNome($nome);
        $view = new Show();
        $view->setData($x);
        $response->getBody()->write($view->render());
        return $response;
    }

    function json_alunni(Request $request, Response $response, $args) {
        $miaclasse = new Classe();     
        $response->getBody()->write(json_encode($miaclasse));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);       
    }

}



?>