<?php /* Smarty version 3.1.27, created on 2018-12-02 23:31:01
         compiled from "C:\xampp\htdocs\subastas\styles\templates\public\login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11477333105c04956507b8b5_58743513%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eebaf8a6278b3a9a9a4876c0a262a77add0ab787' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\public\\login.tpl',
      1 => 1543804186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11477333105c04956507b8b5_58743513',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c049565123861_68930969',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c049565123861_68930969')) {
function content_5c049565123861_68930969 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11477333105c04956507b8b5_58743513';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php echo $_smarty_tpl->getSubTemplate ('../overall/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <link href="styles/css/estilosLogin.css" rel="stylesheet" >
</head>
<body>



    <div class="logo-container">
      <!--<img src="styles/images/general/logo_new.png" alt="">-->
      <h1>Subastas</h1>
    </div>
    <div class="container form-container">
        <form class="form-signin">
            <h2 class="form-signin-heading">Iniciar sesión</h2>
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Email" required="required" autofocus>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Password" required="required">
            <button id="loginBtn" class="btn btn-lg btn-success btn-block" type="button">Ingresar</button>
            <div class="__AJAX__"></div>
        </form>
    </div> <!-- /container -->
  </div>

  <div class="little-footer">


    <div class="clear"></div>

    <?php echo $_smarty_tpl->getSubTemplate ('../overall/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo '<script'; ?>
 src="styles/js/codeLogin.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>