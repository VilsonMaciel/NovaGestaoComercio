<?php

$router->add('GET', '/login', 'LoginController@index');
$router->add('GET', '/home', 'HomeController@index');

$router->add('GET', '/produtos/listagem', 'ProdutoController@listagem');
$router->add('GET', '/produtos/cadastro', 'ProdutoController@cadastro');

$router->add('GET', '/relatorio/index', 'RelatorioController@index');
$router->add('GET', '/relatorio/layout', 'RelatorioController@layout');
