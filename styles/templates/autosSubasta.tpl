<!DOCTYPE html>
<html lang="es">
<head>
    {include 'overall/header.tpl'}
    <link href="styles/css/estilosAutos.css" rel="stylesheet" >
</head>
<body>

  {include 'overall/nav.tpl'}

    <div class="logo-container">
      <!--<img src="styles/images/general/logo_new.png" alt="">-->
      <h1>Autos</h1>
      <h2>Cargados a subastar proximamente <button class="btn btn-success" data-target="#modalAddAutoSubasta" data-toggle="modal" title="Agregar auto"><span class="glyphicon glyphicon-plus"></span></button></h2>
    </div>
    <div class="container form-container">

    </div> <!-- /container -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <table class="table">

                <thead>
                    <tr>
                        <th></th>
                        <th>Vehiculo</th>
                        <th>DOM</th>
                        <th>Rad.</th>
                        <th>Total a invertir <span class="glyphicon glyphicon-question-sign" title="PUJA + GASTOS + DEUDAS + GESTORIA"></span></th>
                        <th>Caucion</th>
                        <th>Posible Ganancia</th>
                        <th>Puja</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                {if isset($arrayAutos)}
                  {foreach from=$arrayAutos item=auto}
                      <tr data-toggle="collapse" data-target="#auto{$auto.id}" class="accordion-toggle">
                          <td><a data-toggle="collapse" href="#detailsRow_120" aria-expanded="false" aria-controls="detailsRow_120"><i class="fa fa-plus-circle"></i></a></td>
                          <td>{$auto.marca} {$auto.modelo}</td>
                          <td>{$auto.dominio}</td>
                          <td>{$auto.radicacion}</td>
                          <!--<td class="danger">$ {$auto.deudaTotal}</td>-->
                          <!--<td>$ {$auto.totalAPagar}</td>-->
                          <!--<td>$ {$auto.totalAPagarMasDeuda}</td>-->
                          <td>$ {$auto.totalAPagar}</td>
                          <td>
                            {$auto.caucion}
                          </td>
                          <td class="info">
                            $ {$auto["promedioValores"] - ($auto.totalAPagarMasDeuda+$auto.gastos_aprox_gestor)}
                          </td>
                          <td class="success">
                              <b>$ {$auto.valor_puja}</b>
                          </td>
                          <td>
                            {if $auto.comprado==0}
                              <button id="{$auto.id}" data-toggle="modal" data-target="#modalAddPuja" class="btn btn-info btn-xs addPuja" title="Actualizar"><span class="glyphicon glyphicon-check"></span></button>
                            {else}
                              <span class="label label-success">Comprado</span>
                            {/if}
                          </td>
                      </tr>

                      <tr>
                          <td colspan="12" class="hiddenRow">
                            <div class="accordian-body collapse" id="auto{$auto.id}">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <p>La posible ganancia es calculada segun los precios de autos cargados para este vehiculo.<br />
                                      Para verlos entrar en los detalles.</p>

                                    </div><!-- /.col-->
                                  </div><!-- /.row-->

                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="bs-callout bs-callout-danger">
                                        <ul>
                                          <li>A&ntilde;o: {$auto.ano}</li>
                                          <li>Combustible: {$auto.combustible}</li>
                                          <li>Kms: {$auto.kms}</li>
                                        </ul>
                                      </div>
                                    </div>
                                    <div class="col-md-4">

                                      <div class="bs-callout bs-callout-warning">
                                        <p>Total + deuda + gestoria + otros Gastos</p>
                                         <h4><b>$ {$auto.totalAPagarMasDeuda + $auto.gastos_aprox_gestor}</b></h4>
                                      </div>
                                    </div><!-- /.col -->
                                    <div class="col-md-4">
                                      <div class="bs-callout bs-callout-info">
                                        <p>Fecha de cierre:</p>
                                        <h4><b>{$auto.fecha_cierre} {$auto.hora_cierre}</b></h4>
                                      </div>
                                    </div>


                                  </div><!-- /.row -->

                                  <div class="row">
                                    <div class="col-md-12">

                                      <div class="row">
                                        <div class="col-md-6">
                                          <ul>
                                            <li>Arranca: {if $auto.arranca == 1}Si{else}No{/if}</li>
                                            <li>Precio Lista (DNRPA): <b>$ {$auto.precio_lista}</b></li>
                                            <li>Observaciones: {$auto.observacion}</li>
                                            <li>Observaciones Visitas: {$auto.visita_observaciones}</li>
                                            <li>Puntaje Visita</li>
                                            <li>Url sitio</li>
                                            <li>Cargado por: {$auto.usuario}</li>
                                          </ul>
                                        </div>
                                        <div class="col-md-6">
                                          <h4>Caucion</h4>
                                          <p>$ {$auto.caucion}
                                            {if $auto.caucion_paga == 1}
                                              <span class="label label-success"> PAGA </span>
                                            {else}
                                              <span class="label label-danger"> IMPAGA </span>
                                            {/if}
                                          </p>



                                        </div>
                                      </div><!-- /.row -->


                                    </div>

                                  </div><!-- /.row -->

                                  <div class="row">
                                    <div class="col-md-12">
                                       <div class="alert alert-info">

                                        <div class="row">
                                          <div class="col-md-6">
                                            <p>Acciones</p>
                                            {if $auto.comprado==1}
                                              <a class="btn btn-success" href="?view=autoComprado&idComprado={$auto.idAutoComprado}">COMPRADO! (Ver)</a>
                                            {else}

                                              <button id="{$auto.id}" class="btn btn-default comprar" data-toggle="modal" data-target="#modalComprar"><span class="glyphicon glyphicon-usd"></span> COMPRAR</button>
                                              <a class="btn btn-info" href="?view=autoDetalle&idAuto={$auto.id}">Ver detalles</a>
                                            {/if}

                                            <button id="{$auto.id}" class="btn btn-danger disableAuto"> Desactivar</button>

                                          </div>

                                          <div class="col-md-2">
                                            <h4>Promedio valores cargados</h4>
                                            {if isset($auto["promedioValores"])}
                                              $ {$auto["promedioValores"]}
                                            {else}
                                            Sin cargar
                                            {/if}
                                          </div>

                                          <div class="col-md-4">
                                            <p>Calcular otras Ganancias</p>

                                            <p>Costo Total: <b>$ <span class="valorTotalAuto">{$auto.totalAPagarMasDeuda + $auto.gastos_aprox_gestor}</span></b></p>
                                            Venta a: <input type="number" id="" class="montoProvisorio" name="" placeholder="Monto">
                                            <button class="btn btn-info btn-xs cacularValorProvisorio"><span class="glyphicon glyphicon-check"></span></button>
                                            <p>Ganancia: <b>$ <span class="gananciaProv"></span></b></p>
                                          </div>
                                        </div>


                                      </div><!-- /.alert -->
                                    </div>
                                  </div>

                                </div><!--/.container-->




                            </div>
                          </td>
                      </tr>
                  {/foreach}
                  </tbody>
                {else}
                      <tr>
                        <td>Sin datos</td>
                      </tr>
                {/if}
                </tbody>
            </table>

          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container -->

    {include 'verAutos/modalAddPuja.tpl'}
    {include 'verAutos/modalComprar.tpl'}
    {include 'verAutos/modalAddAutoSubasta.tpl'}


    {include 'overall/footer.tpl'}
    <script src="styles/js/verAutos.js"></script>

</body>
</html>
