<!DOCTYPE html>
<html lang="es">
<head>
    {include 'overall/header.tpl'}
    <link href="styles/css/estilosAutos.css" rel="stylesheet" >
</head>
<body>

  {include 'overall/nav.tpl'}

    <div class="logo-container">
      <h2>Detalle Auto Subasta <button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></h2>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">

        </div>
      </div>
    </div> <!-- /container -->

    <div class="container">
      {if isset($arrDetallesAuto)}
      <div class="row">
        <div class="col-md-4">
          <div class="alert alert-info">
            <ul>
              <li>Modelo: {$arrDetallesAuto.marca} {$arrDetallesAuto.modelo}</li>
              <li>Dom: {$arrDetallesAuto.dominio}</li>
              <li>Radcado: {$arrDetallesAuto.radicacion}</li>
            </ul>
          </div>
        </div><!-- /.col -->
        <div class="col-md-5">
          <div class="alert alert-success">
            {if isset($arrDetallesAuto)}
            <div class="row">
              <div class="col-md-6">
                <h4>Puja Actual: {if $arrDetallesAuto.comprado==0}<button id="{$arrDetallesAuto.id}" data-toggle="modal" data-target="#modalAddPuja" class="btn btn-success btn-xs addPuja pull-right" title="Actualizar"><span class="glyphicon glyphicon-check"></span></button>{/if}</h4>
                <p>$ {$arrDetallesAuto.valor_puja}</p>

              </div>
              <div class="col-md-6">
                <p>Fecha de Cierre</h4>
                <p>{$arrDetallesAuto.fecha_cierre} - {$arrDetallesAuto.hora_cierre}</p>
              </div>
            </div>
            {/if}
          </div>
        </div>

        <div class="col-md-3">
          <div class="alert alert-warning">
            <h4>Total a Pagar:</h4>
            <p>$ {$arrGastosTotales.totalAPagar}</p>
          </div>
        </div>
      </div><!-- /.row -->


      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-warning">
            <p>A&ntilde;o: {$arrDetallesAuto.ano} - Combustible: {$arrDetallesAuto.combustible} - Kms: {$arrDetallesAuto.kms} - Precio DNRPA: $ {$arrDetallesAuto.precio_lista}</p>
          </div>
        </div>
      </div>
      {/if}
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="list-group">
            <li class="list-group-item active">Otros datos:</li>
            <li class="list-group-item">Observaciones: {$arrDetallesAuto.observacion}</li>
            <li class="list-group-item">Observaciones Visitas: {$arrDetallesAuto.visita_observaciones}</li>
            <li class="list-group-item">Puntaje Visita {$arrDetallesAuto.visita_puntaje}</li>
            <li class="list-group-item">Url sitio {$arrDetallesAuto.url_narvaez}</li>
            <li class="list-group-item">Cargado por: {$arrDetallesAuto.usuario}</li>
          </ul>
        </div>

        <div class="col-md-6">

          <ul class="list-group">
            <li class="list-group-item active">Valores autos cargados <button id="{$arrDetallesAuto.id}" class="btn btn-xs btn-success pull-right showAddValoresModal" data-toggle="modal" data-target="#modalValorCalle"><span class="glyphicon glyphicon-plus"></span></button></li>
          {if isset($arrValores)}
            {foreach from=$arrValores item=valorAuto}
              <li class="list-group-item">{$valorAuto.url} <button id="{$valorAuto.id}" class="btn btn-xs btn-danger pull-right deleteValorCalle"><span class="glyphicon glyphicon-trash"></span></button><span class="badge">$ {$valorAuto.valor}</span></li>
            {/foreach}
              <li class="list-group-item list-group-item-success">Promedio <span class="badge">$ {$promVal}</span></li>

          {else}
            <li class="list-group-item list-group-item-warning">Sin cargar</li>
          </ul>

          {/if}
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        {if isset($arrDetallesAuto)}
        <div class="col-md-4">

              <ul class="list-group">
                <li class="list-group-item active">Gastos aprox <button id="{$arrDetallesAuto.id}" class="btn btn-xs btn-warning pull-right edit-gastos-aprox" data-target="#modalEditGastosAproxSub" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></button></li>
                <li class="list-group-item">Debe Patente: <span class="badge">$ <span class="txt-pat">{$arrDetallesAuto.deuda_patente}</span></span></li>
                <li class="list-group-item">Debe. CABA: <span class="badge">$ <span class="txt-caba">{$arrDetallesAuto.deuda_infr_caba}</span></span></li>
                <li class="list-group-item">Debe. BSAS: <span class="badge">$ <span class="txt-bsas">{$arrDetallesAuto.deuda_infr_bsas}</span></span></li>
                <li class="list-group-item list-group-item-warning">Comision: {$auto.comision}% <span class="badge">$ {$arrDetallesAuto.comision_valor}</span></li>

                <li class="list-group-item list-group-item-warning">Gastos adm + IVA: <span class="badge">{if isset($arrGastosAdm)} $ {$arrGastosAdm.monto + $arrGastosAdm.montoIva} {else} N/A{/if}</span></li>

                <li class="list-group-item">IVA Incluido en valor final: <span class="badge">{$arrDetallesAuto.iva_incluido}</span></li>
                <li class="list-group-item list-group-item-warning">Gastos Aprox Gestoria: <span class="badge">$ {$arrDetallesAuto.gastos_aprox_gestor}</span></li>
              </ul>

        </div><!-- /.col -->
        {/if}

        <div class="col-md-8">
          <ul class="list-group">
            <li class="list-group-item active">Otros gastos <button id="{$arrDetallesAuto.id}" class="btn btn-xs btn-warning pull-right addOtrosGastos" data-toggle="modal" data-target="#modalAddGO"><span class="glyphicon glyphicon-plus"></span></buttn></li>
            {if isset($arrayOtrosGastosSubastas)}
              {foreach from=$arrayOtrosGastosSubastas item=gastoO}
                <li class="list-group-item">{$gastoO.observacion} <span class="badge">{$gastoO.monto}</span></li>
              {/foreach}
            {/if}
          </ul>
        </div>
      </div><!-- /.row -->

    </div><!-- /.container -->


    <div class="container">
      <div class="row">


      </div><!-- /.row -->
    </div>
    {include 'verAutos/modalAddPuja.tpl'}
    {include 'verAutos/modalAddValorCalle.tpl'}
    {include 'verAutos/modalAddGastosOtros.tpl'}
    {include 'verAutos/modalEditGastosAproxSub.tpl'}


    {include 'overall/footer.tpl'}
    <script src="styles/js/verAutos.js"></script>
    <script src="styles/js/autoDetalle.js"></script>

</body>
</html>
