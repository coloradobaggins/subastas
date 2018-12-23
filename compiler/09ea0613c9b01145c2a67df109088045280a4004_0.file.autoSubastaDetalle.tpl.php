<?php /* Smarty version 3.1.27, created on 2018-12-23 03:34:45
         compiled from "C:\xampp\htdocs\subastas\styles\templates\autoSubastaDetalle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15961635775c1f2c85bcee65_14124620%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09ea0613c9b01145c2a67df109088045280a4004' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\autoSubastaDetalle.tpl',
      1 => 1545546880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15961635775c1f2c85bcee65_14124620',
  'variables' => 
  array (
    'arrDetallesAuto' => 0,
    'arrGastosTotales' => 0,
    'arrValores' => 0,
    'valorAuto' => 0,
    'promVal' => 0,
    'auto' => 0,
    'arrGastosAdm' => 0,
    'arrayOtrosGastosSubastas' => 0,
    'gastoO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c1f2c85c4fd04_53041507',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c1f2c85c4fd04_53041507')) {
function content_5c1f2c85c4fd04_53041507 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15961635775c1f2c85bcee65_14124620';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php echo $_smarty_tpl->getSubTemplate ('overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <link href="styles/css/estilosAutos.css" rel="stylesheet" >
</head>
<body>

  <?php echo $_smarty_tpl->getSubTemplate ('overall/nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div class="logo-container">
      <h2>Detalle Auto Subasta <button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></h2>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">

        </div>
      </div>
    </div> <!-- /container -->

    <div class="container">
      <?php if (isset($_smarty_tpl->tpl_vars['arrDetallesAuto']->value)) {?>
      <div class="row">
        <div class="col-md-4">
          <div class="alert alert-info">
            <ul>
              <li>Modelo: <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['marca'];?>
 <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['modelo'];?>
</li>
              <li>Dom: <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['dominio'];?>
</li>
              <li>Radcado: <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['radicacion'];?>
</li>
            </ul>
          </div>
        </div><!-- /.col -->
        <div class="col-md-5">
          <div class="alert alert-success">
            <?php if (isset($_smarty_tpl->tpl_vars['arrDetallesAuto']->value)) {?>
            <div class="row">
              <div class="col-md-6">
                <h4>Puja Actual: <?php if ($_smarty_tpl->tpl_vars['arrDetallesAuto']->value['comprado'] == 0) {?><button id="<?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['id'];?>
" data-toggle="modal" data-target="#modalAddPuja" class="btn btn-success btn-xs addPuja pull-right" title="Actualizar"><span class="glyphicon glyphicon-check"></span></button><?php }?></h4>
                <p>$ <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['valor_puja'];?>
</p>

              </div>
              <div class="col-md-6">
                <p>Fecha de Cierre</h4>
                <p><?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['fecha_cierre'];?>
 - <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['hora_cierre'];?>
</p>
              </div>
            </div>
            <?php }?>
          </div>
        </div>

        <div class="col-md-3">
          <div class="alert alert-warning">
            <h4>Total a Pagar:</h4>
            <p>$ <?php echo $_smarty_tpl->tpl_vars['arrGastosTotales']->value['totalAPagar'];?>
</p>
          </div>
        </div>
      </div><!-- /.row -->


      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-warning">
            <p>A&ntilde;o: <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['ano'];?>
 - Combustible: <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['combustible'];?>
 - Kms: <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['kms'];?>
 - Precio DNRPA: $ <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['precio_lista'];?>
</p>
          </div>
        </div>
      </div>
      <?php }?>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="list-group">
            <li class="list-group-item active">Otros datos:</li>
            <li class="list-group-item">Observaciones: <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['observacion'];?>
</li>
            <li class="list-group-item">Observaciones Visitas: <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['visita_observaciones'];?>
</li>
            <li class="list-group-item">Puntaje Visita <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['visita_puntaje'];?>
</li>
            <li class="list-group-item">Url sitio <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['url_narvaez'];?>
</li>
            <li class="list-group-item">Cargado por: <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['usuario'];?>
</li>
          </ul>
        </div>

        <div class="col-md-6">

          <ul class="list-group">
            <li class="list-group-item active">Valores autos cargados <button id="<?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['id'];?>
" class="btn btn-xs btn-success pull-right showAddValoresModal" data-toggle="modal" data-target="#modalValorCalle"><span class="glyphicon glyphicon-plus"></span></button></li>
          <?php if (isset($_smarty_tpl->tpl_vars['arrValores']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['arrValores']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['valorAuto'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['valorAuto']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['valorAuto']->value) {
$_smarty_tpl->tpl_vars['valorAuto']->_loop = true;
$foreach_valorAuto_Sav = $_smarty_tpl->tpl_vars['valorAuto'];
?>
              <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['valorAuto']->value['url'];?>
 <button id="<?php echo $_smarty_tpl->tpl_vars['valorAuto']->value['id'];?>
" class="btn btn-xs btn-danger pull-right deleteValorCalle"><span class="glyphicon glyphicon-trash"></span></button><span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['valorAuto']->value['valor'];?>
</span></li>
            <?php
$_smarty_tpl->tpl_vars['valorAuto'] = $foreach_valorAuto_Sav;
}
?>
              <li class="list-group-item list-group-item-success">Promedio <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['promVal']->value;?>
</span></li>

          <?php } else { ?>
            <li class="list-group-item list-group-item-warning">Sin cargar</li>
          </ul>

          <?php }?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <?php if (isset($_smarty_tpl->tpl_vars['arrDetallesAuto']->value)) {?>
        <div class="col-md-4">

              <ul class="list-group">
                <li class="list-group-item active">Gastos aprox <button id="<?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['id'];?>
" class="btn btn-xs btn-warning pull-right edit-gastos-aprox" data-target="#modalEditGastosAproxSub" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></button></li>
                <li class="list-group-item">Debe Patente: <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['deuda_patente'];?>
</span></li>
                <li class="list-group-item">Debe. CABA: <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['deuda_infr_caba'];?>
</span></li>
                <li class="list-group-item">Debe. BSAS: <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['deuda_infr_bsas'];?>
</span></li>
                <li class="list-group-item list-group-item-warning">Comision: <?php echo $_smarty_tpl->tpl_vars['auto']->value['comision'];?>
% <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['comision_valor'];?>
</span></li>

                <li class="list-group-item list-group-item-warning">Gastos adm + IVA: <span class="badge"><?php if (isset($_smarty_tpl->tpl_vars['arrGastosAdm']->value)) {?> $ <?php echo $_smarty_tpl->tpl_vars['arrGastosAdm']->value['monto']+$_smarty_tpl->tpl_vars['arrGastosAdm']->value['montoIva'];?>
 <?php } else { ?> N/A<?php }?></span></li>

                <li class="list-group-item">IVA Incluido en valor final: <span class="badge"><?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['iva_incluido'];?>
</span></li>
                <li class="list-group-item list-group-item-warning">Gastos Aprox Gestoria: <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['gastos_aprox_gestor'];?>
</span></li>
              </ul>

        </div><!-- /.col -->
        <?php }?>

        <div class="col-md-8">
          <ul class="list-group">
            <li class="list-group-item active">Otros gastos <button id="<?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['id'];?>
" class="btn btn-xs btn-warning pull-right addOtrosGastos"><span class="glyphicon glyphicon-plus"></span></buttn></li>
            <?php if (isset($_smarty_tpl->tpl_vars['arrayOtrosGastosSubastas']->value)) {?>
              <?php
$_from = $_smarty_tpl->tpl_vars['arrayOtrosGastosSubastas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['gastoO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['gastoO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gastoO']->value) {
$_smarty_tpl->tpl_vars['gastoO']->_loop = true;
$foreach_gastoO_Sav = $_smarty_tpl->tpl_vars['gastoO'];
?>
                <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['gastoO']->value['observacion'];?>
 <span class="badge"><?php echo $_smarty_tpl->tpl_vars['gastoO']->value['monto'];?>
</span></li>
              <?php
$_smarty_tpl->tpl_vars['gastoO'] = $foreach_gastoO_Sav;
}
?>
            <?php }?>
          </ul>
        </div>
      </div><!-- /.row -->

    </div><!-- /.container -->


    <div class="container">
      <div class="row">


      </div><!-- /.row -->
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ('verAutos/modalAddPuja.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('verAutos/modalAddValorCalle.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('verAutos/modalEditGastosAproxSub.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



    <?php echo $_smarty_tpl->getSubTemplate ('overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo '<script'; ?>
 src="styles/js/verAutos.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="styles/js/autoDetalle.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
?>