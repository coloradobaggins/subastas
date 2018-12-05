<?php /* Smarty version 3.1.27, created on 2018-12-05 01:54:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/comprados/autoComprado.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17615500775c0759ff9378f2_83531607%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9c4a303a5ef6c780db99f78c80b3d6b0aa70725' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/comprados/autoComprado.tpl',
      1 => 1543985051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17615500775c0759ff9378f2_83531607',
  'variables' => 
  array (
    'arrDatosAuto' => 0,
    'arrGastosGes' => 0,
    'g_gestoria' => 0,
    'sumGastosG' => 0,
    'arrGastosInfr' => 0,
    'gastoInfr' => 0,
    'sumGastosInfr' => 0,
    'arrGastosOtros' => 0,
    'gasto' => 0,
    'sumGastosO' => 0,
    'arrGastosPorUsr' => 0,
    'datosGastos' => 0,
    'sumGastos' => 0,
    'montoGasto' => 0,
    'userGasto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c0759ff99ad23_76826127',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c0759ff99ad23_76826127')) {
function content_5c0759ff99ad23_76826127 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17615500775c0759ff9378f2_83531607';
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


  <div class="container">
    <div class="row">

    </div>
  </div>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Comprado - Detalle <button class="btn btn-xs btn-warning pull-right">Actualizar datos</button></h2>
        </div>
      </div>
    </div><!-- /.container -->

    <div class="container">
      <div class="row">
        <?php if (isset($_smarty_tpl->tpl_vars['arrDatosAuto']->value)) {?>
          <div class="col-md-4">
            <ul>
              <li class="list-group-item">Marca: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['marca'];?>
</li>
              <li class="list-group-item">Modelo: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['modelo'];?>
</li>
              <li class="list-group-item">Dominio: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['dominio'];?>
</li>
              <li class="list-group-item">Radicacion: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['radicacion'];?>
</li>
            </ul>
          </div>

          <div class="col-md-4">
            <ul>
              <li class="list-group-item">A&Ntilde;O: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['ano'];?>
</li>
              <li class="list-group-item">KMS: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['kms'];?>
</li>
              <li class="list-group-item">Combustible: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['combustible'];?>
</li>
            </ul>
          </div>

          <div class="col-md-4">
            <ul>
              <li class="list-group-item">Monto: $ <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['monto'];?>
</li>
              <li class="list-group-item">Comprador: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['nombre'];?>
</li>
              <li class="list-group-item">Fecha Compra: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['combustible'];?>
</li>
            </ul>
          </div>
        <?php } else { ?>
          <div class="col-md-12">
            <div class="alert alert-warning">
              <p>Sin datos</p>
            </div>
          </div>
        <?php }?>

      </div><!-- /.row -->
    </div><!-- /.container -->



    <div class="container">

      <div class="row">
        <div class="col-md-6">
          <h4>Gastos</h4>
          <!-- Gastos gestoria -->
          <ul class="list-group">
            <li class="list-group-item active">Gastos Gestoria <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modalAddGgestoria"><span class="glyphicon glyphicon-plus"></span></button></li>
          <?php if (isset($_smarty_tpl->tpl_vars['arrGastosGes']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['arrGastosGes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['g_gestoria'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['g_gestoria']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['g_gestoria']->value) {
$_smarty_tpl->tpl_vars['g_gestoria']->_loop = true;
$foreach_g_gestoria_Sav = $_smarty_tpl->tpl_vars['g_gestoria'];
?>
              <li class="list-group-item"><button id="<?php echo $_smarty_tpl->tpl_vars['g_gestoria']->value['id'];?>
" class="btn btn-xs btn-danger pull-right deleteGG"><span class="glyphicon glyphicon-trash"><span></button> <?php echo $_smarty_tpl->tpl_vars['g_gestoria']->value['observacion'];?>
<span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['g_gestoria']->value['monto'];?>
</span> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['g_gestoria']->value['usrPago'];?>
</span></li>
            <?php
$_smarty_tpl->tpl_vars['g_gestoria'] = $foreach_g_gestoria_Sav;
}
?>
            <li class="list-group-item list-group-item-warning">Total: <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['sumGastosG']->value;?>
</span></li>
          <?php } else { ?>
          <li class="list-group-item">Sin datos</li>
          <?php }?>
        </ul>

      </div>

        <div class="col-md-6">
          <h4>Deudas</h4>
          <ul class="list-group">
            <li class="list-group-item active">GAstos Infracciones <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modalAddInfr"><span class="glyphicon glyphicon-plus"></span></button></li>
          <?php if (isset($_smarty_tpl->tpl_vars['arrGastosInfr']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['arrGastosInfr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['gastoInfr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['gastoInfr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gastoInfr']->value) {
$_smarty_tpl->tpl_vars['gastoInfr']->_loop = true;
$foreach_gastoInfr_Sav = $_smarty_tpl->tpl_vars['gastoInfr'];
?>
              <li class="list-group-item"><button id="<?php echo $_smarty_tpl->tpl_vars['gastoInfr']->value['id'];?>
" class="btn btn-xs btn-danger deleteGInfr"><span class="glyphicon glyphicon-trash"><span></button> <?php echo $_smarty_tpl->tpl_vars['gastoInfr']->value['observacion'];?>
<span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['gastoInfr']->value['monto'];?>
</span> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['gastoInfr']->value['usrPago'];?>
</span></li>
            <?php
$_smarty_tpl->tpl_vars['gastoInfr'] = $foreach_gastoInfr_Sav;
}
?>
            <li class="list-group-item list-group-item-warning">Total: <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['sumGastosInfr']->value;?>
</span></li>
          <?php } else { ?>
          <li class="list-group-item">Sin datos</li>
          <?php }?>

          </ul>

        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <!-- Otros Gastos -->
          <ul class="list-group">
            <li class="list-group-item active">Otros gastos <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modalAddGO"><span class="glyphicon glyphicon-plus"></span></button></li>
          <?php if (isset($_smarty_tpl->tpl_vars['arrGastosOtros']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['arrGastosOtros']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['gasto'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['gasto']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gasto']->value) {
$_smarty_tpl->tpl_vars['gasto']->_loop = true;
$foreach_gasto_Sav = $_smarty_tpl->tpl_vars['gasto'];
?>
              <li class="list-group-item"><button id="<?php echo $_smarty_tpl->tpl_vars['gasto']->value['id'];?>
" class="btn btn-xs btn-danger pull-right deleteGO"><span class="glyphicon glyphicon-trash"><span></button> <?php echo $_smarty_tpl->tpl_vars['gasto']->value['observacion'];?>
<span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['gasto']->value['monto'];?>
</span> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['gasto']->value['usrPago'];?>
</span></li>
            <?php
$_smarty_tpl->tpl_vars['gasto'] = $foreach_gasto_Sav;
}
?>
            <li class="list-group-item list-group-item-warning">Total: <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['sumGastosO']->value;?>
</span></li>
          <?php } else { ?>
          <li class="list-group-item">Sin datos</li>
          <?php }?>

          </ul>
        </div>
      </div>

    </div><!-- /.container -->

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4>Resumenes de gastos</h4>
          <?php if (isset($_smarty_tpl->tpl_vars['arrGastosPorUsr']->value)) {?>
            <?php $_smarty_tpl->tpl_vars["sumGastos"] = new Smarty_Variable("0", null, 0);?>
            <?php
$_from = $_smarty_tpl->tpl_vars['arrGastosPorUsr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['datosGastos'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['datosGastos']->_loop = false;
$_smarty_tpl->tpl_vars['userGasto'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['userGasto']->value => $_smarty_tpl->tpl_vars['datosGastos']->value) {
$_smarty_tpl->tpl_vars['datosGastos']->_loop = true;
$foreach_datosGastos_Sav = $_smarty_tpl->tpl_vars['datosGastos'];
?>
              <?php $_smarty_tpl->tpl_vars['sumGastos'] = new Smarty_Variable(0, null, 0);?>
            <div>
              <ul>
              <?php
$_from = $_smarty_tpl->tpl_vars['datosGastos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['montoGasto'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['montoGasto']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['montoGasto']->value) {
$_smarty_tpl->tpl_vars['montoGasto']->_loop = true;
$foreach_montoGasto_Sav = $_smarty_tpl->tpl_vars['montoGasto'];
?>
                  <?php $_smarty_tpl->tpl_vars['sumGastos'] = new Smarty_Variable($_smarty_tpl->tpl_vars['sumGastos']->value+$_smarty_tpl->tpl_vars['montoGasto']->value, null, 0);?>
              <?php
$_smarty_tpl->tpl_vars['montoGasto'] = $foreach_montoGasto_Sav;
}
?>
                  <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['userGasto']->value;?>
 <span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['sumGastos']->value;?>
</span></li>
              </ul>
            </div>
            <?php
$_smarty_tpl->tpl_vars['datosGastos'] = $foreach_datosGastos_Sav;
}
?>

          <?php } else { ?>
          <p>Sin datos</p>
          <?php }?>
        </div>
      </div>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ('comprados/modalAddInfr.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('comprados/modalAddGastoGestoria.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('comprados/modalAddGastosOtros.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



    <?php echo $_smarty_tpl->getSubTemplate ('overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo '<script'; ?>
 src="styles/js/verAutos.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="styles/js/autoAdquirido/abmGastos.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
?>