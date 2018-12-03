<?php /* Smarty version 3.1.27, created on 2018-12-03 20:43:02
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/comprados/autoComprado.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17312773215c05bf86c396e1_00616638%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9c4a303a5ef6c780db99f78c80b3d6b0aa70725' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/comprados/autoComprado.tpl',
      1 => 1543880544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17312773215c05bf86c396e1_00616638',
  'variables' => 
  array (
    'arrDatosAuto' => 0,
    'arrGastosGes' => 0,
    'g_gestoria' => 0,
    'arrGastosInfr' => 0,
    'gastoInfr' => 0,
    'arrGastosOtros' => 0,
    'gasto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c05bf86cb75f6_36640257',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c05bf86cb75f6_36640257')) {
function content_5c05bf86cb75f6_36640257 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17312773215c05bf86c396e1_00616638';
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

      <h2>Comprado - Detalle</h2>
    </div>
  </div>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if (isset($_smarty_tpl->tpl_vars['arrDatosAuto']->value)) {?>

          <table class="table">

              <thead>
                  <tr>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>A&ntilde;o</th>
                      <th>DOM</th>
                      <th>KMS</th>
                      <th>Comustible</th>
                      <th>Monto</th>
                      <th>Comprador</th>
                      <th>Fecha Compra</th>

                  </tr>
              </thead>
              <tbody>

                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['marca'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['modelo'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['ano'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['dominio'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['kms'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['combustible'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['monto'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['nombre'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['fecha_compra'];?>
</td>
                </tr>

              </tbody>
            </table>


          <?php } else { ?>
            <p>Sin datos</p>
          <?php }?>
        </div>
      </div>
    </div><!-- /.container -->

    <div>
      <ul>
        <li>Radicacion: <?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['radicacion'];?>
</li>
      </ul>
    </div>

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
              <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['g_gestoria']->value['observacion'];?>
<span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['g_gestoria']->value['monto'];?>
</span> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['g_gestoria']->value['usrPago'];?>
</span><button id="<?php echo $_smarty_tpl->tpl_vars['g_gestoria']->value['id'];?>
" class="btn btn-xs btn-danger deleteGG"><span class="glyphicon glyphicon-trash"><span></button></li>
            <?php
$_smarty_tpl->tpl_vars['g_gestoria'] = $foreach_g_gestoria_Sav;
}
?>
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
              <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['gastoInfr']->value['observacion'];?>
<span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['gastoInfr']->value['monto'];?>
</span> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['gastoInfr']->value['usrPago'];?>
</span><button id="<?php echo $_smarty_tpl->tpl_vars['gastoInfr']->value['id'];?>
" class="btn btn-xs btn-danger deleteGInfr"><span class="glyphicon glyphicon-trash"><span></button></li>
            <?php
$_smarty_tpl->tpl_vars['gastoInfr'] = $foreach_gastoInfr_Sav;
}
?>
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
              <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['gasto']->value['observacion'];?>
<span class="badge">$ <?php echo $_smarty_tpl->tpl_vars['gasto']->value['monto'];?>
</span> <span class="badge"><?php echo $_smarty_tpl->tpl_vars['gasto']->value['usrPago'];?>
</span> <button id="<?php echo $_smarty_tpl->tpl_vars['gasto']->value['id'];?>
" class="btn btn-xs btn-danger deleteGO"><span class="glyphicon glyphicon-trash"><span></button></li>
            <?php
$_smarty_tpl->tpl_vars['gasto'] = $foreach_gasto_Sav;
}
?>
          <?php } else { ?>
          <li class="list-group-item">Sin datos</li>
          <?php }?>

          </ul>
        </div>
      </div>
    </div><!-- /.container -->

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