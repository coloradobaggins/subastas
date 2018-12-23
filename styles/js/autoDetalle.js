$(document).ready(function(){
  console.log("auto detalle ready");
});

$(".addOtrosGastos").click(function(){
  console.log("add otros gastos");
});


/******************************
* Editar gastos aprox
******************************/
$(".edit-gastos-aprox").click(function(){
  console.log("Editar gastos aprox subasta");


  var txt_pat = $(this).parent().parent().find(".txt-pat").text();
  var txt_caba = $(this).parent().parent().find(".txt-caba").text();
  var txt_bsas = $(this).parent().parent().find(".txt-bsas").text();


  addValuesToEditModalGastos(txt_pat, txt_caba, txt_bsas);

});

function addValuesToEditModalGastos(txt_pat, txt_caba, txt_bsas){


  $("#modalEditGastosAproxSub").find("#d_pat").val(txt_pat); //Debe patente
  $("#modalEditGastosAproxSub").find("#d_inf_caba").val(txt_caba); //Debe caba
  $("#modalEditGastosAproxSub").find("#d_inf_bsas").val(txt_bsas); //Debe bsas
}
