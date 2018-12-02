<!-- Modal -->
<div id="modalAddInfr" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Infraccion</h4>
            </div>
            <div class="modal-body">
                <form id="formAddInfr">
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <label for="monto">Monto</label>
                                <input type="number" id="monto" name="monto" class="form-control" placeholder="Monto Infraccion">
                            </div>
                            <div class="form-group">
                                <label for="userPago">Quien pago</label>
                                <select id="userPago" name="userPago" class="form-control">
                                    {if isset($arrUsrs)}
                                     {foreach from=$arrUsrs item=usr}
                                        <option value="{$usr.id}">{$usr.nombre}</option>
                                     {/foreach}
                                    {/if}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fInfr">Fecha de infraccion</label>
                                <input type="text" id="fInfr" name="fInfr" class="form-control" placeholder="Fecha de Infraccion (AAAA-MM-DD)">
                            </div>
                            <div class="form-group">
                                <label for="lugar">Lugar</label>
                                <input type="text" id="lugar" name="lugar" class="form-control" placeholder="Lugar de la infraccion">
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <textarea id="detalle" name="detalle" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="lugarInfr">Esta paga?</label>
                                <select id="pagado" name="pagado" class="form-control">
                                    <option vaule="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fPago">Fecha de pago (Si aplica)</label>
                                <input type="text" id="fPago" name="fPago" class="form-control" placeholder="Fecha de pago (Si aplica)">
                            </div>
                        </div>

                    </div>
                    {if isset($arrDatosAuto)}
                    <input type="hidden" id="idAuto" name="idAuto" value="{$arrDatosAuto.id}">
                    {/if}
                </form>
            </div>
            <div class="modal-footer">
                <input id="btnSendGastoInfr" type="button" class="btn btn-success" value="Agregar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
