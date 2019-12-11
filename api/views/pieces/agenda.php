<h1> Agendamento </h1>
<hr width="65%">

<div id="welcome">
    <p> Para fazer um agendamento, primeiro, selecione uma data </p>
</div>

<div id="no_reg">
    <p> Opa, não há nenhum registro para esse dia. 
        Clique no "+" para adicionar
    </p>
    <div class="reg-btns">
        <button id="reg-add" class="btn">+</button>
    </div>
</div>

<div id="list_reg">
    <p> Reservas para esse dia: </p>
    <table>
        <thead>
            <tr>
                <th>Horário</th>
                <th>Sala/Material</th>
                <th>Professor</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <div class="reg-btns">
        <button id="reg-add" class="btn">+</button>
    </div>
</div>

<div class="form" id="reg_form">
    <div class="formOp" id="area-type">
        <label for="reg_type">Tipo de reserva:</label>
        <select name="reg_type" class="select">
            <option value="" selected disabled hidden>Selecione o tipo de reserva</option>
            <option value="sala">Sala/Laboratório</option>
            <option value="mat">Material</option>
            <option value="sala&mat">Sala e Material</option>
        </select>
    </div>
    <form name="reg-cadastro">
        <div class="formOp" id="area-sala">
                <label for="sala_fk">Sala:</label>
                <select name="sala_fk" class="select">
                    <option value="" selected disabled hidden>Selecione a sala ou laborátório</option>
                    <?php foreach ($salas as $sala): ?>
                    <option value="<?=$sala->sala_id?>"><?=$sala->sala_nome?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="formOp" id="area-mat">
                <label for="mat_fk">Material:</label>
                <select name="mat_fk" class="select">
                    <option value="" selected disabled hidden>Selecione material desejado</option>
                    <?php foreach ($mats as $mat): ?>
                    <option value="<?=$mat->mat_id?>"><?=$mat->mat_nome?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="formOp" id="area-hora">
                <label for="reg_time">Horário:</label>
                <select name="reg_time" class="select">
                    <option value="" selected disabled hidden>Selecione horário desejado</option>
                    <?php foreach ($horas as $hora): ?>
                    <option value="<?=$hora->hora_time?>"><?=$hora->hora_time?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="formOp" id="area-note">
                <label for="reg_notes">Anotações:</label>
                <textarea maxlength="120" spellcheck="true" rows="4" name="reg_notes" placeholder="Escreva alguma observação, caso queira..."></textarea>
            </div>
    
            <div class="form-btns">
                <button type="submit" class="btn" id="enviar">Enviar</button>
                <button type="button" class="btn" id="cancelar">Cancelar</button>
            </div>
    </form>
</div>