<?php /* Smarty version 3.1.27, created on 2018-12-03 15:41:56
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/verAutos/modalAddValorCalle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1202624495c0578f404bb97_00981242%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0be6aa388d0bc878808c0338ca169ce8cc9471a3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/verAutos/modalAddValorCalle.tpl',
      1 => 1538399464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1202624495c0578f404bb97_00981242',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c0578f4054cd2_92567459',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c0578f4054cd2_92567459')) {
function content_5c0578f4054cd2_92567459 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1202624495c0578f404bb97_00981242';
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