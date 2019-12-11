<?php
    require '../../../vendor/autoload.php';

use api\classes\Validation;
use api\models\Reserva;

$reg = new Reserva;

// Validações
$validation = new Validation;
$validate = $validation->validate($_POST);


$registrado = $reg->create($validate);


if ($registrado) {
    echo 'Cadastrei';
} else {
    echo 'Não consegui cadastrar';
}