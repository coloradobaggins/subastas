<?php /* Smarty version 3.1.27, created on 2018-12-02 23:31:16
         compiled from "C:\xampp\htdocs\subastas\styles\templates\verAutos\modalAddValorCalle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7158062815c0495742021a9_65078982%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e81874f48bacf8c674b7a34049dcba7f10a1da2f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\verAutos\\modalAddValorCalle.tpl',
      1 => 1543804186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7158062815c0495742021a9_65078982',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c049574206025_93604093',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c049574206025_93604093')) {
function content_5c049574206025_93604093 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7158062815c0495742021a9_65078982';
?>
<!-- Modal -->
<div id="modalValorCalle" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Valor auto</h4>
            </div>
            <div class="modal-body">
                <form id="formAddValorCalle">
                    <p>Seleccionar auto al que corresponden los valores en calle</p>
                    <p>Los valores agregados sirven para calcular el promedio del valor en calle y poder saber una ganancia estimada en la subasta</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="valorCalle">Valor calle</label>
                                <input type="number" id="valorCalle" name="valorCalle" class="form-control" placeholder="Valor">
                            </div>
                            <div class="form-group">
                                <label for="urlValorCalle">URL</label>
                                <input type="text" id="urlValorCalle" name="urlValorCalle" class="form-control" placeholder="URL de donde viste el valor (mercadolibre etc)">
                            </div>
                        </div>

                    </div>

                    <input type="hidden" id="idAuto" name="idAuto">

                </form>
            </div>
            <div class="modal-footer">
                <input id="btnSendValorAuto" type="button" class="btn btn-success" value="Agregar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }
}
?>