<?php require_once("chama-api.php")?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página de testes da API de agendamento</title>
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/theme-api.css">
</head>
<body>
    <svg class="base" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMidYMid meet">
        <defs>
            <symbol id="base-seta">
                <polyline class="seta" points="1,1 25,25 50,1" />
            </symbol>
        </defs>
    </svg>

    <div id="open">
        <button id="open-api"><span> Abrir calendário </span></button>
    </div>

    <!-- Escolha um lugar pra colocar esse load (ele carrega toda a estrutura do agendamento!) -->
    <?php if ($layout->load() !== "../api/views/.php") { require $layout->load(); }?>
    <!-- Scripts -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="src/js/JSApi.js"></script>
    <script src="src/js/functions.js"></script>
</body>
</html>