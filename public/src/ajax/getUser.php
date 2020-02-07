<?php
    require '../../../vendor/autoload.php';
    session_start();
    use api\models\Usuario;
    if ($_SESSION['logado'] === true) {
        $login_id = $_SESSION['id_user'];

        $user = new Usuario;
        $pesquisa = $user->find("user_id", $login_id);
        $retorno = [
            'id' => $pesquisa[0]->user_id,
            'name' => $pesquisa[0]->user_name,
        ];
        $retorno = (object) $retorno;

        echo json_encode($retorno);
    }
