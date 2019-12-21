<?php
// Aqui ficaram os códigos do php referente ao funcionamento do calendário
// Váriaveis globais:
$ano = date('Y');
$meses = [
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro'
];

$daysOnWeek = [ 
    'Sun',
    'Mun',
    'Tue',
    'Wed',
    'Thu',
    'Fri',
    'Sat'
];
// Array somente para utilizar função nativa do php

$diasDaSemana = [
    'D', // Domingo
    'S', // Segunda
    'T', // Terça
    'Q', // Quarta
    'Q', // Quinta
    'S', // Sexta
    'S' // Sábado
];
// Array com os dias em seu formato Original(Pt-BR)


function qtd_diasMeses() {
// Descobre quantos dias há em cada mês daquele ano
    $diasNoMes = [];

    for($i_mes = 1; $i_mes <= 12; $i_mes++) {
        $diasNoMes[$i_mes] = cal_days_in_month(CAL_GREGORIAN, $i_mes, $GLOBALS['ano']);
        // De acordo com o calendário ele puxa quantos dias tem determinado mês
    }

    return $diasNoMes;
}

function search_diaDaSemana() {
    
    $diasDentroMes = qtd_diasMeses();
    $diasNaSemana = [];
    // Vai retornar em qual dia da semana é cada dia do mês. Ex. Dia 23 é Segunda-feira
    for($i_mes = 1; $i_mes <= 12; $i_mes++) {
        $diasNaSemana[$i_mes] = [];
        //Em cada mês adiciona um array vazio
        
        for($i_dias = 1; $i_dias <= $diasDentroMes[$i_mes]; $i_dias++) {
            $converte = gregoriantojd($i_mes, $i_dias, $GLOBALS['ano']);
            $valores = jddayofweek($converte, 2); // Qualquer bug muda pra 2 (vai retornar string abreviado)
            
            // var_dump($valores);

            //Converte a data para JD em seguida descobrindo que dia da semana é aquela data em especifico
            
            $diasNaSemana[$i_mes][$i_dias] = $valores;
            //Colocando as informações no array vazio
        }
        // No array vazio, adiciona-se o tanto de dias que aquele mês tem
    }
    return $diasNaSemana;
}