<?php /* Smarty version 3.1.27, created on 2018-12-06 12:24:58
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/autoDetalle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21104808425c093f4a9ec781_73624694%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39e1d9c695f2d3f8124f9bece69e4d8f35ff548f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/autoDetalle.tpl',
      1 => 1544109886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21104808425c093f4a9ec781_73624694',
  'variables' => 
  array (
    'arrDetallesAuto' => 0,
    'arrGastosTotales' => 0,
    'auto' => 0,
    'arrGastosAdm' => 0,
    'arrValores' => 0,
    'valorAuto' => 0,
    'promVal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c093f4aa5b0f3_96786427',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c093f4aa5b0f3_96786427')) {
function content_5c093f4aa5b0f3_96786427 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21104808425c093f4a9ec781_73624694';
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
      <h2>Detalle Auto Subasta</h2>
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
        <?php if (isset($_smarty_tpl->tpl_vars['arrDetallesAuto']->value)) {?>
        <div class="col-md-4">

              <ul class="list-group">
                <li class="list-group-item active">Gastos aprox</li>
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
        <div class="col-md-6">
          <ul>
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
        <?php }?>
      </div><!-- /.row -->

    </div><!-- /.container -->


    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <ul class="list-group">
            <li class="list-group-item active">Valores autos cargados <button class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></button></li>
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
              <li class="list-group-item">$ <?php echo $_smarty_tpl->tpl_vars['valorAuto']->value['valor'];?>
</li>
            <?php
$_smarty_tpl->tpl_vars['valorAuto'] = $foreach_valorAuto_Sav;
}
?>
              <li class="list-group-item list-group-item-success">Promedio $ <?php echo $_smarty_tpl->tpl_vars['promVal']->value;?>
</li>

          <?php } else { ?>
          </ul>

          <?php }?>
        </div>

        <div class="col-md-6">
          <ul class="list-group">
            <li class="list-group-item active">Otros gastos</li>
          </ul>
        </div>

      </div><!-- /.row -->
    </div>


    <?php echo $_smarty_tpl->getSubTemplate ('overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo '<script'; ?>
 src="styles/js/verAutos.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
?>