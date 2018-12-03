<?php /* Smarty version 3.1.27, created on 2018-12-03 15:41:56
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/verAutos/modalComprar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9911421545c0578f4059886_41071855%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29d9f579fdccedf369d7f26ae498d05c53ba2acf' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/subastas/styles/templates/verAutos/modalComprar.tpl',
      1 => 1538971668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9911421545c0578f4059886_41071855',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c0578f4061144_51083834',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c0578f4061144_51083834')) {
function content_5c0578f4061144_51083834 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9911421545c0578f4059886_41071855';
?>
<!-- Modal -->
<div id="modalComprar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comprar auto</h4>
            </div>
            <div class="modal-body">
                <form id="formAddValorCalle">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="compradores">Seleccionar comprador</label>
                                <select id="compradores" class="form-control" name="compradores">
                                    <option value="0">Elegir</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <label for="fecha_compra">Confirmar fecha de compra</label>
                                <input id="fecha_compra" class="form-control" name="fecha_compra" placeholder="AAAA-MM-DD">
                            </div>

                            <div class="form-group">
                                <label for="monto">Valor pagado </label>
                                <input id="monto" class="form-control" name="monto" placeholder="Valor pagado (sin gastos gastos adicionales)">
                            </div>

                            <div>
                                <p>Los datos aproximados por subasta se conservaran. Luego podran editarse cuando esten los valores reales.</p>
                            </div>

                        </div>

                    </div>

                    <input type="hidden" id="idAuto" name="idAuto">

                </form>
            </div>
            <div class="modal-footer">
                <input id="btnBuyCar" type="button" class="btn btn-success" value="Agregar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }
}
?>