$(document).ready(function(){
  console.log("ready");
});

$("#gastobtn").click(function(){
  var usrs = getUsuarios(); //de main

  //console.log(usrs);

  $("#modalAddGasto").find("#compradores").empty();
  $("#modalAddGasto").find("#compradores").append(usrs);

});

$("#btnSendGasto").click(function(){

  $.ajax({
    url:'?view=gastosGenerales/abmGastosGenerales',
    data:'addGasto=true&'+$("#formAddGasto").serialize(),
    type:'post',
    dataType:'text',
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

});


//DELETE Gasto
$(".deleteGasto").click(function(){
  var idGasto = this.id;
  console.log("Delete gasto id: "+idGasto);

  if(confirm("borrar gasto?")){
    $.ajax({
      url:'?view=gastosGenerales/abmGastosGenerales',
      data:'deleteGasto=true&idGasto='+idGasto,
      type:'post',
      dataType:'text',
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
  }



});
