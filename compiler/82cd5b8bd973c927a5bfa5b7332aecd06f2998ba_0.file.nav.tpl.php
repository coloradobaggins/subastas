<?php /* Smarty version 3.1.27, created on 2018-12-02 23:31:05
         compiled from "C:\xampp\htdocs\subastas\styles\templates\overall\nav.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11993537715c0495695f63d6_92081523%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82cd5b8bd973c927a5bfa5b7332aecd06f2998ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\overall\\nav.tpl',
      1 => 1543804186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11993537715c0495695f63d6_92081523',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c049569611952_05785202',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c049569611952_05785202')) {
function content_5c049569611952_05785202 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11993537715c0495695f63d6_92081523';
?>
<!-- Static navbar -->
<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- TOGGLE MENU SIDEBAR BUTTON -->

                <a class="navbar-brand" href="#">Subastero</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="?view=autosSubasta">Ver Subasta</a></li>
                    <li><a href="?view=datos">Carga Datos</a></li>
                    <li><a href="?view=listComprados">Adquiridos</a></li>
                    <li><a href="?view=gastosGenerales">Gastos Generales</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['user'])) {?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user'];?>
 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><?php echo $_SESSION['rol_name'];?>
</li>
                            <li><a href="?view=logout">Logout</a></li>
                        </ul>
                    </li>
                    <?php }?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>
<?php }
}
?>