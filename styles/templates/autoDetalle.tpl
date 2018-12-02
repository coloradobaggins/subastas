<!DOCTYPE html>
<html lang="es">
<head>
    {include 'overall/header.tpl'}
    <link href="styles/css/estilosAutos.css" rel="stylesheet" >
</head>
<body>

  {include 'overall/nav.tpl'}

    <div class="logo-container">
      <h2>Detalle Auto Subasta</h2>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success">
            {if isset($arrDetallesAuto)}
            <div class="row">
              <div class="col-md-6">
                
                    {if $arrDetallesAuto.comprado==0}
                      <button id="{$arrDetallesAuto.id}" data-toggle="modal" data-target="#modalAddPuja" class="btn btn-success btn-xs addPuja" title="Actualizar"><span class="glyphicon glyphicon-check"></span></button>
                    {/if}
                <h4>Puja Actual:</h4>
                <p>$ {$arrDetallesAuto.valor_puja}</p>
                
              </div>
              <div class="col-md-6">
                <h4>Fecha de Cierre</h4>
                <p>{$arrDetallesAuto.fecha_cierre} - {{$arrDetallesAuto.hora_cierre}}</p>
              </div>
            </div>
            {/if}
          </div>
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
        </div><!-- /.row -->
      </div><!-- /.container -->

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
        {if isset($arrDetallesAuto)}
        <div class="col-md-4">

              <ul class="list-group">
                <li class="list-group-item active">Gastos aprox</li>
                <li class="list-group-item">Debe Patente: <span class="badge">$ {$arrDetallesAuto.deuda_patente}</span></li>
                <li class="list-group-item">Debe. CABA: <span class="badge">$ {$arrDetallesAuto.deuda_infr_caba}</span></li>
                <li class="list-group-item">Debe. BSAS: <span class="badge">$ {$arrDetallesAuto.deuda_infr_bsas}</span></li>
                <li class="list-group-item list-group-item-warning">Comision: {$auto.comision}% <span class="badge">$ {$arrDetallesAuto.comision_valor}</span></li>

                <li class="list-group-item">IVA Incluido en valor final: <span class="badge">{$arrDetallesAuto.iva_incluido}</span></li>
                <li class="list-group-item list-group-item-danger">Gastos Aprox Gestoria: <span class="badge">$ {$arrDetallesAuto.gastos_aprox_gestor}</span></li>
              </ul>

        </div><!-- /.col -->
        <div class="col-md-6">
          <ul>
            <li class="list-group-item active">Otros datos:</li>
            <li class="list-group-item">Observaciones: {$arrDetallesAuto.observacion}</li>
            <li class="list-group-item">Observaciones Visitas: {$arrDetallesAuto.visita_observaciones}</li>
            <li class="list-group-item">Puntaje Visita {$arrDetallesAuto.visita_puntaje}</li>
            <li class="list-group-item">Url sitio {$arrDetallesAuto.url_narvaez}</li>
            <li class="list-group-item">Cargado por: {$arrDetallesAuto.usuario}</li>
          </ul>
        </div>
        {/if}
      </div><!-- /.row -->
    </div><!-- /.container -->


    <div class="container">
      <div class="row">

        <div class="col-md-6">
          {if isset($arrValores)}

            <ul class="list-group">
              <li class="list-group-item active">Valores autos cargados</li>
            {foreach from=$arrValores item=valorAuto}
              <li class="list-group-item">$ {$valorAuto.valor}</li>
            {/foreach}
              <li class="list-group-item list-group-item-success">Promedio $ {$promVal}</li>
            </ul>
          {else}
          <p>No hay valores de autos cargados para este auto.</p>
          {/if}
        </div>

        <div class="col-md-6">
        </div>

      </div><!-- /.row -->
    </div>


    {include 'overall/footer.tpl'}
    <script src="styles/js/verAutos.js"></script>

</body>
</html>
