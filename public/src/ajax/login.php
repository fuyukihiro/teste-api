<?php
    require '../../../vendor/autoload.php';
    session_start();
    use api\classes\Validation;
    use api\models\Usuario;

    $validation = new Validation;
    $validate = $validation->validate($_POST);

    $user = new Usuario;
    $pesquisa = $user->find_user("user_name", "user_password", $validate->user, $validate->password);

    if ($pesquisa === false) {
        echo ("Erro");
    } else {
        $_SESSION['logado'] = true;
        $_SESSION['id_user'] = $pesquisa->user_id;
    }