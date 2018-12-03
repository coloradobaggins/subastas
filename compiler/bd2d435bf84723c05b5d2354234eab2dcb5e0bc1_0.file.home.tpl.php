<?php /* Smarty version 3.1.27, created on 2018-12-02 23:31:05
         compiled from "C:\xampp\htdocs\subastas\styles\templates\home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3052381905c04956957d237_47335441%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd2d435bf84723c05b5d2354234eab2dcb5e0bc1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\home.tpl',
      1 => 1543804186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3052381905c04956957d237_47335441',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c0495695decc9_77988003',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c0495695decc9_77988003')) {
function content_5c0495695decc9_77988003 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3052381905c04956957d237_47335441';
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