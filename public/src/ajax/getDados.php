<?php
    require '../../../vendor/autoload.php';

    use api\models\User;
    use api\models\Sala;
    use api\models\Mat;

    $user = new User;
    $users = $user->all();

    $sala = new Sala;
    $salas = $sala->all();

    $mat = new Mat;
    $mats = $mat->all();

    var_dump($mats);

    $tradutor = [

        ["usuarios"] => [$users],
        ["salas"] => [$salas],
        ["mats"] => [$mats]

    ];

    if ($tradutor) {
        echo json_encode($tradutor);        
    } else { echo "Não consegui listar"; }
