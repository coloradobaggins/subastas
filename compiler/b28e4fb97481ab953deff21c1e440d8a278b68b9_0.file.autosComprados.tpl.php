<?php /* Smarty version 3.1.27, created on 2018-12-04 10:35:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/comprados/autosComprados.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6057116525c0682953c0048_11270145%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b28e4fb97481ab953deff21c1e440d8a278b68b9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/comprados/autosComprados.tpl',
      1 => 1540481090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6057116525c0682953c0048_11270145',
  'variables' => 
  array (
    'arrayAutosComprados' => 0,
    'auto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c06829541dba9_52768864',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c06829541dba9_52768864')) {
function content_5c06829541dba9_52768864 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6057116525c0682953c0048_11270145';
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
        <h2>Listado Autos adquiridos <button class="btn btn-success">Agregar Auto</button></h2>
      </div>
    </div> <!-- /container -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>

            <?php if (isset($_smarty_tpl->tpl_vars['arrayAutosComprados']->value)) {?>
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
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
$_from = $_smarty_tpl->tpl_vars['arrayAutosComprados']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['auto'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['auto']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->_loop = true;
$foreach_auto_Sav = $_smarty_tpl->tpl_vars['auto'];
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['marca'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['modelo'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['ano'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['dominio'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['kms'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['id_comustible'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['monto'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['nombreUsr'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['auto']->value['fecha_compra'];?>
</td>
                    <td><a href="?view=autoComprado&idComprado=<?php echo $_smarty_tpl->tpl_vars['auto']->value['id'];?>
" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-plus"></span></a></td>
                  </tr>
                  <?php
$_smarty_tpl->tpl_vars['auto'] = $foreach_auto_Sav;
}
?>
                </tbody>
              </table>
              <?php } else { ?>
              <p>Sin datos</p>
            <?php }?>

          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container -->




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