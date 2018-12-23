<?php /* Smarty version 3.1.27, created on 2018-12-23 15:13:34
         compiled from "C:\xampp\htdocs\subastas\styles\templates\verAutos\modalAddGastosOtros.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19779286785c1fd04ea73176_58905051%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af20f6dba9f37e26bf3483b46cc9630acfe6aa7a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\verAutos\\modalAddGastosOtros.tpl',
      1 => 1545588634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19779286785c1fd04ea73176_58905051',
  'variables' => 
  array (
    'arrUsrs' => 0,
    'usr' => 0,
    'arrDetallesAuto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c1fd04eaccf17_77283656',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c1fd04eaccf17_77283656')) {
function content_5c1fd04eaccf17_77283656 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19779286785c1fd04ea73176_58905051';
?>
<!-- Modal -->
<div id="modalAddGO" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Otros Gastos</h4>
            </div>
            <div class="modal-body">
                <form id="formAddGO">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="monto">Monto</label>
                                <input type="number" id="monto" name="monto" class="form-control" placeholder="Monto gasto">
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
                                <label for="fPago">Fecha de pago (si aplica)</label>
                                <input type="text" id="fPago" name="fPago" class="form-control" placeholder="Fecha de pago (Si aplica)">
                            </div>
                        </div>

                    </div>
                    <?php if (isset($_smarty_tpl->tpl_vars['arrDetallesAuto']->value)) {?>
                    <input type="hidden" id="idAuto" name="idAuto" value="<?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['id'];?>
">
                    <?php }?>
                </form>
            </div>
            <div class="modal-footer">
                <input id="btnSendGastoO" type="button" class="btn btn-success" value="Agregar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }
}
?>