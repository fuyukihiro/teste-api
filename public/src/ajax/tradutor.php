<?php
    require("../../../vendor/autoload.php");

    use api\models\Usuario;
    use api\models\Sala;
    use api\models\Mat;
// Pegando todos os dados das tabelas para listagem:
    $user = new Usuario;
    $users = $user->all();
    $sala = new Sala;
    $salas = $sala->all();
    $mat = new Mat;
    $mats = $mat->all();

// Preparando Devolutiva:
$tradutor = [
    "users" => [
        "id" => [],
        "tradução" => []
    ],
    "salas" => [
        "id" => [],
        "tradução" => []
    ],
    "materiais" => [
        "id" => [],
        "tradução" => []
    ]
];

// Interpretando e traduzindo dados...
    // Do Usuário:
        for ($i=0; $i < count($users); $i++) { 
            $tradutor["users"]["id"][$i] = $users[$i]->user_id;
            $tradutor["users"]["tradução"][$i] = $users[$i]->user_name;
        }
    
    // Da Sala:
        for ($i=0; $i < count($salas); $i++) { 
            $tradutor["salas"]["id"][$i] = $salas[$i]->sala_id;
            $tradutor["salas"]["tradução"][$i] = $salas[$i]->sala_nome;
        }
    // Do Material:
        for ($i=0; $i < count($mats); $i++) { 
            $tradutor["materiais"]["id"][$i] = $mats[$i]->mat_id;
            $tradutor["materiais"]["tradução"][$i] = $mats[$i]->mat_nome;
        }

// Devolvendo em JSON: 
echo json_encode($tradutor);