$(document).ready(function(){
    console.log("ready!");
});

$(".addPuja").click(function(){
  var id = this.id;
  console.log("addPuja: "+ id);


  //Agregar id a modal input hidden

  $("#idAutoNuevaPuja").val(id);


});


//Agregar puja y recargar
$("#btnSendPuja").click(function(){
  console.log("nueva puja");

  var idAutoPuja = $("#idAutoNuevaPuja").val();
  var valNuevaPuja = $("#puja").val();
  console.log("idNuevaPuja: "+idAutoPuja + " valor "+valNuevaPuja);
  if(valNuevaPuja!=0){
    $.ajax({
      url:'?view=updatePuja',
      data:'updatePuja=true&idAuto='+idAutoPuja+"&valorPuja="+valNuevaPuja,
      type:'post',
      dataType:'text',
      success:function(response){
          console.log(response);
          location.reload();
      },
      timeout:4000,
      error:function(){
        alert("Error de conexion, intentelo mas tarde");
      }
    });
  }else{
    alert("Ingrese valor de puja");
  }

});



  //Calcular valor ganancia provisoria
  $(".cacularValorProvisorio").click(function(){
    var valorTotalAuto = $(this).parent().parent().find(".valorTotalAuto");
    var montoProvisorio = $(this).parent().parent().find(".montoProvisorio");
    var showIn = $(this).parent().parent().find(".gananciaProv");

    var resultado = montoProvisorio.val() - parseInt(valorTotalAuto.text());

    showIn.text(resultado);
    console.log("Calcular valor provisoria");
  });


//Pasar idAuto de boton a modal.
$(".showAddValoresModal").click(function(){
  var idAuto = this.id;

  $("#modalValorCalle").find("#idAuto").val(idAuto);

  //Limpiar campos
  $("#modalValorCalle").find("#valorCalle").val();
  $("#modalValorCalle").find("#urlValorCalle").val();
});

//Agregar valor calle
$("#btnSendValorAuto").click(function(){

    var idAuto = $("#modalValorCalle").find("#idAuto").val();
    var valorCalle = $("#modalValorCalle").find("#valorCalle").val();
    var url = $("#modalValorCalle").find("#urlValorCalle").val();

    if(valorCalle){
        console.log("agregar valor calle: "+valorCalle+ " - url: "+url+" - idAuto: "+idAuto);
        $.ajax({
          url:'?view=valorCalle',
          data:'addValorCalle=true&idAuto='+idAuto+'&valor='+valorCalle+"&url="+url,
          type:'post',
          dataType:'text',
          success:function(response){
              console.log(response);
              if(response==1){
                location.reload();
              }
          },
          timeout:4000,
          error:function(){
            alert("Error de conexion, intentelo mas tarde");
          }
        });
    }else{
      alert("El valor no puede ser vacio");
    }

});

//Eliminar valor calle
$(".deleteValorCalle").click(function(){
  var idValor = this.id;
  //console.log("borrar valor id: "+idValor);

  if(confirm("Borrar valor?")){
    $.ajax({
      url:'?view=valorCalle',
      data:'borrarValorCalle=true&idValor='+idValor,
      type:'post',
      dataType:'text',
      success:function(response){
          console.log("response: "+response);
          location.reload();
      },
      timeout:4000,
      error:function(){
        alert("Error de conexion, intentelo mas tarde");
      }
    });
  }
});


//Comprar auto subasta
$(".comprar").click(function(){
  idAuto = this.id;

  var formElmt = $("#modalComprar");
  getUsuarios(formElmt, idAuto);


});


function getUsuarios(formElmt, idAuto){
  var select = formElmt.find("#compradores").empty();
  formElmt.find("#idAuto").val(idAuto);
  $.ajax({
      url:'?view=utils',
      data:'getUsuarios=true',
      type:'post',
      dataType:'text',
      success:function(response){
          console.log(response);
          var strUsers = '<option value="0">Elegir</option>';
          var parseData = JSON.parse(response);
          $.each(parseData, function(i, user){
            console.log("i: "+i+" - value: "+user.user);
            strUsers+='<option value="'+i+'">'+user.user+'</option>';
          });

          console.log(strUsers);
          select.append(strUsers);

      },
      timeout:4000,
      error:function(){
        alert("Error de conexion, intentelo mas tarde");
      }
    });
}

//Comprar auto
$("#btnBuyCar").click(function(){
  var idAuto = $("#modalComprar").find("#idAuto").val();
  var idComprador = $("#modalComprar").find("#compradores").val();
  var fechaCompra = $("#modalComprar").find("#fecha_compra").val();
  var monto = $("#modalComprar").find("#monto").val();

  if(idAuto){

    if(idComprador!=0){

      if(fechaCompra){
        console.log("idAuto: "+idAuto+" - idComprador: "+idComprador+" - fechaCompra: "+fechaCompra);

        $.ajax({
          url:'?view=comprarAuto',
          data:'comprarAuto=true&idAuto='+idAuto+'&idComprador='+idComprador+'&fechaCompra='+fechaCompra+'&monto='+monto,
          type:'POST',
          dataType:'text',
          success:function(response){
            console.log(response);
            location.reload();
          },
          timeout:4000,
          error:function(){
            alert("Error de conexion, intentelo mas tarde");
          }
        });


      }else{
        alert("Elegir fecha de compra, formato AAAA-MM-DD");
      }
    }else{
     alert("Elegir un comprador");
     console.log("el comprador no es valido");
    }
  }else{
    alert("Se produjo error al comprar este auto");
     console.log("id auto no es valido");
  }


});

//Desactivar Auto subasta (Eliminar del listado)
$(".disableAuto").click(function(){
  if(confirm("Eliminar del listado? Este auto no se volvera a mostrar")){
      alert("Desactivar auto id: "+this.id);
  }

});


//TODO:: AGREGAR FUNCIONALIDAD GASTOS OTROS EN SUBASTA!!


//Agregar auto a subasta
$("#btnAddAutoSubasta").click(function(){
  var serilizedData = $("#formAddAuto").serialize();
  console.log(serilizedData);

  $.ajax({
    url:'?view=autosSubasta/abmAutosSubasta',
    data:'addAutoSub=true&'+serilizedData,
    type:'post',
    dataType:'text',
    success:function(response){
      console.log(response);
      if(response==1){
        location.reload();
      }
    },
    timeout:4000,
    error:function(){
      alert("Error de conexion, intentelo mas tarde");
    }
  });
});
