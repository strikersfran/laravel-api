/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var url_base=$('#url_base').val();

$('#btn-login').click(function(){
    $.ajax({
        url:url_base+'/api/v1/auth/login',
        method:'POST',
        data:{email:'carrionfn@gmail.com',password:'17218234'}
    }).done(function(resultado){
//        var datos= $.parseJSON(resultado);
        $('#token').val(resultado['token']);
        alert('Login Con exito');
    }).fail(function(resultado) {
        var error= $.parseJSON(resultado.responseText);
        alert( error['message'] );
    });
});
$('#btn-listar').click(function(){
//    if($('#token').val()){
        $.ajax({
            url:url_base+'/api/v1/auth/list',
            method:'POST',
            data:{token:$('#token').val()}
        }).done(function(resultado){
    //        var datos= $.parseJSON(resultado);
            console.log(resultado['users']);
            $('#result').empty().append(resultado['users']['data'][0]['email']);
//            alert(resultado['users']);
        }).fail(function(resultado) {
            var error= $.parseJSON(resultado.responseText);
            alert( error['message'] );
        });
//    }
//    else{
//        alert('Debes estar Logeado');
//    }
});

