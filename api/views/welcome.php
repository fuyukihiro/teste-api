<div id="open">
    <button id="open-api"><span> Abrir calendário </span></button>
</div>
<div id="api" class="modal">
    <div class="container">
        <button id="fechar-api">&times;</button>
        <div id="agenda"><?php require $agenda->load(); ?></div>
        <?php require $calendar->load(); ?>
    </div>
</div>
<a href="/logout">Sair</a>
