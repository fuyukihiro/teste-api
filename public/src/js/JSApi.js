var ClickStatus = false;
const ClickDate = {
    year: '',
    month: '',
    day: ''
}

const JSApi = () => {
    JSCalendar.init();
    JSAgenda.fun.changeDisplay();
    JSAgenda.fun.form.enviar();
}

const JSAgenda = {

    var: {
        
        btn_add: document.querySelectorAll("#api.modal .container #agenda .reg-btns button#reg-add.btn"),

        displays: {

            $welcome: $("#api.modal .container #agenda div#welcome"),
            $no_reg: $("#api.modal .container #agenda div#no_reg"),
            $list: $("#api.modal .container #agenda div#list_reg"),
            $form: $("#api.modal .container #agenda div#reg_form"),

        },


        form: {

            main: document.querySelector("#api.modal .container #agenda div#reg_form form[name=reg-cadastro]"),

            btns: {
                send: $("#api.modal .container #agenda div#reg_form div.form-btns button#enviar.btn"),
                cancel: $("#api.modal .container #agenda div#reg_form div.form-btns button#cancelar.btn"),
            },

            toggle_areas: {

                $sala: $("#api.modal .container #agenda div#reg_form div#area-sala"),
                $material: $("#api.modal .container #agenda div#reg_form div#area-mat"),

            },

            campos: {

                type: $("#agenda div#reg_form div.formOp select[name=reg_type]"),
                sala: document.querySelector("#agenda div#reg_form form select[name=sala_fk]"),
                material: document.querySelector("#agenda div#reg_form form select[name=mat_fk]"),
                hora: document.querySelector("#agenda div#reg_form form select[name=reg_time]"),
                note: document.querySelector("#agenda div#reg_form form textarea[name=reg_notes]"),

            },

            validate: { type_null: true, opt: 0, },

        },

        list: {
            body: document.querySelector("#api.modal .container #agenda #list_reg table tbody"),
        },
    },

    fun: {

        click: function() {
            
            const add = JSAgenda.var.btn_add;
            if (ClickStatus !== false) {
                
                var stringDate = "";

                if (ClickDate.day >= 10) { stringDate = `${ClickDate.year}-${ClickDate.month}-${ClickDate.day}`; }
                else { stringDate = `${ClickDate.year}-${ClickDate.month}-0${ClickDate.day}`; }
                
                const request = $.ajax({
                    method: "POST",
                    url: "src/ajax/getDate.php",
                    data: stringDate,
                });

                request.done((resposta) => {
                    if (resposta === "Não encontrado") { console.log("Sem registro para esse dia"); JSAgenda.fun.changeDisplay(1); }
                    else {
                        console.log("Há registros para esse dia");
                        
                        JSAgenda.fun.changeDisplay(2);
                        JSAgenda.fun.list.listar(JSON.parse(resposta));
                        
                    }
                });

                request.fail(this.form.erro);
                request.always(); 
            }

            add[0].onclick = () => JSAgenda.fun.changeDisplay(3);
            add[1].onclick = () => JSAgenda.fun.changeDisplay(3);

            return console.log("Clicks preparados!");
        },

        changeDisplay: function(num_of_display) {
          
            const { $welcome, $no_reg, $list, $form } = JSAgenda.var.displays;

            switch (num_of_display) {
                // Sem registro 
                case 1:
                    console.log("Tela 02.1");
                    
                    $welcome.removeClass("exibindo");
                    $form.removeClass("exibindo");
                    $list.removeClass("exibindo");
                    $no_reg.addClass("exibindo");

                break;

                case 2:
                    console.log("Tela 02.2");
                    
                    $welcome.removeClass("exibindo");
                    $form.removeClass("exibindo");
                    $no_reg.removeClass("exibindo");
                    $list.addClass("exibindo");

                break;
                // Formulário
                case 3:
                    console.log("Tela 03");
                    
                    $welcome.removeClass("exibindo");
                    $list.removeClass("exibindo");
                    $no_reg.removeClass("exibindo");
                    $form.addClass("exibindo");

                break;
                // Bem-vindo
                default:
                    console.log("Tela 01");
                    
                    $no_reg.removeClass("exibindo");
                    $form.removeClass("exibindo");
                    $list.removeClass("exibindo");
                    $welcome.addClass("exibindo");

                break;

            }

            if (num_of_display === 3) {
                
                const { $sala, $material } = JSAgenda.var.form.toggle_areas;
                $sala.hide(), $material.hide();

                const { campos, validate } = JSAgenda.var.form;
                
                campos.type.change(() => {
                    var option = campos.type.val();
                   
                    if (option !== null) {
                    
                        var sala_opt = campos.sala.options;
                        var mat_opt = campos.material.options;
                    

                        switch (option) {
                            
                            case "sala":
                                console.log("Somente sala");
                                
                                $material.hide();
                                $sala.show();
                                validate.type_null = false;
                                validate.opt = 1;
                                mat_opt.selectedIndex = 0;
    
                            break;
                        
                            case "mat":
                                console.log("Somente material");
                                
                                $sala.hide();
                                $material.show();
                                validate.type_null = false;
                                validate.opt = 2;
                                sala_opt.selectedIndex = 0;
    
                            break;
                        
                            case "sala&mat":
                                console.log("Os dois");
                                
                                $sala.show();
                                $material.show();
                                validate.type_null = false;
                                validate.opt = 3; // 1 e 2
    
                            break;
                                                
                        }
                    }
                });
            }

        },
        
        list: {

            listar: (dados) => {
                
                const { body } = JSAgenda.var.list;

                var tabela = `<tr class="row">`;
                for (let i = 0; i < dados.length; i++) {
                    tabela += `<td class="col">${dados[i].reg_time}</td>`
                    
                    var sala_null = (dados[i].sala_nome == "" && dados[i].mat_nome !== "") ? sala_null = true : sala_null = false;
                    var mat_null = (dados[i].sala_nome !== "" && dados[i].mat_nome == "") ? mat_null = true : mat_null = false;
                    
                    if (sala_null == true && mat_null == true) {
                        body.innerHTML = "Há registros para esse dia, entretanto algum erro está impedindo que sejam exibidos!";        
                    } else {
                        if (sala_null !== true && mat_null == true) { tabela += `<td class="col">${dados[i].sala_nome}</td>`} 
                        else if (mat_null !== true && sala_null == true) { tabela += `<td class="col">${dados[i].mat_nome}</td>` } 
                        else {
                            tabela += `<td class="col">${dados[i].sala_nome}/${dados[i].mat_nome}</td>`
                        }
                      }
                        tabela += `<td class="col">${dados[i].user_name}</td>`
                        tabela += `</tr>`;
                }
                
                body.innerHTML = tabela;
                return console.log("Listando...");
                
            }
            
        },

        form: {

            sucesso: function(resposta) {
              
                if (resposta === "Cadastrei") {
                    const enviar = JSAgenda.var.form.btns.send;
                    alert("Reserva efetuada com sucesso");
                    enviar.html("Enviado");
                } else {

                    alert("Ocorreu algum problema durante o processo de envio");
                    const enviar = JSAgenda.var.form.btns.send;
                    enviar.html("Enviar");
                }

            },

            erro: function(resposta, textStatus) {
                alert(`Ocorreu algum erro durante o envio: Código ${resposta.status} ${textStatus}`);
            },

            validando: function() {
                
                const form = JSAgenda.var.form;
                const { btns, campos, validate } = form;
                const { type_null, opt } = validate;

                if (type_null !== false) {
                    alert("Por favor, escolha um tipo de reserva antes de tentar enviar os dados");
                } else {
                    
                    console.log("Verificando antes de enviar...");
                    
                    const { sala, material, hora, note } = campos;
                    const stringDate = `${ClickDate.year}-${ClickDate.month}-${ClickDate.day}`;

                    let dados = {
                            
                        user_fk: Number('9'),
                        sala_fk: Number(sala.value),
                        mat_fk: Number(material.value),
                        reg_date: stringDate,
                        reg_time: hora.value,
                        reg_notes: note.value,
                        
                    };
                    
                    if (opt !== 0) {

                        switch (opt) {
                            
                            case 1:
                                console.log("Validação para material nulo");
                                dados.mat_fk = null;
                                var seguro = (dados.user_fk === 0 || (dados.sala_fk === 0 || dados.sala_fk === null) || dados.mat_fk !== null || dados.hora_fk === 0 || dados.class_fk === 0 || dados.reg_date === "" || dados.reg_notes === "") ? seguro = false : seguro = true;
                            break;

                            case 2:
                                    console.log("Validação para sala nulo");
                                    dados.sala_fk = null;
                                    var seguro = (dados.user_fk === 0 || (dados.mat_fk === 0 || dados.mat_fk === null) || dados.sala_fk !== null || dados.hora_fk === 0 || dados.class_fk === 0 || dados.reg_date === "" || dados.reg_notes === "") ? seguro = false : seguro = true;        
                            break;

                            case 3:
                                console.log("Validação para ambos");
                                var seguro = (dados.user_fk === 0 || dados.sala_fk === null || dados.mat_fk === null || dados.sala_fk === 0 || dados.mat_fk === 0 || dados.hora_fk === 0 || dados.class_fk === 0 || dados.reg_date === "" || dados.reg_notes === "") ? seguro = false : seguro = true;
                            break;

                        }
                        
                        if (seguro !== false) {
                            console.log("Todos os dados estão verificados e pronto para o envio");
                            return dados;
                            
                        } else {
                            alert("Por favor, prencha todos os campos disponiveis");
                            return 0;
                        }

                    }
                }

            },

            enviar: function() {
                
                console.log("Tô pronto pra mandar bala! E dessa vez só tiro certeiro (> u < )");
                

                const form = JSAgenda.var.form;
                const { btns, main } = form;
                const { send } = btns;
                
                main.addEventListener("submit", (event) => {

                    event.preventDefault();
                    
                    var valido = this.validando();

                    if (valido === 0) {
                        return;
                    } else {
                        
                        var dados = valido;
                        // console.log(dados);
                        
                        const request = $.ajax({
                            method: "POST",
                            url: "src/ajax/reg_store.php",
                            data: dados,
                            beforeSend: () => {
                                send.html("Enviando...");
                            }
                        });
        
                        request.done(JSAgenda.fun.form.sucesso);
                        request.fail(JSAgenda.fun.form.erro);
                        request.always(); 
                    }

                });
            }
        },
    },

    init: function() {
        console.log("Click em:", ClickDate);
        JSAgenda.fun.click();
        return console.log("A agenda está sendo monitorada...");
    },

    reset: function() { 
        const { type, sala, material, hora, note } = JSAgenda.var.form.campos;
        const { cancel, send } = JSAgenda.var.form.btns;
        sala.options.selectedIndex = 0;
        material.options.selectedIndex = 0;
        hora.options.selectedIndex = 0;
        note.value = "";
        type.val("");
        cancel.show();
        send.html("Enviar");
        return console.log("Dados do formulario resetados");
    }

}

