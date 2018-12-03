<?php /* Smarty version 3.1.27, created on 2018-12-02 23:31:16
         compiled from "C:\xampp\htdocs\subastas\styles\templates\verAutos\modalComprar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5051430765c0495742198a6_77354491%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4fe4bb3e26ff9647d23558f3d6a6c85f61e513c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\verAutos\\modalComprar.tpl',
      1 => 1543804186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5051430765c0495742198a6_77354491',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c04957421d727_46451675',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c04957421d727_46451675')) {
function content_5c04957421d727_46451675 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5051430765c0495742198a6_77354491';
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