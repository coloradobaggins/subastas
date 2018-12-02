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
        <h2>Listado Autos adquiridos <button class="btn btn-success">Agregar Auto</button></h2>
      </div>
    </div> <!-- /container -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>

            {if isset($arrayAutosComprados)}
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
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                  {foreach from=$arrayAutosComprados item=auto}
                  <tr>
                    <td>{$auto.marca}</td>
                    <td>{$auto.modelo}</td>
                    <td>{$auto.ano}</td>
                    <td>{$auto.dominio}</td>
                    <td>{$auto.kms}</td>
                    <td>{$auto.id_comustible}</td>
                    <td>{$auto.monto}</td>
                    <td>{$auto.nombreUsr}</td>
                    <td>{$auto.fecha_compra}</td>
                    <td><a href="?view=autoComprado&idComprado={$auto.id}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-plus"></span></a></td>
                  </tr>
                  {/foreach}
                </tbody>
              </table>
              {else}
              <p>Sin datos</p>
            {/if}

          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container -->




    {include 'overall/footer.tpl'}
    <script src="styles/js/verAutos.js"></script>

</body>
</html>
