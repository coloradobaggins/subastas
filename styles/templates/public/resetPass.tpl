<!DOCTYPE html>
<html lang="es">
<head>
    {include 'overall/header.tpl'}
</head>
<body class="body-reset-bg">
{include 'overall/nav.tpl'}
<main>
    <section>
        <article>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
                        <div class="form-forgot-container">
                            {if isset($user)}
                            <form id="forgotForm">
                                <h2 class="text-center">Hola!!</h2>
                                <hr>
                                <div class="alert alert-info" role="alert">
                                    <p><b>{$user}</b> est&aacute;s ac&aacute; para restablecer tu contrase&ntilde;a olvidada.</p>
                                </div>
                                <div class="form-group">
                                    <label for="resetPass" class="sr-only">Contrase&ntilde;a</label>
                                    <input type="password" id="resetPass" class="form-control" placeholder="Contrase&ntilde;a" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="resetPass" class="sr-only">Confirmar contrase&ntilde;a</label>
                                    <input type="password" id="resetPassConfirm" class="form-control" placeholder="Confirmar contrase&ntilde;a" required autofocus>
                                </div>
                                <hr>
                                <button class="btn btn-primary btn-block" id="resetSendBtn" name="resetSendBtn" type="button">Restablecer</button>
                                <div id="__AJAX__"></div>
                            </form>
                            {else}
                                <div class="alert alert-warning" role="alert">
                                    <h3>Ah ocurrido un error</h3>
                                    <p>Puede que su usuario est&eacute; desactivado</p>
                                    <p>Comuniquese con el administrador</p>
                                </div>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</main>
{include 'overall/footer.tpl'}
<script src="styles/js/codeReset.js"></script>
</body>
</html>