<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API de Agendamento - Kyochi Softwares</title>
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

    <!-- Escolha um lugar pra colocar esse load (ele carrega toda a estrutura do agendamento!) -->
    <div id="api-on"><?php if ($layout->load() !== "../api/views/.php") { require $layout->load(); }?></div>
    <!-- Scripts -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="src/js/JSAgenda.js"></script>
    <script src="src/js/JSCalendar.js"></script>
</body>
</html>