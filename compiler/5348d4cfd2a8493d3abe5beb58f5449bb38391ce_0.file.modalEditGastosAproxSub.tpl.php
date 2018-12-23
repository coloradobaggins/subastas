<?php /* Smarty version 3.1.27, created on 2018-12-23 12:06:40
         compiled from "C:\xampp\htdocs\subastas\styles\templates\verAutos\modalEditGastosAproxSub.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1379218015c1fa480bef632_16718838%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5348d4cfd2a8493d3abe5beb58f5449bb38391ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\subastas\\styles\\templates\\verAutos\\modalEditGastosAproxSub.tpl',
      1 => 1545547532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1379218015c1fa480bef632_16718838',
  'variables' => 
  array (
    'arrDetallesAuto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c1fa480ce1967_10986228',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c1fa480ce1967_10986228')) {
function content_5c1fa480ce1967_10986228 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1379218015c1fa480bef632_16718838';
?>
<!-- Modal -->
<div id="modalEditGastosAproxSub" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar gastos aprox subasta</h4>
            </div>
            <div class="modal-body">
              <form id="formEditGastosAproxSub">

                  <div class="row">
                      <div class="col-md-12">

                          <div class="row">

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="" for="ivaI">Iva Incluido</label>
                                <select id="ivaI" name="ivaI" class="form-control">
                                  <option value="0">Si</option>
                                  <option value="1">No</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <p class="label label-warning">Comision 10%</p>
                            </div>
                          </div><!-- /.row -->

                          <h4>Deudas</h4>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="sr-only" for="d_pat">Patente</label>
                                  <input type="number" id="d_pat" name="d_pat" class="form-control" placeholder="Patente">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="sr-only" for="d_inf_caba">Infraccion CABA</label>
                                  <input type="number" id="d_inf_caba" name="d_inf_caba" class="form-control" placeholder="Infracciones CABA">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label class="sr-only" for="d_inf_bsas">Infraccion BSAS</label>
                                  <input type="number" id="d_inf_bsas" name="d_inf_bsas" class="form-control" placeholder="Infracciones BSAS">
                              </div>
                            </div>
                          </div><!-- /.row -->

                      </div><!-- /-col -->
                    </div><!-- /.row -->
                    <input id="idAuto" name="idAuto" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['arrDetallesAuto']->value['id'];?>
">
                    </form>
            </div>
            <div class="modal-footer">
                <input id="btnBuyCar" type="button" class="btn btn-success" value="Editar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php }
}
?>