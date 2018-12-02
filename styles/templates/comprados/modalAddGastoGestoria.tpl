<!-- Modal -->
<div id="modalAddGgestoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Gasto Gestoria</h4>
            </div>
            <div class="modal-body">
                <form id="formAddGG">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="monto">Monto</label>
                                <input type="number" id="monto" name="monto" class="form-control" placeholder="Monto Gestor">
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
                                <label for="detalle">Detalle</label>
                                <textarea id="detalle" name="detalle" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pagado">Esta paga?</label>
                                <select id="pagado" name="pagado" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fPago">Fecha de pago (Si aplica)</label>
                                <input type="text" id="fPago" name="fPago" class="form-control" placeholder="Fecha de pago (Si aplica) (AAAA-MM-DD)">
                            </div>
                        </div>

                    </div>
                    {if isset($arrDatosAuto)}
                    <input type="hidden" id="idAuto" name="idAuto" value="{$arrDatosAuto.id}">
                    {/if}
                </form>
            </div>
            <div class="modal-footer">
                <input id="btnSendGastoG" type="button" class="btn btn-success" value="Agregar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
