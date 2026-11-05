<?php

$router->add('GET', '/login', 'LoginController@index');
$router->add('POST', '/login/autenticar', 'LoginController@autenticar');
$router->add('GET', '/logout', 'LoginController@logout');
$router->add('GET', '/home', 'HomeController@index');

$router->add('GET', '/produtos/listagem', 'ProdutoController@listagem');
$router->add('GET', '/produtos/cadastro', 'ProdutoController@cadastro');
$router->add('POST', '/produtos/cadastro/salvar', 'ProdutoController@salvar');

$router->add('GET', '/relatorio/index', 'RelatorioController@index');
$router->add('GET', '/relatorio/layout', 'RelatorioController@layout');
