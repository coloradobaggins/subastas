<?php /* Smarty version 3.1.27, created on 2018-12-02 23:31:16
         compiled from "C:\xampp\htdocs\subastas\styles\templates\verAutos\modalAddPuja.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6565376785c0495741e2da8_67435369%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4966e8d7b8da2ef8211c8c0c1bd94ec1257dae5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\verAutos\\modalAddPuja.tpl',
      1 => 1543804186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6565376785c0495741e2da8_67435369',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c0495741e6c27_19999233',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c0495741e6c27_19999233')) {
function content_5c0495741e6c27_19999233 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6565376785c0495741e2da8_67435369';
?>
<!-- Modal -->
<div id="modalAddPuja" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Actualizar Puja</h4>
            </div>
            <div class="modal-body">
                <form id="formUpdatePuja">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="puja">Puja</label>
                                <input type="number" id="puja" name="puja" class="form-control" placeholder="Nueva Puja">
                            </div>
                        </div>

                    </div>

                    <input type="hidden" id="idAutoNuevaPuja" name="idAutoNuevaPuja">

                </form>
            </div>
            <div class="modal-footer">
                <input id="btnSendPuja" type="button" class="btn btn-success" value="Actualizar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }
}
?>