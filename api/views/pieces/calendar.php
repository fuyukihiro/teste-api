<div id="head" class="calendario">
    <div id="volta">
        <svg class="setas seta-anterior">
            <title>Mês anterior</title>
            <use xlink:href="#base-seta">
        </svg>
    </div>
    <div id="vai">
        <svg class="setas seta-proximo">
            <title>Próximo mês</title>
            <use xlink:href="#base-seta">
        </svg>
    </div>

    <?php foreach ($GLOBALS['meses'] as $n_of_m => $mes):?>
    <h1 id="<?=$n_of_m?>" class="title"><?=$mes?> de <?=$GLOBALS['ano']?></h1>
    <?php endforeach?>
</div>
<div id="body" class="calendario">
    <?php foreach ($GLOBALS['meses'] as $n_of_m => $mes):?>
        <div class="mes" id="<?=$n_of_m?>">
            <div class="dias-da-semana">
                <?php foreach ($GLOBALS['diasDaSemana'] as $dia):?>
                    <div class="dia"><p><?=$dia?></p></div>
                <?php endforeach; ?>
            </div>
            <div class="dias-do-mes">
                <!-- Repetindo dias que tem que pular -->
                <?php $initMes = 0; ?>
                <!-- Em cada mês eu procuro os dias da semana e pego cada dia (separadamente) e vejo quando ele começa dentro da semana; -->
                <?php foreach ($diasNaSemana[$n_of_m] as $n_of_d => $startIn): $initMes++; ?>
                    <?php if ($n_of_d == 1): $pula = array_search($startIn, $GLOBALS['daysOnWeek']); ?>
                        <?php for ($vazio = 1; $vazio <= $pula; $vazio++): ?>
                            <div class="pula"><p></p></div>
                            <?php $initMes += 1; endfor;?> 
                            <!-- Acabou os dias pulados, iniciando normalmente -->
                            <?php endif?>
                    <div class="dia" id="<?= $n_of_d?>"><p><?= $n_of_d?></p></div>
                <?php endforeach?>
            </div>
        </div>
    <?php endforeach?>
</div>