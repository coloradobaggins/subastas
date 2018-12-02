/**
 * Created by coloBaggins on 5/9/16.
 */
$(document).ready(function(){
   console.log("login ready");
   //Chequear si esta en sesion

   checkSessionInit();

});

function checkSessionInit(){
  $.ajax({
    url:'?view=login',
    data:'checkSession=true',
    type:'post',
    dataType:'text',
    success:function(response){
      console.log(response);
      if(response==1){
        location.href = '?view=home';
      }
    },
    timeout:5000,
    error:function(){
      alert("Error de conexion, intentelo mas tarde");
    }
  });
}

$('#loginBtn').click(function(){

    var email = $('#email');
    var pass  = $('#password');
    var stateLogin;

    if(email.val()!= '' && pass.val() != '')
    {
        $.ajax({
            async:true,
            url:'?view=login',
            data:'login=true&email='+email.val()+'&pass='+pass.val(),
            type:'post',
            dataType:'text',
            success:function(response)
            {
                console.log(response);

                if(response==1)
                {
                    stateLogin = '<div class="alert alert-success alert-dismissible" role="alert">';
                    stateLogin += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    stateLogin += '<strong>Bienvenido!</strong> Ingresando...</strong>';
                    stateLogin += '</div>';
                    $(".__AJAX__").html(stateLogin);
                    location.href = '?view=home';
                }
                else if(response==2)
                {
                    stateLogin = '<div class="alert alert-warning alert-dismissible" role="alert">';
                    stateLogin += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    stateLogin += '<strong>Cuidado!</strong> Datos incorrectos.</strong>';
                    stateLogin += '</div>';
                    $(".__AJAX__").html(stateLogin);
                }
                else if(response == 3)
                {
                  stateLogin = '<div class="alert alert-warning alert-dismissible" role="alert">';
                  stateLogin += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  stateLogin += '<strong>Cuidado!</strong> Todos los datos son obligatorios.</strong>';
                  stateLogin += '</div>';
                  $(".__AJAX__").html(stateLogin);
                }
            },
            timeout:5000,
            error:function()
            {
                alert('Error de conexion, intentelo mas tarde');
            }
        });
    }
    else
    {
        stateLogin = '<div class="alert alert-warning alert-dismissible" role="alert">';
        stateLogin += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        stateLogin += '<strong>Cuidado!</strong> Todos los datos son obligatorios</strong>';
        stateLogin += '</div>';
        $(".__AJAX__").html(stateLogin);
    }

});
