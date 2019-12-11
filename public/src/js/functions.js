const $btn_open = $("div#open button#open-api");
const $api = $("div#api");

$btn_open.click(() => {
    $api.addClass("visivel");
    JSApi();
});

$api.click((event) => {    

    if (event.target.id == "api" || event.target.id == "fechar-api") {
        $api.removeClass('visivel');
    }

});