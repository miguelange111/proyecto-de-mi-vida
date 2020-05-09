var buscador = $("#table").DataTable();

$("#bar").keyup(function(){
    
    buscador.search($(this).val()).draw();
    
    if ($("#bar").val() == ""){
        $(".content-search").fadeOut(300);
    }else{
        $(".content-search").fadeIn(300);
    }
})