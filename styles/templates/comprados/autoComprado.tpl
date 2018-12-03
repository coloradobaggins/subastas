 <!DOCTYPE html>
<html lang="es">
<head>
    {include 'overall/header.tpl'}
    <link href="styles/css/estilosAutos.css" rel="stylesheet" >
</head>
<body>

  {include 'overall/nav.tpl'}

  <div class="container">
    <div class="row">

      <h2>Comprado - Detalle</h2>
    </div>
  </div>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {if isset($arrDatosAuto)}

          <table class="table">

              <thead>
                  <tr>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>A&ntilde;o</th>
                      <th>DOM</th>
                      <th>KMS</th>
                      <th>Comustible</th>
                      <th>Monto</th>
                      <th>Comprador</th>
                      <th>Fecha Compra</th>

                  </tr>
              </thead>
              <tbody>

                <tr>
                  <td>{$arrDatosAuto.marca}</td>
                  <td>{$arrDatosAuto.modelo}</td>
                  <td>{$arrDatosAuto.ano}</td>
                  <td>{$arrDatosAuto.dominio}</td>
                  <td>{$arrDatosAuto.kms}</td>
                  <td>{$arrDatosAuto.combustible}</td>
                  <td>{$arrDatosAuto.monto}</td>
                  <td>{$arrDatosAuto.nombre}</td>
                  <td>{$arrDatosAuto.fecha_compra}</td>
                </tr>

              </tbody>
            </table>


          {else}
            <p>Sin datos</p>
          {/if}
        </div>
      </div>
    </div><!-- /.container -->

    <div>
      <ul>
        <li>Radicacion: {$arrDatosAuto.radicacion}</li>
      </ul>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>Gastos</h4>
          <!-- Gastos gestoria -->
          <ul class="list-group">
            <li class="list-group-item active">Gastos Gestoria <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modalAddGgestoria"><span class="glyphicon glyphicon-plus"></span></button></li>
          {if isset($arrGastosGes)}
            {foreach from=$arrGastosGes item=g_gestoria}
              <li class="list-group-item">{$g_gestoria.observacion}<span class="badge">$ {$g_gestoria.monto}</span> <span class="badge">{$g_gestoria.usrPago}</span><button id="{$g_gestoria.id}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"><span></button></li>
            {/foreach}
          {else}
          <li class="list-group-item">Sin datos</li>
          {/if}
        </ul>


        <!-- Otros Gastos -->
        <ul class="list-group">
          <li class="list-group-item active">Otros gastos <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modalAddGO"><span class="glyphicon glyphicon-plus"></span></button></li>
        {if isset($arrGastosOtros)}
          {foreach from=$arrGastosOtros item=gasto}
            <li class="list-group-item">{$gasto.observacion}<span class="badge">$ {$gasto.monto}</span> <span class="badge">{$gasto.usrPago}</span> <button id="{$gasto.id}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"><span></button></li>
          {/foreach}
        {else}
        <li class="list-group-item">Sin datos</li>
        {/if}

        </ul>

      </div>

        <div class="col-md-6">
          <h4>Deudas</h4>
          <ul class="list-group">
            <li class="list-group-item active">GAstos Infracciones <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modalAddInfr"><span class="glyphicon glyphicon-plus"></span></button></li>
          {if isset($arrGastosInfr)}
            {foreach from=$arrGastosInfr item=gastoInfr}
              <li class="list-group-item">{$gastoInfr.observacion}<span class="badge">$ {$gastoInfr.monto}</span> <span class="badge">{$gastoInfr.usrPago}</span><button id="{$gastoInfr.id}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"><span></button></li>
            {/foreach}
          {else}
          <li class="list-group-item">Sin datos</li>
          {/if}

          </ul>

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container -->

    {include 'comprados/modalAddInfr.tpl'}
    {include 'comprados/modalAddGastoGestoria.tpl'}
    {include 'comprados/modalAddGastosOtros.tpl'}


    {include 'overall/footer.tpl'}
    <script src="styles/js/verAutos.js"></script>
    <script src="styles/js/autoAdquirido/abmGastos.js"></script>

</body>
</html>
