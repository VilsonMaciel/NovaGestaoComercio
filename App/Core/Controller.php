<?php

namespace Core;

class Controller
{
    protected function view($name, $data = [])
    {
        extract($data);
        $viewFile = __DIR__ . "/../Views/Pages/" . $name . ".php";
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            die("View $name not found.");
        }
    }

    protected function json($data, $status = 200)
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }

    protected function redirect($url)
    {
        $redirectUrl = (strpos($url, 'http') === 0) ? $url : BASE_URL . ltrim($url, '/');
        header("Location: " . $redirectUrl);
        exit;
    }

    protected function gerarQueryFiltrosCompartilhados(
        array $filtrosDesejados = [
            'nome',
            'genero',
            'busca',
            'situacao',
            'turno',
            'faixaEtaria'
        ]
    ) {
        $filtrosAtivos = [];
        
        foreach ($filtrosDesejados as $filtro) {
            if (!empty($_GET[$filtro])) {
                $filtrosAtivos[$filtro] = $_GET[$filtro];
            }
        }
        
        return !empty($filtrosAtivos) ? '&' . http_build_query($filtrosAtivos) : '';
    }

}
