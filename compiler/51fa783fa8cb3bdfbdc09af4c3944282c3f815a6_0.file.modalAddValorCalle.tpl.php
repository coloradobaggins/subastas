<?php /* Smarty version 3.1.27, created on 2018-12-02 09:36:26
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastaAdmin/styles/templates/verAutos/modalAddValorCalle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12203204135c03d1ca428565_96821354%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51fa783fa8cb3bdfbdc09af4c3944282c3f815a6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastaAdmin/styles/templates/verAutos/modalAddValorCalle.tpl',
      1 => 1538399464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12203204135c03d1ca428565_96821354',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c03d1ca42cac9_13920053',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c03d1ca42cac9_13920053')) {
function content_5c03d1ca42cac9_13920053 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12203204135c03d1ca428565_96821354';
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