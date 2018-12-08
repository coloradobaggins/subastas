<!-- Modal -->
<div id="modalAddAutoSubasta" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar auto</h4>
            </div>
            <div class="modal-body">
                <form id="formAddAuto">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="marca">Marca</label>
                                    <input type="text" id="marca" name="marca" class="form-control" placeholder="Marca">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="modelo">Modelo</label>
                                    <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="ano">A&ntilde;o</label>
                                    <input type="number" id="ano" name="ano" class="form-control" placeholder="A&ntilde;o">
                                </div>
                              </div>
                            </div><!-- /.row-->

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="dom">Dominio</label>
                                    <input type="text" id="dom" name="dom" class="form-control" placeholder="Dominio">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="kms">KMS</label>
                                    <input type="text" id="kms" name="kms" class="form-control" placeholder="KMS">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="rad">Radicacion</label>
                                    <input type="text" id="rad" name="rad" class="form-control" placeholder="Radicacion">
                                </div>
                              </div>
                            </div><!-- /.row -->

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="ubi">Ubicacion</label>
                                    <input type="text" id="ubi" name="ubi" class="form-control" placeholder="Ubicacion">
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="caucion">Seguro caucion</label>
                                    <input type="text" id="caucion" name="caucion" class="form-control" placeholder="Seguro caucion">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="sr-only" for="vendedor">Vendedor</label>
                                  <select id="vendedor" name="vendedor" class="form-control">
                                    <option value="0">Vendedor</option>
                                    <option value="1">Narvaez</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="sr-only" for="caucion_paga">Caucion Paga?</label>
                                  <select id="caucion_paga" name="caucion_paga" class="form-control">
                                    <option value="">Caucion paga?</option>
                                    <option value="0">NO</option>
                                    <option value="1">SI</option>
                                  </select>
                                </div>
                              </div>

                            </div><!-- /.row -->

                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="" for="comb">Combustible</label>
                                  <select id="comb" name="comb" class="form-control">
                                    <option value="0">Seleccionar</option>
                                    <option value="1">Nafta</option>
                                    <option value="2">Nafta/GNC</option>
                                    <option value="3">Diesel</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="" for="arranca">Arranca</label>
                                  <select id="arranca" name="arranca" class="form-control">
                                    <option value="0">Si</option>
                                    <option value="1">No</option>
                                  </select>
                                </div>
                              </div>
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

                            <div class="form-group">
                              <label for="obs">Observaciones</label>
                              <textarea id="obs" name="obs" class="form-control" cols="50" rows="5"></textarea>
                            </div>

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
                            </div>


                            <div class="form-group">
                              <label for="obs_vis">Observaciones Visita</label>
                              <textarea id="obs_vis" name="obs_vis" class="form-control" cols="50" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="vis_pun">Visita Puntaje</label>
                                <input type="number" id="vis_pun" name="vis_pun" class="form-control" placeholder="Visita Puntaje">
                            </div>


                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="valor_puja">Valor Puja</label>
                                    <input type="number" id="valor_puja" name="valor_puja" class="form-control" placeholder="Valor Puja">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="precio_lista">Precio Lista</label>
                                    <input type="number" id="precio_lista" name="precio_lista" class="form-control" placeholder="Precio Lista">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="g_aprox_ges">Gastos aprox Gestor</label>
                                    <input type="number" id="g_aprox_ges" name="g_aprox_ges" class="form-control" placeholder="Gastos aprox Gestor">
                                </div>
                              </div>
                            </div><!--/.row-->

                            <div class="form-group">
                                <label class="sr-only" for="url_sitio">URL sitio</label>
                                <input type="text" id="url_sitio" name="url_sitio" class="form-control" placeholder="URL sitio">
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="f_cierre">Fecha cierre</label>
                                    <input type="text" id="f_cierre" name="f_cierre" class="form-control" placeholder="Fecha cierre">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="h_cierre">Hora cierre</label>
                                    <input type="text" id="h_cierre" name="h_cierre" class="form-control" placeholder="Hora cierre">
                                </div>
                              </div>
                            </div>
                        </div>

                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <input id="btnAddAutoSubasta" type="button" class="btn btn-success" value="Enviar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