const JSCalendar = {
    var: {
        btns: {
            next: $("#api.modal .container #head.calendario div#vai"),
            prev: $("#api.modal .container #head.calendario div#volta"),
        },

        days_of: {}
    },

    fun: {

        getDate: function() {
            console.log("Pegando data...");
            
            const date = new Date();
            const mes = date.getMonth() + 1;
            const hoje = date.getDate();
            const ano = date.getFullYear();

            const now = {
                year: ano,
                month: mes,
                today: hoje
            }

            return now;
    
        },
        
        apontaItens: function(date) {
            console.log("Identificando itens correspondentes...");
            const { month, today } = date;

            const $title = $(`#api.modal .container #head.calendario h1#${month}.title`);
            const $month = $(`#api.modal .container #body.calendario div#${month}.mes`);
            const $today = $month.find(`.dias-do-mes div#${today}.dia`);

            const elements = {
                $title,
                $month,
                $today
            }
            return elements;
        },

        addClasse: function(items) {
            console.log("Adicionando classes...");
            const { $title, $month, $today } = items;

            console.log($title, $month, $today);
            
            // others:
            const $titles = $("#api.modal .container #head.calendario h1.title");
            const $months = $("#api.modal .container #body.calendario .mes");
            
            // Padrão:
            $titles.removeClass('mostra');
            $months.removeClass('exibe');
            console.log("Escondi os demais");
            
            if ($today === '') {
                $title.addClass('mostra');
                $month.addClass('exibe');
            } else {
                $title.addClass('mostra');
                $month.addClass('exibe');
                $today.addClass('hoje');
            }
        },

        clicks: function() {
            console.log("Clicks prontos para uso!");
            const { next, prev } = JSCalendar.var.btns;
            // Inicialização:
            prev.hide();
            // Ação de botões:
            next.on('click', () => this.exibir(1));
            prev.on('click', () => this.exibir(0));

        },

        exibir: function(click) {
            var { month } = this.getDate();
            const { next, prev } = JSCalendar.var.btns;
            
            if (click === 1) {
                prev.hide();
                var prox = month + 1;
                month = prox;
                next.hide();
                prev.show();
            } else if (click === 0) {
                prev.hide();
                next.show();
            }

            if (month > 12) { this.padoruOn(); }
            else {

            const $title = $(`#api.modal .container #head.calendario h1#${month}.title`);
            const $month = $(`#api.modal .container #body.calendario div#${month}.mes`);
        
            console.log("Trocando...");
            ClickDate.month = month;
            JSCalendar.var.swap = {
                $title,
                $month,
                $today: ''
            }
            const swap = JSCalendar.var.swap;

            console.log(swap);
            this.addClasse(swap);
            this.verificaMes(swap);
            }
        },

        verificaMes: function(item) {
            console.log("Verificando mês...");
            const { $month } = item;
            JSCalendar.var.days_of = $month.find('.dia');
            const days_in = JSCalendar.var.days_of;
            this.verificaDias(days_in);
        },

        verificaDias: function(dias) {
            console.log("Verificando dias...");
            // Click em qualquer dia:
            for (const dia of dias) {
                dia.onclick = () => {
                    dias.removeClass('selected');
                    dia.classList.add('selected');
                    const valor = dia.id;
                    ClickDate.day = Number(valor);
                    ClickStatus = true;
                    JSAgenda.reset();
                    JSAgenda.init();
                }
            } 
        },

<<<<<<< HEAD
        controle: function() {

            const date = this.getDate();
            
            console.log("Padoru é:",padoru);

            // Verificando se é dezembro
            $.ajax({
                method: "POST",
                url: "src/ajax/padoru.php",
                data: date,
            });
            
=======
        padoruOn: function() {
            
            const dec = $("#api.modal .container #head.calendario h1#12");
            dec.removeClass("mostra");
            const title = $("#api.modal .container #head.calendario h1#padoru_title");
            title.addClass("mostra");
            const calendario = $("#api.modal .container #body.calendario div#12.mes");
            calendario.removeClass("exibe");
            const msg = $("#api.modal .container #body.calendario #padoru_msg");
            msg.css("opacity", 1);
>>>>>>> New Happy Holiday function
        }
    },
    
    init: function() {
        const fun = JSCalendar.fun;
        fun.controle();
        return console.log("Calendário iniciado :3");
    }
}