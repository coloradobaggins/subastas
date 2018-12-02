var modalAddUsuario;
$(document).ready(function(){
	console.log("ready code usuarios");
	modalAddUsuario = $("#modalAddUsuarios");
});

//CArgar localidades segun provincia seleccionada.
$("#provincia").on('change', function(){

     var localidadesOpt = makeLocalidadesStrOptions($(this).find(':selected').val());


    $("#localidad").html(localidadesOpt);

});

$("#btnAddUser").click(function(){
	console.log("click");
	if($("#formAddUsuario").valid()){
		var sendData = "addUser=true&"+$("#formAddUsuario").serialize();
		console.log(sendData);
		$.ajax({
			url:'?view=sistema/sistemaABM',
			data:sendData,
			type:'post',
			dataType:'text',
			beforeSend:function(){},
			success:function(response){
				console.log(response);
				var parsedData = JSON.parse(response);
				if(parsedData.status == "success"){
					location.reload();
				}else if(parsedData.errorCode == 1){
                    alert(parsedData.errorMessage);
                }else if(parsedData.errorCode == 2){
                    alert(parsedData.errorMessage);
                }else if(parsedData.errorCode == 3){
                    alert(parsedData.errorMessage);
                }else{
					alert(errorAjaxGeneral);
					console.log(response);
				}
			},
			timeout:10000,
			error:function(){
				alert(errorConnection);
			}
		});
	}
	
});



//Validar form addUsuario
$("#formAddUsuario").validate({
    rules: {
        user: "required",
        pass:"required",
        mail:{
        	required:true,
        	email:true
        },
        rol: "required",
        apellido: "required",
        dni: "required",
        localidad: "required",
        cargo: "required"
    },
    messages: {
        user: "Nombre de Usuario",
        pass:"Completar con password",
        rol: "Seleccione un rol",
        apellido: "Completar apellido",
        dni: "completar dni",
        localiad: "Seleccione una localidad",
        cargo:"Completar cargo"
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});



//Cambiar estado Usuario
function cambiarEstado(id, estadoActual, element){
    console.log("Cambiar Estado: actual: "+estadoActual+  " id: "+id);

    $.ajax({
        url:'?view=sistema/sistemaUsuariosABM',
        data:'cambiarEstado=true&id='+id+"&estadoActual="+estadoActual,
        type:'post',
        dataType:'text',
        beforeSend:function(){},
        success:function(response){
            console.log(response);
            var parsedData = JSON.parse(response);
            if(parsedData.status =="success"){
                var nuevoEstado = (estadoActual==0) ? 1 : 0;
                var nuevoOnclick = 'cambiarEstado('+id+', '+nuevoEstado+', $(this));';
                if(nuevoEstado==0){
                    element.removeClass('btn-success');
                    element.addClass('btn-danger');
                }else{
                    element.removeClass('btn-danger');
                    element.addClass('btn-success');
                }
                element.attr('onclick', nuevoOnclick);  //Cambiar argumentos function cambiarEstado onClick
            }else{
                alert("Error, no se cambio el estado. Intentelo mas tarde.");
            }
        },
        timeout:10000,
        error:function(){
            alert("Error de conexion, intentelo mas tarde");
        }
    });
}
