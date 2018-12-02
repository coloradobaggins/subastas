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
