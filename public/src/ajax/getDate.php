<?php
    require '../../../vendor/autoload.php';

    use api\models\Reserva;
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

// Buscando se há reserva no dia especificado:
    $reg = new Reserva;

    foreach ($_POST as $data => $value) { $string = $data; }
    
    $encontrado = $reg->find("reg_date", $string);
// Verificando se existe:
    if ($encontrado) {
        
        $i = 0;
        $listagemGeral = [];
        $tabelas = [];

        foreach ($encontrado as $registros => $campos) {
            $listagemGeral[$i] = $campos;
            $i++;
        }
        // Pegando apenas os dados para listagem:
            for ($i=0; $i < count($listagemGeral); $i++) { 
                
                $dados[$i] = [
                    "user_fk" => $listagemGeral[$i]->user_fk,
                    "sala_fk" => $listagemGeral[$i]->sala_fk,
                    "mat_fk" => $listagemGeral[$i]->mat_fk,
                    "reg_time" => $listagemGeral[$i]->reg_time,
                    "reg_notes" => $listagemGeral[$i]->reg_notes,
                ];

                $retorno[$i] = [
                    "user_name" => "",
                    "sala_nome" => "",
                    "mat_nome" => "",
                    "reg_time" => $listagemGeral[$i]->reg_time,
                    "reg_notes" => $listagemGeral[$i]->reg_notes,
                ];
            }

        // Comparando com tabelas em especificos:
            // Usuário:
                foreach ($users as $registros) {
                // Para cada registro da tabela, um for para cada registro verifica se o id do registro é igual ao id da tabela;
                    for ($i=0; $i < count($dados); $i++) { 
                        if ($dados[$i]["user_fk"] === $registros->user_id) {
                            $retorno[$i]["user_name"] = $registros->user_name;
                        }
                    }
                }

            // Sala:
                foreach ($salas as $registros) {
                // Para cada registro da tabela, um for para cada registro verifica se o id do registro é igual ao id da tabela;
                    for ($i=0; $i < count($dados); $i++) { 
                        if ($dados[$i]["sala_fk"] === $registros->sala_id) {
                            $retorno[$i]["sala_nome"] = $registros->sala_nome;
                        }
                    }
                }

            // Materiais:
                foreach ($mats as $registros) {
                // Para cada registro da tabela, um for para cada registro verifica se o id do registro é igual ao id da tabela;
                    for ($i=0; $i < count($dados); $i++) { 
                        if ($dados[$i]["mat_fk"] === $registros->mat_id) {
                            $retorno[$i]["mat_nome"] = $registros->mat_nome;
                        }
                    }
                }
        
        // Devolutiva:
            echo json_encode($retorno);
    } else {
        echo "Não encontrado";
    }



