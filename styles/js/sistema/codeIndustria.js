/**
 * Created by coloBaggins on 4/11/16.
 */
$(document).ready(function(){
   console.log("ready!");
});

//CArgar localidades segun provincia seleccionada.
$("#fabricaProvincia").on('change', function(){

     var localidadesOpt = makeLocalidadesStrOptions($(this).find(':selected').val());


    $("#fabricaLocalidad").html(localidadesOpt);

});


var modalAddFabrica = $("#modalAddFabrica");
$("#btnAddFabrica").click(function(){

    if($("#formAddDatosFabrica").valid()){
        var dataSend = "addFabrica=true&"+modalAddFabrica.find("#formAddDatosFabrica").serialize();
        $.ajax({
            url:"?view=agregar",
            data:dataSend,
            type:"post",
            dataType:"text",
            success:function(response){
                console.log(response);
                var parsedData = JSON.parse(response);
                if(parsedData.status == "success"){
                    location.reload();
                }else{
                    alert("Se ha producido un error, intentelo nuevamente o contacte a un administrador.");
                    console.log(response);
                }
            },
            error:function(){
                alert("Error de conexion, intentelo mas tarde.");
            }
        });
    }

});


//Validar form addFabrica
$("#formAddDatosFabrica").validate({
    rules: {
        fabricaNombre: "required",
        fabricaProvincia:"required",
        fabricaLocalidad: "required",
        fabricaCalle: "required",
        fabricaNum: "required"
    },
    messages: {
        fabricaNombre: "Nombre fabrica",
        fabricaProvincia:"Provincia",
        fabricaLocalidad: "Localidad",
        fabricaCalle: "Calle",
        fabricaNum: "Numero"

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




/*********
 *
 * Add Sector
 *
 *********/

$("#btnAddSector").click(function(){
    console.log("addSecotr");
    var nombre = $("#modalAddSectorNombre");
    var fabrica = $("#modalAddSectorFabrica");

    var bandera = true;

    if(nombre.val() == "" || fabrica.val() == ""){
        bandera = false;
        nombre.parent().addClass("has-error");
        fabrica.parent().addClass("has-error");
    }else{
        bandera = true;
        nombre.parent().removeClass("has-error");
        fabrica.parent().removeClass("has-error");
    }

    if(bandera){
        $.ajax({
            url:"?view=agregar",
            data:"addSector=true&",
            type:"post",
            dataType:"text",
            success:function(response){
                console.log(response);
            },
            error:function(){
                alert("Error de conexion, intentelo mas tarde.");
            }
        });
    }
});


/*************************************************************/
/*  CAMBIAR ESTADO FABRICA                       */

function cambiarEstado(id, estadoActual, element){
    console.log("Cambiar Estado: actual: "+estadoActual+  " id: "+id);

    $.ajax({
        url:'?view=sistema/sistemaABM',
        data:'cambiarEstadoFabrica=true&id='+id+"&estadoActual="+estadoActual,
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
