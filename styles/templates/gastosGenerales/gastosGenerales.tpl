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
        <h3>Gastos Generales <button id="gastobtn" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalAddGasto"><span class="glyphicon glyphicon-plus"></span></button></h3>
        <p>Herramientas, mantenimiento, etc</p>
      </div>
    </div> <!-- /container -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <table class="table">

                <thead>
                    <tr>
                        <th>Detalle</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Quien</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                  {if isset($arrayGastos)}
                    {foreach from=$arrayGastos item="gasto"}
                      <tr>
                        <td>{$gasto.observacion}</td>
                        <td>$ {$gasto.monto}</td>
                        <td>{$gasto.fechaCompra}</td>
                        <td>{$gasto.usuarioCompra}</td>
                        <td><button id="{$gasto.id}" class="btn btn-danger btn-xs deleteGasto"><span class="glyphicon glyphicon-trash"></span></button></td>
                      </tr>
                    {/foreach}

                  {/if}
                </tbody>
            </table>

          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Resumen</h4>
          {if isset($arrayGastosUsr)}
          <ul>
          {foreach from=$arrayGastosUsr item=gastos}
            <li>{$gastos.usr}: $ {$gastos.sumaGastos}</li>
          {/foreach}
          </ul>
          {/if}
        </div>
      </div>
    </div>

    {include 'gastosGenerales/modalAddGasto.tpl'}



    {include 'overall/footer.tpl'}
    <script src="styles/js/Main.js"></script>
    <script src="styles/js/gastosGenerales/gastosGenerales.js"></script>

</body>
</html>
