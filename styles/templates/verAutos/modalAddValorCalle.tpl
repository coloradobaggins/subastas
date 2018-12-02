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
