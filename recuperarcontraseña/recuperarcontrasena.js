function init(){
    
}

$(document).ready(function() {
    
});

$(document).on("click","#btnrecuperar", function(){

    var correo = $('#correo').val();

    if(correo ==""){
        Swal.fire(
            'Dirección de Educación Superior',
            'Error campo vacio',
            'error'
        );
    }else{ 
        $.post("../controller/usuario.php?op=correo", { correo : correo}, function(data){
            if (data=='[]'){
                Swal.fire(
                    'Dirección de Educación Superior',
                    'Usuario no Registrado',
                    'error'
                );
            }else{
                $.post("../controller/email.php?op=send_recuperar", { correo : correo}, function(data){
                    $('#correo').val('');
                });

                Swal.fire(
                    'Dirección de Educación Superior',
                    'Se envio correo',
                    'success'
                );
            }
        });
    }

});

init();