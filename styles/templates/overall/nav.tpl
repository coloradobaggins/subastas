<!-- Static navbar -->
<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- TOGGLE MENU SIDEBAR BUTTON -->

                <a class="navbar-brand" href="#">Subastero</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="?view=autosSubasta">Ver Subasta</a></li>
                    <li><a href="?view=datos">Carga Datos</a></li>
                    <li><a href="?view=listComprados">Adquiridos</a></li>
                    <li><a href="?view=gastosGenerales">Gastos Generales</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    {if isset($smarty.session.user)}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{$smarty.session.user} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">{$smarty.session.rol_name}</li>
                            <li><a href="?view=logout">Logout</a></li>
                        </ul>
                    </li>
                    {/if}
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>
