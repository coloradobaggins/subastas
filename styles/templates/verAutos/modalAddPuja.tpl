<!-- Modal -->
<div id="modalAddPuja" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Actualizar Puja</h4>
            </div>
            <div class="modal-body">
                <form id="formUpdatePuja">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="puja">Puja</label>
                                <input type="number" id="puja" name="puja" class="form-control" placeholder="Nueva Puja">
                            </div>
                        </div>

                    </div>

                    <input type="hidden" id="idAutoNuevaPuja" name="idAutoNuevaPuja">

                </form>
            </div>
            <div class="modal-footer">
                <input id="btnSendPuja" type="button" class="btn btn-success" value="Actualizar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
