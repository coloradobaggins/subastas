/**
 * Created by coloBaggins on 28/1/17.
 */
var modalAddSectorHTML;
var modalAddEquipoHTML;
var modalEditarFabricaHTML;
var lat_data;
var lng_data;
var title_data;
$(document).ready(function(){
    console.log("codeFabrica");
    modalAddSectorHTML = $("#modalAddSector");
    modalAddEquipoHTML = $("#modalAddEquipo");
    modalEditarFabricaHTML = $("#modalEditarFabrica");

    dataForMapsApi(); //Get all necessary data for maps Api ;)
});

function dataForMapsApi(){
  lat_data    = parseFloat($("#lat_data").text());
  lng_data    = parseFloat($("#lng_data").text());
  title_data  = $("#title-data").text();

  console.log("to show: "+lat_data + " - - "+lng_data+ " / title: "+title_data) ;
}

/*******************************************************/
//Editar Fabrica
//Get localidades por provincia
$(document).on('change', "#provincia", function(){
    console.log("hola");
    var idProv = $(this).val()
    var strOptions;
    if(idProv != ""){
        strOptions = makeLocalidadesStrOptions(idProv);
    }else{
        strOptions = '<option value="">Selecc Prov</option>';
    }

    //append en select localidades
    $("#localidad").html(strOptions);
});

