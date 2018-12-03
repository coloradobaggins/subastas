<?php /* Smarty version 3.1.27, created on 2018-12-03 15:41:56
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/verAutos/modalAddPuja.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19762696665c0578f403e8d2_09193039%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd029313066247f7e8cde0b4be4feb36ad8a69e0b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/verAutos/modalAddPuja.tpl',
      1 => 1537967938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19762696665c0578f403e8d2_09193039',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c0578f40460e7_32889569',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c0578f40460e7_32889569')) {
function content_5c0578f40460e7_32889569 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19762696665c0578f403e8d2_09193039';
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