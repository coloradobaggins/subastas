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
