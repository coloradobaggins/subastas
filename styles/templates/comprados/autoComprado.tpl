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

    </div>
  </div>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Comprado - Detalle <button class="btn btn-xs btn-warning pull-right">Actualizar datos</button></h2>
        </div>
      </div>
    </div><!-- /.container -->

    <div class="container">
      <div class="row">
        {if isset($arrDatosAuto)}
          <div class="col-md-4">
            <ul>
              <li class="list-group-item">Marca: {$arrDatosAuto.marca}</li>
              <li class="list-group-item">Modelo: {$arrDatosAuto.modelo}</li>
              <li class="list-group-item">Dominio: {$arrDatosAuto.dominio}</li>
              <li class="list-group-item">Radicacion: {$arrDatosAuto.radicacion}</li>
            </ul>
          </div>

          <div class="col-md-4">
            <ul>
              <li class="list-group-item">A&Ntilde;O: {$arrDatosAuto.ano}</li>
              <li class="list-group-item">KMS: {$arrDatosAuto.kms}</li>
              <li class="list-group-item">Combustible: {$arrDatosAuto.combustible}</li>
            </ul>
          </div>

          <div class="col-md-4">
            <ul>
              <li class="list-group-item">Monto: $ {$arrDatosAuto.monto}</li>
              <li class="list-group-item">Comprador: {$arrDatosAuto.nombre}</li>
              <li class="list-group-item">Fecha Compra: {$arrDatosAuto.fecha_compra}</li>
            </ul>
          </div>
        {else}
          <div class="col-md-12">
            <div class="alert alert-warning">
              <p>Sin datos</p>
            </div>
          </div>
        {/if}

      </div><!-- /.row -->

      <div class="row">
        <div class="col-md-12">

          <ul class="list-group">
            <li class="list-group-item active">Valores autos cargados <button id="{$arrDetallesAuto.id}" class="btn btn-xs btn-success pull-right showAddValoresModal" data-toggle="modal" data-target="#modalValorCalle"><span class="glyphicon glyphicon-plus"></span></button></li>
          {if isset($arrValoresCalle)}
            {foreach from=$arrValoresCalle item=valorAuto}
              <li class="list-group-item">{$valorAuto.url} <button id="{$valorAuto.id}" class="btn btn-xs btn-danger pull-right deleteValorCalle"><span class="glyphicon glyphicon-trash"></span></button><span class="badge">$ {$valorAuto.valor}</span></li>
            {/foreach}
              <li class="list-group-item list-group-item-success">Promedio <span class="badge">$ {$promVal}</span></li>

          {else}
            <li class="list-group-item list-group-item-warning">Sin cargar</li>
          </ul>

          {/if}
        </div>
      </div>
    </div><!-- /.container -->



    <div class="container">

      <div class="row">
        <div class="col-md-6">
          <h4>Gastos</h4>
          <!-- Gastos gestoria -->
          <ul class="list-group">
            <li class="list-group-item active">Gastos Gestoria <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modalAddGgestoria"><span class="glyphicon glyphicon-plus"></span></button></li>
          {if isset($arrGastosGes)}
            {foreach from=$arrGastosGes item=g_gestoria}
              <li class="list-group-item"><button id="{$g_gestoria.id}" class="btn btn-xs btn-danger pull-right deleteGG"><span class="glyphicon glyphicon-trash"><span></button> {$g_gestoria.observacion}<span class="badge">$ {$g_gestoria.monto}</span> <span class="badge">{$g_gestoria.usrPago}</span></li>
            {/foreach}
            <li class="list-group-item list-group-item-warning">Total: <span class="badge">$ {$sumGastosG}</span></li>
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
              <li class="list-group-item"><button id="{$gastoInfr.id}" class="btn btn-xs btn-danger deleteGInfr"><span class="glyphicon glyphicon-trash"><span></button> {$gastoInfr.observacion}<span class="badge">$ {$gastoInfr.monto}</span> <span class="badge">{$gastoInfr.usrPago}</span></li>
            {/foreach}
            <li class="list-group-item list-group-item-warning">Total: <span class="badge">$ {$sumGastosInfr}</span></li>
          {else}
          <li class="list-group-item">Sin datos</li>
          {/if}

          </ul>

        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <!-- Otros Gastos -->
          <ul class="list-group">
            <li class="list-group-item active">Otros gastos <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modalAddGO"><span class="glyphicon glyphicon-plus"></span></button></li>
          {if isset($arrGastosOtros)}
            {foreach from=$arrGastosOtros item=gasto}
              <li class="list-group-item"><button id="{$gasto.id}" class="btn btn-xs btn-danger pull-right deleteGO"><span class="glyphicon glyphicon-trash"><span></button> {$gasto.observacion}<span class="badge">$ {$gasto.monto}</span> <span class="badge">{$gasto.usrPago}</span></li>
            {/foreach}
            <li class="list-group-item list-group-item-warning">Total: <span class="badge">$ {$sumGastosO}</span></li>
          {else}
          <li class="list-group-item">Sin datos</li>
          {/if}

          </ul>
        </div>
      </div>

    </div><!-- /.container -->

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4>Resumenes de gastos</h4>
          {if isset($arrGastosPorUsr)}
            {assign var="sumGastos" value="0"}
            {foreach from=$arrGastosPorUsr key=userGasto item=datosGastos}
              {$sumGastos = 0}
            <div>
              <ul>
              {foreach from=$datosGastos item=montoGasto}
                  {$sumGastos = $sumGastos+$montoGasto}
              {/foreach}
                  <li class="list-group-item">{$userGasto} <span class="badge">$ {$sumGastos}</span></li>
              </ul>
            </div>
            {/foreach}

          {else}
          <p>Sin datos</p>
          {/if}
        </div>
      </div>
    </div>

    {include 'comprados/modalAddInfr.tpl'}
    {include 'comprados/modalAddGastoGestoria.tpl'}
    {include 'comprados/modalAddGastosOtros.tpl'}
    {include 'verAutos/modalAddValorCalle.tpl'}


    {include 'overall/footer.tpl'}
    <script src="styles/js/verAutos.js"></script>
    <script src="styles/js/autoAdquirido/abmGastos.js"></script>

</body>
</html>
