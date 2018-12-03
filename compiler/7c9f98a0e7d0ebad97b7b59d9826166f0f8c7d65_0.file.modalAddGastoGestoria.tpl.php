<?php /* Smarty version 3.1.27, created on 2018-12-02 23:31:27
         compiled from "C:\xampp\htdocs\subastas\styles\templates\comprados\modalAddGastoGestoria.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:78830605c04957f97b995_99298031%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c9f98a0e7d0ebad97b7b59d9826166f0f8c7d65' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\comprados\\modalAddGastoGestoria.tpl',
      1 => 1543804186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78830605c04957f97b995_99298031',
  'variables' => 
  array (
    'arrUsrs' => 0,
    'usr' => 0,
    'arrDatosAuto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c04957f98b396_23865107',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c04957f98b396_23865107')) {
function content_5c04957f98b396_23865107 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '78830605c04957f97b995_99298031';
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