<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: /");
}
use api\classes\Layout;
use api\classes\Piece;
use api\models\Sala;
use api\models\Mat;
use api\models\Horario;
use api\models\Turma;
use api\models\Reserva;

$layout = new Layout;

// Estruturando toda a API
$agenda = new Piece;    
$calendar = new Piece;

// Tratando Calendario
require_once('src/php/calendar.php');
$diasNaSemana = search_diaDaSemana();
$calendar->add('calendar');

// Tratando Agendamento
$sala = new Sala;
$salas = $sala->all();

$mat = new Mat;
$mats = $mat->all();

$hora = new Horario;
$horas = $hora->all();

$turma = new Turma;
$turmas = $turma->all();

$reg = new Reserva;

$agenda->add('agenda');

$layout->add('welcome');

