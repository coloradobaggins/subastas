<?php /* Smarty version 3.1.27, created on 2018-12-02 09:36:26
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastaAdmin/styles/templates/autosSubasta.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3500517875c03d1ca33c665_75136506%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3e4524a4d94927e06e4e8f5ee9b4a19ec3f743f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastaAdmin/styles/templates/autosSubasta.tpl',
      1 => 1543426892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3500517875c03d1ca33c665_75136506',
  'variables' => 
  array (
    'arrayAutos' => 0,
    'auto' => 0,
    'valorCalle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c03d1ca4185c5_38930205',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c03d1ca4185c5_38930205')) {
function content_5c03d1ca4185c5_38930205 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3500517875c03d1ca33c665_75136506';
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
      <!--<img src="styles/images/general/logo_new.png" alt="">-->
      <h1>Autos</h1>
      <h2>Cargados a subastar proximamente <button class="btn btn-success" data-target="#modalAddAutoSubasta" data-toggle="modal" title="Agregar auto"><span class="glyphicon glyphicon-plus"></span></button></h2>
    </div>
    <div class="container form-container">

    </div> <!-- /container -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <table class="table">

                <thead>
                    <tr>
                        <th></th>
                        <th>Vehiculo</th>
                        <th>DOM</th>
                        <th>Rad.</th>
                        <th>+ Gestoria</th>
                        <th>Prom. Valor calle</th>
                        <th>Posible Ganancia</th>
                        <th>Puja</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($_smarty_tpl->tpl_vars['arrayAutos']->value)) {?>
                  <?php
$_from = $_smarty_tpl->tpl_vars['arrayAutos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['auto'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['auto']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->_loop = true;
$foreach_auto_Sav = $_smarty_tpl->tpl_vars['auto'];
?>
                      <tr data-toggle="collapse" data-target="#auto<?php echo $_smarty_tpl->tpl_vars['auto']->value['id'];?>
" class="accordion-toggle">
                          <td><a data-toggle="collapse" href="#detailsRow_120" aria-expanded="false" aria-controls="detailsRow_120"><i class="fa fa-plus-circle"></i></a></td>
                          <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['marca'];?>
 <?php echo $_smarty_tpl->tpl_vars['auto']->value['modelo'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['dominio'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['radicacion'];?>
</td>
                          <!--<td class="danger">$ <?php echo $_smarty_tpl->tpl_vars['auto']->value['deudaTotal'];?>
</td>-->
                          <!--<td>$ <?php echo $_smarty_tpl->tpl_vars['auto']->value['totalAPagar'];?>
</td>-->
                          <!--<td>$ <?php echo $_smarty_tpl->tpl_vars['auto']->value['totalAPagarMasDeuda'];?>
</td>-->
                          <td>$ <?php echo $_smarty_tpl->tpl_vars['auto']->value['totalAPagarMasDeuda']+$_smarty_tpl->tpl_vars['auto']->value['gastos_aprox_gestor'];?>
</td>
                          <td>
                            <?php if (isset($_smarty_tpl->tpl_vars['auto']->value["promedioValores"])) {?>
                              $ <?php echo $_smarty_tpl->tpl_vars['auto']->value["promedioValores"];?>

                            <?php } else { ?>
                            N/A
                            <?php }?>
                          </td>
                          <td class="info">
                            $ <?php echo $_smarty_tpl->tpl_vars['auto']->value["promedioValores"]-($_smarty_tpl->tpl_vars['auto']->value['totalAPagarMasDeuda']+$_smarty_tpl->tpl_vars['auto']->value['gastos_aprox_gestor']);?>

                          </td>
                          <td class="success">
                              <b>$ <?php echo $_smarty_tpl->tpl_vars['auto']->value['valor_puja'];?>
</b>
                          </td>
                          <td>
                            <?php if ($_smarty_tpl->tpl_vars['auto']->value['comprado'] == 0) {?>
                              <button id="<?php echo $_smarty_tpl->tpl_vars['auto']->value['id'];?>
" data-toggle="modal" data-target="#modalAddPuja" class="btn btn-success btn-xs addPuja" title="Actualizar"><span class="glyphicon glyphicon-check"></span></button>
                            <?php }?>
                          </td>
                          <td>
                            <?php if ($_smarty_tpl->tpl_vars['auto']->value['comprado'] == 0) {?>
                              <button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-option-vertical"></span></button>
                            <?php }?>
                          </td>
                      </tr>

                      <tr>
                          <td colspan="12" class="hiddenRow">
                            <div class="accordian-body collapse" id="auto<?php echo $_smarty_tpl->tpl_vars['auto']->value['id'];?>
">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <p>La posible ganancia es calculada segun los precios de autos cargados para este vehiculo.<br />
                                      Para verlos entrar en los detalles.</p>

                                    </div><!-- /.col-->

                                    <div class="col-md-6">

                                      <div class="bs-callout bs-callout-warning">
                                        <p>Total + deuda + gestoria + otros Gastos</p>
                                         <h4><b>$ <?php echo $_smarty_tpl->tpl_vars['auto']->value['totalAPagarMasDeuda']+$_smarty_tpl->tpl_vars['auto']->value['gastos_aprox_gestor'];?>
</b></h4>
                                      </div>

                                      <div class="bs-callout bs-callout-info">
                                        <p>Fecha de cierre:</p>
                                        <h4><b><?php echo $_smarty_tpl->tpl_vars['auto']->value['fecha_cierre'];?>
 <?php echo $_smarty_tpl->tpl_vars['auto']->value['hora_cierre'];?>
</b></h4>

                                      </div>

                                      <div class="bs-callout bs-callout-info">
                                        <ul>
                                          <li>A&ntilde;o: <?php echo $_smarty_tpl->tpl_vars['auto']->value['ano'];?>
</li>
                                          <li>Combustible: <?php echo $_smarty_tpl->tpl_vars['auto']->value['combustible'];?>
</li>
                                          <li>Kms: <?php echo $_smarty_tpl->tpl_vars['auto']->value['kms'];?>
</li>
                                          <li>Arranca: <?php if ($_smarty_tpl->tpl_vars['auto']->value['arranca'] == 1) {?>Si<?php } else { ?>No<?php }?></li>
                                          <li>Precio Lista (DNRPA): <b>$ <?php echo $_smarty_tpl->tpl_vars['auto']->value['precio_lista'];?>
</b></li>
                                        </ul>
                                      </div>


                                    </div><!-- /.col -->

                                  </div><!-- /.row-->

                                  <div class="row">
                                    <div class="col-md-12">

                                      <div class="row">
                                        <div class="col-md-6">
                                          <ul>
                                          <li>Observaciones: <?php echo $_smarty_tpl->tpl_vars['auto']->value['observacion'];?>
</li>
                                          <li>Observaciones Visitas: <?php echo $_smarty_tpl->tpl_vars['auto']->value['visita_observaciones'];?>
</li>
                                          <li>Puntaje Visita</li>
                                          <li>Url sitio</li>
                                          <li>Cargado por: <?php echo $_smarty_tpl->tpl_vars['auto']->value['usuario'];?>
</li>
                                        </ul>
                                        </div>
                                        <div class="col-md-6">
                                          <!--
                                          <h4>Valores autos cargados <button id="<?php echo $_smarty_tpl->tpl_vars['auto']->value['id'];?>
" class="btn btn-info showAddValoresModal" data-toggle="modal" data-target="#modalValorCalle"><i class="fa fa-plus-circle"></i></button></h4>
                                          <?php if (isset($_smarty_tpl->tpl_vars['auto']->value["listadoValorCalle"])) {?>
                                            <ul>
                                            <?php
$_from = $_smarty_tpl->tpl_vars['auto']->value["listadoValorCalle"];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['valorCalle'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['valorCalle']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['valorCalle']->value) {
$_smarty_tpl->tpl_vars['valorCalle']->_loop = true;
$foreach_valorCalle_Sav = $_smarty_tpl->tpl_vars['valorCalle'];
?>
                                              <?php if ($_smarty_tpl->tpl_vars['valorCalle']->value) {?>
                                              <li>$ <?php echo $_smarty_tpl->tpl_vars['valorCalle']->value['valor'];?>
 <button id="<?php echo $_smarty_tpl->tpl_vars['valorCalle']->value['id'];?>
" class="btn btn-xs btn-danger deleteValorCalle"><span class="glyphicon glyphicon-trash"></span></button></li>
                                              <?php }?>
                                            <?php
$_smarty_tpl->tpl_vars['valorCalle'] = $foreach_valorCalle_Sav;
}
?>
                                          </ul>
                                          <?php } else { ?>
                                          Sin cargar
                                          <?php }?>
                                        -->
                                        </div>
                                      </div><!-- /.row -->


                                    </div>

                                  </div><!-- /.row -->

                                  <div class="row">
                                    <div class="col-md-12">
                                       <div class="alert alert-info">

                                        <div class="row">
                                          <div class="col-md-6">
                                            <p>Acciones</p>
                                            <?php if ($_smarty_tpl->tpl_vars['auto']->value['comprado'] == 1) {?>
                                              <a class="btn btn-success" href="?view=autoComprado&idComprado=<?php echo $_smarty_tpl->tpl_vars['auto']->value['idAutoComprado'];?>
">COMPRADO! (Ver)</a>
                                            <?php } else { ?>

                                              <button id="<?php echo $_smarty_tpl->tpl_vars['auto']->value['id'];?>
" class="btn btn-default comprar" data-toggle="modal" data-target="#modalComprar"><span class="glyphicon glyphicon-usd"></span> COMPRAR</button>
                                              <a class="btn btn-info" href="?view=autoDetalle&idAuto=<?php echo $_smarty_tpl->tpl_vars['auto']->value['id'];?>
">Ver detalles</a>
                                            <?php }?>

                                            <button id="<?php echo $_smarty_tpl->tpl_vars['auto']->value['id'];?>
" class="btn btn-danger disableAuto"> Desactivar</button>

                                          </div>

                                          <div class="col-md-6">
                                            <p>Calcular otras Ganancias</p>

                                            <p>Costo Total: <b>$ <span class="valorTotalAuto"><?php echo $_smarty_tpl->tpl_vars['auto']->value['totalAPagarMasDeuda']+$_smarty_tpl->tpl_vars['auto']->value['gastos_aprox_gestor'];?>
</span></b></p>
                                            Venta a: <input type="number" id="" class="montoProvisorio" name="" placeholder="Monto">
                                            <button class="btn btn-info btn-xs cacularValorProvisorio"><span class="glyphicon glyphicon-check"></span></button>
                                            <p>Ganancia: <b>$ <span class="gananciaProv"></span></b></p>
                                          </div>
                                        </div>


                                      </div><!-- /.alert -->
                                    </div>
                                  </div>

                                </div><!--/.container-->




                            </div>
                          </td>
                      </tr>
                  <?php
$_smarty_tpl->tpl_vars['auto'] = $foreach_auto_Sav;
}
?>
                  </tbody>
                <?php } else { ?>
                      <tr>
                        <td>Sin datos</td>
                      </tr>
                <?php }?>
                </tbody>
            </table>

          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container -->

    <?php echo $_smarty_tpl->getSubTemplate ('verAutos/modalAddPuja.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('verAutos/modalAddValorCalle.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('verAutos/modalComprar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('verAutos/modalAddAutoSubasta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



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