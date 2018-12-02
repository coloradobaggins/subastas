<?php /* Smarty version 3.1.27, created on 2018-12-02 09:36:21
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastaAdmin/styles/templates/home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14682849275c03d1c580cf08_98327253%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c24a8f76627eed930c1d6b3f9c688673c078e7b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastaAdmin/styles/templates/home.tpl',
      1 => 1537395690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14682849275c03d1c580cf08_98327253',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c03d1c583af94_25125571',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c03d1c583af94_25125571')) {
function content_5c03d1c583af94_25125571 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14682849275c03d1c580cf08_98327253';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php echo $_smarty_tpl->getSubTemplate ('overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


</head>
<body>

  <?php echo $_smarty_tpl->getSubTemplate ('overall/nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div class="logo-container">
      <!--<img src="styles/images/general/logo_new.png" alt="">-->
      <h1>Subastas</h1>
    </div>
    <div class="container form-container">

    </div> <!-- /container -->





    <?php echo $_smarty_tpl->getSubTemplate ('overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


</body>
</html>
<?php }
}
?>