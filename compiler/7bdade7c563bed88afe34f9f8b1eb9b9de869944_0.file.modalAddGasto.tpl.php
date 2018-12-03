<?php /* Smarty version 3.1.27, created on 2018-12-02 23:31:08
         compiled from "C:\xampp\htdocs\subastas\styles\templates\gastosGenerales\modalAddGasto.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2398522655c04956caedc69_65987760%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bdade7c563bed88afe34f9f8b1eb9b9de869944' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\gastosGenerales\\modalAddGasto.tpl',
      1 => 1543804186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2398522655c04956caedc69_65987760',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c04956caf1ae1_99988679',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c04956caf1ae1_99988679')) {
function content_5c04956caf1ae1_99988679 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2398522655c04956caedc69_65987760';
?>
<!-- Modal -->
<div id="modalAddGasto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Gasto</h4>
            </div>
            <div class="modal-body">
                <form id="formAddGasto">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <textarea type="text" id="detalle" name="detalle" class="form-control" placeholder="Detalle Gasto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="monto">Monto</label>
                                <input type="number" id="monto" name="monto" class="form-control" placeholder="Monto Gasto">
                            </div>
                            <div class="form-group">
                                <label for="fechaC">Fecha Compra</label>
                                <input type="text" id="fechaC" name="fechaC" class="form-control" placeholder="AAAA-MM-DD">
                            </div>
                            <div class="form-group">
                                <label for="compradores">Seleccionar comprador</label>
                                <select id="compradores" class="form-control" name="compradores">
                                    <option value="0">Elegir</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!--<input type="hidden" id="idAutoNuevaPuja" name="idAutoNuevaPuja">-->

                </form>
            </div>
            <div class="modal-footer">
                <input id="btnSendGasto" type="button" class="btn btn-success" value="Enviar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }
}
?>