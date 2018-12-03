<?php /* Smarty version 3.1.27, created on 2018-12-03 15:42:16
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/comprados/modalAddGastoGestoria.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1746951815c0579084a6a55_19680424%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c62bf6780ef0a4a015ef60b1cc40da77969eab92' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/comprados/modalAddGastoGestoria.tpl',
      1 => 1543449278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1746951815c0579084a6a55_19680424',
  'variables' => 
  array (
    'arrUsrs' => 0,
    'usr' => 0,
    'arrDatosAuto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c0579084b5c48_03298886',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c0579084b5c48_03298886')) {
function content_5c0579084b5c48_03298886 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1746951815c0579084a6a55_19680424';
?>
<!-- Modal -->
<div id="modalAddGgestoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Gasto Gestoria</h4>
            </div>
            <div class="modal-body">
                <form id="formAddGG">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="monto">Monto</label>
                                <input type="number" id="monto" name="monto" class="form-control" placeholder="Monto Gestor">
                            </div>
                            <div class="form-group">
                                <label for="userPago">Quien pago</label>
                                <select id="userPago" name="userPago" class="form-control">
                                    <?php if (isset($_smarty_tpl->tpl_vars['arrUsrs']->value)) {?>
                                     <?php
$_from = $_smarty_tpl->tpl_vars['arrUsrs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['usr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['usr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['usr']->value) {
$_smarty_tpl->tpl_vars['usr']->_loop = true;
$foreach_usr_Sav = $_smarty_tpl->tpl_vars['usr'];
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['usr']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['usr']->value['nombre'];?>
</option>
                                     <?php
$_smarty_tpl->tpl_vars['usr'] = $foreach_usr_Sav;
}
?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <textarea id="detalle" name="detalle" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pagado">Esta paga?</label>
                                <select id="pagado" name="pagado" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fPago">Fecha de pago (Si aplica)</label>
                                <input type="text" id="fPago" name="fPago" class="form-control" placeholder="Fecha de pago (Si aplica) (AAAA-MM-DD)">
                            </div>
                        </div>

                    </div>
                    <?php if (isset($_smarty_tpl->tpl_vars['arrDatosAuto']->value)) {?>
                    <input type="hidden" id="idAuto" name="idAuto" value="<?php echo $_smarty_tpl->tpl_vars['arrDatosAuto']->value['id'];?>
">
                    <?php }?>
                </form>
            </div>
            <div class="modal-footer">
                <input id="btnSendGastoG" type="button" class="btn btn-success" value="Agregar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }
}
?>