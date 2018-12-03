$(document).ready(function(){
	console.log("abmGastos.js");
});


//Formulario gastos gestoria
$("#btnSendGastoG").click(function(){
	console.log("Agregar gasto gestoria");
	var formSerialized = $("#formAddGG").serialize();
	var monto = $("#formAddGG").find("#monto");

	console.log("formAddGG: "+formSerialized);

	if(monto.val()!=0){
		$.ajax({
			url:"?view=autoAdquirido/abmAutoAdquirido",
			data:"addGastoG=true&"+formSerialized,
			type:"post",
			dataType:"text",
			success:function(response){
				console.log(response);
				if(response == 1){
					location.reload();
				}
			},
			timeout:4000,
			error:function(){
	        alert("Error de conexion, intentelo mas tarde");
	      }
		});
	}else{
		alert("Ingrese monto");
	}

});


//Formulario gastos infracciones
$("#btnSendGastoInfr").click(function(){
	console.log("Agregar gasto gestoria");
	var formSerialized = $("#formAddInfr").serialize();
	var monto = $("#formAddInfr").find("#monto");

	console.log("formAddGInfr: "+formSerialized);

	if(monto.val()!=0){
		$.ajax({
			url:"?view=autoAdquirido/abmAutoAdquirido",
			data:"addGastoDInfr=true&"+formSerialized,
			type:"post",
			dataType:"text",
			success:function(response){
				console.log(response);
				if(response == 1){
					location.reload();
				}
			},
			timeout:4000,
			error:function(){
	        alert("Error de conexion, intentelo mas tarde");
	      }
		});
	}else{
		alert("Ingrese monto");
	}

});

// Gastos otros
$("#btnSendGastoO").click(function(){
	console.log("Agregar gasto otro");
	var formSerialized = $("#formAddGO").serialize();
	var monto = $("#formAddGO").find("#monto");

	console.log("formAddGotro: "+formSerialized);

	if(monto.val()!=0){
		$.ajax({
			url:"?view=autoAdquirido/abmAutoAdquirido",
			data:"addGastoOtros=true&"+formSerialized,
			type:"post",
			dataType:"text",
			success:function(response){
				console.log(response);
				if(response == 1){
					location.reload();
				}
			},
			timeout:4000,
			error:function(){
	        alert("Error de conexion, intentelo mas tarde");
	      }
		});
	}else{
		alert("Ingrese monto");
	}

});


//Borrar GAstos
//Gastos gestoria
$('.deleteGG').click(function(){
	var id=this.id;
	deleteGastos("gastoG", id);
});

//Gastos Otros
$('.deleteGO').click(function(){
	var id=this.id;
	deleteGastos("gastoO", id);
});

//Gastos infr
$('.deleteGInfr').click(function(){
	var id=this.id;
	deleteGastos("gastoInfr", id);
});

function deleteGastos(tipo, id){
	console.log("Borrar gasto, tipo: "+tipo+" - id: "+id);
}
