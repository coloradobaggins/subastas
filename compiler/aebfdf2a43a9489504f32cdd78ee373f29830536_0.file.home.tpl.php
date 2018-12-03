<?php /* Smarty version 3.1.27, created on 2018-12-03 15:41:30
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19392881555c0578da85ab54_98530914%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aebfdf2a43a9489504f32cdd78ee373f29830536' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/home.tpl',
      1 => 1537395690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19392881555c0578da85ab54_98530914',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c0578da8bd3b7_59703356',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c0578da8bd3b7_59703356')) {
function content_5c0578da8bd3b7_59703356 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19392881555c0578da85ab54_98530914';
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