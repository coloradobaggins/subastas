<?php /* Smarty version 3.1.27, created on 2018-12-02 23:31:08
         compiled from "C:\xampp\htdocs\subastas\styles\templates\gastosGenerales\gastosGenerales.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3372062405c04956ca68f49_55033121%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3e27797804782a97489cb1c96119e3c4f712776' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\gastosGenerales\\gastosGenerales.tpl',
      1 => 1543804186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3372062405c04956ca68f49_55033121',
  'variables' => 
  array (
    'arrayGastos' => 0,
    'gasto' => 0,
    'arrayGastosUsr' => 0,
    'gastos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c04956cada3e7_77735142',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c04956cada3e7_77735142')) {
function content_5c04956cada3e7_77735142 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3372062405c04956ca68f49_55033121';
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
        <h3>Gastos Generales <button id="gastobtn" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalAddGasto"><span class="glyphicon glyphicon-plus"></span></button></h3>
        <p>Herramientas, mantenimiento, etc</p>
      </div>
    </div> <!-- /container -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <table class="table">

                <thead>
                    <tr>
                        <th>Detalle</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Quien</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if (isset($_smarty_tpl->tpl_vars['arrayGastos']->value)) {?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['arrayGastos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["gasto"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["gasto"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["gasto"]->value) {
$_smarty_tpl->tpl_vars["gasto"]->_loop = true;
$foreach_gasto_Sav = $_smarty_tpl->tpl_vars["gasto"];
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['gasto']->value['observacion'];?>
</td>
                        <td>$ <?php echo $_smarty_tpl->tpl_vars['gasto']->value['monto'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['gasto']->value['fechaCompra'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['gasto']->value['usuarioCompra'];?>
</td>
                        <td><button id="<?php echo $_smarty_tpl->tpl_vars['gasto']->value['id'];?>
" class="btn btn-danger btn-xs deleteGasto"><span class="glyphicon glyphicon-trash"></span></button></td>
                      </tr>
                    <?php
$_smarty_tpl->tpl_vars["gasto"] = $foreach_gasto_Sav;
}
?>

                  <?php }?>
                </tbody>
            </table>

          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Resumen</h4>
          <?php if (isset($_smarty_tpl->tpl_vars['arrayGastosUsr']->value)) {?>
          <ul>
          <?php
$_from = $_smarty_tpl->tpl_vars['arrayGastosUsr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['gastos'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['gastos']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gastos']->value) {
$_smarty_tpl->tpl_vars['gastos']->_loop = true;
$foreach_gastos_Sav = $_smarty_tpl->tpl_vars['gastos'];
?>
            <li><?php echo $_smarty_tpl->tpl_vars['gastos']->value['usr'];?>
: $ <?php echo $_smarty_tpl->tpl_vars['gastos']->value['sumaGastos'];?>
</li>
          <?php
$_smarty_tpl->tpl_vars['gastos'] = $foreach_gastos_Sav;
}
?>
          </ul>
          <?php }?>
        </div>
      </div>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ('gastosGenerales/modalAddGasto.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>




    <?php echo $_smarty_tpl->getSubTemplate ('overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo '<script'; ?>
 src="styles/js/Main.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="styles/js/gastosGenerales/gastosGenerales.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
?>