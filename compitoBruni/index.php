<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
include __DIR__ .'/controllers/AlunniController.php';

$app = AppFactory::create();

$app->get('/alunni', 'AlunniController:index'); 
$app->get('/alunni/{nome_alunno}', 'AlunniController:show');
$app->get('/json/alunni', 'AlunniController:json_alunni'); 
$app->get('/json/alunni/{nome}', 'AlunniController:json_alunni'); 


$app->run();
