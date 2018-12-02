<!DOCTYPE html>
<html lang="es">
<head>
    {include 'overall/header.tpl'}
</head>
<body class="body-forgot-bg">
    {include 'overall/nav.tpl'}
    <main>
        <section>
            <article>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
                            <div class="form-forgot-container">
                                <form id="forgotForm">
                                    <h2 class="text-center">Recuperar Contrase&ntilde;a</h2>
                                    <hr>
                                    <div class="alert alert-info" role="alert">
                                        <p>Por favor ingrese su email. Enviaremos un link para que pueda crear su nueva contrase&ntilde;a.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="loginUser" class="sr-only">Email</label>
                                        <input type="email" id="forgotMail" class="form-control" placeholder="Email" required autofocus>
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary btn-block" id="forgotSendBtn" name="forgotSendBtn" type="button">Generar contrase&ntilde;a</button>
                                    <div id="__AJAX__"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
    {include 'overall/footer.tpl'}
    <script src="styles/js/codeForgot.js"></script>
</body>
</html>