//Editar Fabrica
$('#btnEditarFabrica').click(function(){
    console.log("Editar fabrica");

    if($("#formEditarFabrica").valid()){

        var sendData = "editarFabrica=true&"+modalEditarFabricaHTML.find("#formEditarFabrica").serialize();
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


$("#formEditarFabrica").validate({
    rules: {
        nombre: "required",
        provincia:"required",
        localidad: "required",
        calle:"required",
        num:"required"
    },
    messages: {
        nombre: "Completar nombre de fabrica",
        provincia:"Selecciones provincia",
        localidad: "Seleccione localidad",
        calle:"Completar calle",
        num:"Completar numero"
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


/*******************************************************/
//Cambiar estado Sector
function cambiarEstadoSector(idSector, estadoActual, element){
    console.log("Cambiar Estado: actual: "+estadoActual+  " idSector: "+idSector);
    var dataSend = 'cambiarEstadoSector=true&idSector='+idSector+"&estadoActual="+estadoActual;
    $.ajax({
        url:'?view=sistema/sistemaSectorABM',
        data:dataSend,
        type:'post',
        dataType:'text',
        beforeSend:function(){},
        success:function(response){
            console.log(response);
            var parsedData = JSON.parse(response);
            if(parsedData.status =="success"){
                var nuevoEstado = (estadoActual==0) ? 1 : 0;
                var nuevoOnclick = 'cambiarEstadoSector('+idSector+', '+nuevoEstado+', $(this));';
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
            alert(errorConnection);
        }
    });
}

/*******************************************************/
//ADD SECTOR

$("#btnAddSector").click(function(){

    var sectorNombre = modalAddSectorHTML.find("#sectorNombre");

    var bandera = true;

    if(sectorNombre.val() == ""){
        sectorNombre.parent().addClass('has-error');
        bandera = false;
    }else{
        bandera = true;
        sectorNombre.parent().removeClass('has-error');
    }


    if(bandera){
        $.ajax({
            url:'?view=sistema/sistemaSectorABM',
            data:"addSector=true&"+modalAddSectorHTML.find("#formAddSector").serialize(),
            type:'post',
            dataType:'text',
            beforeSend:function(){},
            success:function(response){
                console.log(response);
                var parsedData = JSON.parse(response);
                if(parsedData.status == "success"){
                    location.reload();
                }else{
                    alert("Se produjo un error al agregar secter, intentelo nuevamente o contactese con un administrador.");
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


/*******************************************************/
//Get datos para modificar Sector
var modalEditarSector = $("#modalEditarSector");
$('.showModalEditarSector').click(function(){
    var idSector = $(this).attr('id');


    var sendData = 'getDatosSector=true&idSector='+idSector;
    $.ajax({
        url:'?view=/sistema/sistemaSectorABM',
        data:sendData,
        type:'post',
        dataType:'text',
        beforeSend:function(){},
        success:function(response){
            console.log(response);
            var parsedData = JSON.parse(response);

            modalEditarSector.find("#hiddenIDsector").val(idSector);
            modalEditarSector.find("#nombreSector").val(parsedData.nombre);
            modalEditarSector.find("#responsable").val(parsedData.responsable);

            modalEditarSector.modal('show');

        },
        timeout:10000,
        error:function(){
            alert(errorConnection);
        }
    });

});

//Editar Sector

$("#btnEditarSector").click(function(){
    console.log("editar sector");
    var nombreSector = modalEditarSector.find("#nombreSector");
    var bandera = true;
    if(nombreSector.val() == ""){
        nombreSector.parent().addClass('has-error');
        bandera = false;
    }else{
        nombreSector.parent().removeClass('has-error');
        bandera = true;
    }

    if(bandera){
        var sendData = "editarSector=true&"+modalEditarSector.find("#formEditarSector").serialize();
        $.ajax({
            url:'?view=sistema/sistemaSectorABM',
            data:sendData,
            type:'post',
            dataType:'text',
            beforeSend:function(){},
            success:function(response){
                console.log(response);
                var parsedData = JSON.parse(response);
                if(parsedData.status == "success"){
                    location.reload();
                }else{
                    alert("Se produjo un error al actualizar sector. Comuniquese con un administraor o intentelo mas tarde.");
                    console.log(response);
                }
            },
            timeout:10000,
            error:function(){
                alerta(errorConnection);
            }
        });
    }


});


/*******************************************************/
//ELIMINAR SECTOR
function eliminarSector(idSector){
    console.log("Eliminar sector id: "+idSector);

    if(confirm("Eliminar sector?")){
        $.ajax({
            url:'?view=sistema/sistemaSectorABM',
            data:'eliminarSector=true&idSector='+idSector,
            type:'post',
            dataType:'text',
            beforeSend:function(){},
            success:function(response){
                console.log(response);
                var parsedData = JSON.parse(response);
                if(parsedData.status == "success"){
                    location.reload();
                }else{
                    alert("Error al eliminar sector. Verificar que no haya sectores asignados al mismo. Comuniquese con un administrador.");
                    console.log(response);
                }
            },
            timeout:10000,
            error:function(){
                alert(errorConnection);
            }
        });
    }
}


/*******************************************************/
//ADD EQUIPO
var idSectorList;
//Show Modal AddEquipo
$(".showModalAddEquipo").click(function(){

    //Limpiar modal
    modalAddEquipoHTML.find('form')[0].reset();

    var idSector = $(this).closest('.sector-panel').attr('id');
    console.log("idSector: "+idSector);
    modalAddEquipoHTML.find("#hiddenIdSector").val(idSector);   //Agregar hidden idSector a modal


    idSectorList = idSector;
});

//AddEquipo
$("#btnAddEquipo").click(function(){

    var listSectorEquiposHTML = $("#sectorEquipoList_"+idSectorList);
    var equipoNombre = modalAddEquipoHTML.find("#equipoNombre");


    if($("#formAddEquipo").valid()){
        $.ajax({
            url:'?view=sistema/sistemaSectorABM',
            data:'addEquipo=true&'+$("#formAddEquipo").serialize(),
            type:'post',
            dataType:'json',
            beforeSend:function(){},
            success:function(response){

                if(response.status == "success"){

                    var strEquipo = "";
                    strEquipo += '<li class="list-group-item">';
                    strEquipo += '<a href="?view=sistema/sistemaEquipo&idEquipo='+response.lastId+'">'+equipoNombre.val()+'</a>';
                    strEquipo += '<div class="btn-group pull-right">';
                    strEquipo += '<button class="btn btn-danger btn-xs" onclick="borrarEquipo('+response.lastId+');" title="Eliminar Equipo"><span class="glyphicon glyphicon-trash"></span></button>';
                    strEquipo += '<button class="btn btn-xs btn-success" onclick="cambiarEstado('+response.lastId+', 1, $(this));" title="Activar/Desactivar"><span class="glyphicon glyphicon-off"></span></button>';
                    strEquipo += '</div>';
                    strEquipo += '</li>';

                    listSectorEquiposHTML.append(strEquipo);

                    modalAddEquipoHTML.modal('hide');
                }else{
                    alert("Ocurrio un problema al agregar equipo, intentelo nuevamente mas tarde");
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



//Validar addEquipop forme
$("#formAddEquipo").validate({
    rules: {
        equipoNombre: "required",
        equipoEstado:"required",
        equipoPeriodo: "required"
    },
    messages: {
        equipoNombre: "Nombre Equipo",
        equipoEstado:"Estado de equipo",
        equipoPeriodo: "Periodo de control"
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


//Borrar Equipo
function borrarEquipo(idEquipo){
    console.log("borrar Equipo id: "+idEquipo);
    if(confirm("Borrar equipo?")){
        $.ajax({
            url:'?view=sistema/sistemaSectorABM',
            data:'borrarEquipo=true&idEquipo='+idEquipo,
            type:'post',
            dataType:'text',
            beforeSend:function(){},
            success:function(response){
                console.log(response);
                var parsedData = JSON.parse(response);
                if(parsedData.status == "success"){
                    console.log("borrar");
                    //No se como sacar el li
                    location.reload();

                }else{
                    alert("Se produjo un error al borrar el equipo, intentelo nuevamente mas tarde.");
                    console.log(response);
                }
            },
            timeout:10000,
            error:function(){
                alert(errorConnection);
            }
        });
    }

}



/*************************************************************/
/*  CAMBIAR ESTADO Equipo                       */

function cambiarEstado(id, estadoActual, element){
    console.log("Cambiar Estado: actual: "+estadoActual+  " id: "+id);

    $.ajax({
        url:'?view=sistema/sistemaSectorABM',
        data:'cambiarEstado=true&id='+id+"&estadoActual="+estadoActual,
        type:'post',
        dataType:'text',
        beforeSend:function(){},
        success:function(response){
            console.log(response);
            if(response=="success"){
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
            alert(errorConnection);
        }
    });
}


//********************************************************************************************
//Google map api
//********************************************************************************************

function initMap() {
  console.log("initMap");
  var factory = {lat: lat_data, lng: lng_data};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: factory
  });

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">'+title_data+'</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
      'sandstone rock formation in the southern part of the '+
      '</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  var marker = new google.maps.Marker({
    position: factory,
    map: map,
    title: title_data
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
}
