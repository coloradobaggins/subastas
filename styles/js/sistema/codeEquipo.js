$(document).ready(function(){
	console.log("Ready code equipo");
});

var formAddHistorial = $("#formAddHistorial");
$("#btnAddHistorial").click(function(){
	
	if($("#formAddHistorial").valid()){
		var sendData = 'addHistorial=true&'+formAddHistorial.serialize();
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



$("#formAddHistorial").validate({
    rules: {
        nuevoEstado: "required",
        nuevoDetalle:"required"
    },
    messages: {
        nuevoEstado: "Estado Equipo",
        nuevoDetalle: "Detalle"
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

//Get Datos para editar equipo
var modalEditarEquipo = $("#modalEditarEquipo");
var tablaDatosEquipo = $(".datos-equipo");
$('.showModalEditarEquipo').click(function(){
	var idEquipo = $(this).attr('id');
	var equipoNombre = tablaDatosEquipo.find(".equipo-nombre");
	var equipoIdSector = tablaDatosEquipo.find(".equipo-sector").attr('id');
	var equipoIdEstado = tablaDatosEquipo.find(".equipo-estado").attr('id');
	var equipoIdPeriodo = tablaDatosEquipo.find(".equipo-periodo").attr('id');
	var equipoNserie = tablaDatosEquipo.find(".equipo-n_serie");
	var equipoDetalle = tablaDatosEquipo.find('.equipo-detalle');


	modalEditarEquipo.find("#nombreEquipo").val(equipoNombre.text());
	modalEditarEquipo.find("#n_serie").val(equipoNserie.text());
	modalEditarEquipo.find("#detalle").val(equipoDetalle.text());

	//TODO::falta seleccionar los id de los selects	
	modalEditarEquipo.find("#estado").val(equipoIdEstado);
	modalEditarEquipo.find("#periodo").val(equipoIdPeriodo);

	modalEditarEquipo.find("#hiddenIDequipo").val(idEquipo);



	modalEditarEquipo.modal('show');


});


//Modificar datos Equipo
$("#btnEditarEquipo").click(function(){
	console.log("Editar equipo!");

	if($("#formEditarEquipo").valid()){

		var dataSend = "editarEquipo=true&"+modalEditarEquipo.find("#formEditarEquipo").serialize();

		$.ajax({
			url:'?view=sistema/sistemaABM',
			data:dataSend,
			type:'post',
			dataType:'text',
			beforeSend:function(){},
			success:function(response){
				console.log(response);
				var parsedData = JSON.parse(response);
				if(parsedData.status == "success"){
					location.reload();
				}else{
					aler(errorAjaxGeneral);
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


$("#formEditarEquipo").validate({
    rules: {
        nombreEquipo:"required",
        estado:"required",
        periodo:"required"
    },
    messages: {
        nombreEquipo: "Completar nombre",
        estado:"Seleccione un estado",
        periodo:"Seleccione un periodo de control"
        
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


function eliminarEstadoHistorial(idHistorial, idEquipo){
	console.log("Eliminar estado historial id: "+idHistorial);

	if(confirm("Eliminar de historial?")){

		var sendData = "eliminarHistorial=true&idHistorial="+idHistorial+"&idEquipo="+idEquipo;
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
					//$(this).closest('.historialEquipo-block').remove(); //cambiar para que funcione
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

}

