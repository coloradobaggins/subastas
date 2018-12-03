<!DOCTYPE html>
<html lang="es">
<head>
    {include '../overall/header.tpl'}
    <link href="styles/css/estilosLogin.css" rel="stylesheet" >
</head>
<body>



    <div class="logo-container">
      <!--<img src="styles/images/general/logo_new.png" alt="">-->
      <h1>Subastas DE PRUEBA!</h1>
    </div>
    <div class="container form-container">
        <form class="form-signin">
            <h2 class="form-signin-heading">Iniciar sesión</h2>
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Email" required="required" autofocus>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Password" required="required">
            <button id="loginBtn" class="btn btn-lg btn-success btn-block" type="button">Ingresar</button>
            <div class="__AJAX__"></div>
        </form>
    </div> <!-- /container -->
  </div>

  <div class="little-footer">


    <div class="clear"></div>

    {include '../overall/footer.tpl'}
    <script src="styles/js/codeLogin.js"></script>
</body>
</html>
