$(document).ready(function() {
    $('.button').click(function(){

        var numero_perguntas_fechadas = $("#numero_perguntas_fechadas").val();
       
               
        for (var i = 1; i <= numero_perguntas_fechadas; i++) {
            if(!jQuery("input[type=radio][name='alternativa["+i+"]']").is(":checked")){
                
                alert("Alguns campos não foram preenchidos! \n\nTente Novamente. \n\nVerifique a questão nº: "+i);
                return false;
            }
        }

    });
});






