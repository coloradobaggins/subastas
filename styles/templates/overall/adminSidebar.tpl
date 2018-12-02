<div id="sidebar-wrapper">
    <div id="MainMenu">
        <div class="list-group panel">
            <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Empresa <i class="fa fa-caret-down"></i></a>
            <div class="collapse" id="demo3">
                <a href="?view=empresa" class="list-group-item" data-parent="#SubMenu1">Datos Empresa</a>
                <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Cuenta <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu" id="SubMenu1">
                    <a href="?view=cuenta" class="list-group-item" data-parent="#SubMenu1">Datos de cuenta</a>
                </div>
            </div>
            <!-- WEB -->
            <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">WEB <i class="fa fa-caret-down"></i></a>
            <div class="collapse" id="demo4">
                <a href="#WebSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Datos Generales <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu list-group-submenu-1" id="WebSubMenu1">
                    <a href="?view=datosHeader" class="list-group-item" data-parent="#SubSubMenu1">Datos Header</a>
                    <a href="?view=datosFooter" class="list-group-item" data-parent="#SubSubMenu1">Datos Footer</a>
                    <a href="?view=web/general/datosSitemap" class="list-group-item" data-parent="#SubSubMenu1">Sitemap</a>
                </div>

                <!-- HOME -->
                <a href="#SubMenu2" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Home <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu" id="SubMenu2">
                    <a href="?view=web/metatags&idSeccion=1" class="list-group-item" data-parent="#SubMenu1">Metatags</a>
                    <a href="?view=homeSlider" class="list-group-item" data-parent="#SubMenu1">Slider</a>
                    <a href="?view=homeContent" class="list-group-item" data-parent="#SubMenu1">Contenido</a>
                    <a href="?view=web/othersArts/othersArts&seccion=1" class="list-group-item" data-parent="#SubMenu1">Articulos linkeados</a>
                </div>

                <!-- NOSOTROS -->
                <a href="#SubMenuNosotros" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Nosotros <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu" id="SubMenuNosotros">
                    <a href="?view=web/metatags&idSeccion=2" class="list-group-item" data-parent="#SubMenu1">Metatags</a>
                    <a href="?view=nosotrosContent" class="list-group-item" data-parent="#SubMenu1">Contenido</a>
                    <a href="?view=web/nosotros/equipo" class="list-group-item" data-parent="#SubMenu1">Nuestro equipo</a>
                    <a href="?view=web/nosotros/clientes" class="list-group-item" data-parent="#SubMenu1">Clientes</a>
                </div>

                <!-- SERVICIOS -->
                <a href="#SubMenuServicios" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Servicios <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu" id="SubMenuServicios">
                    <a href="?view=web/metatags&idSeccion=3" class="list-group-item" data-parent="#SubMenu1">Metatags</a>
                    <a href="?view=serviciosContent" class="list-group-item" data-parent="#SubMenu1">Contenido</a>
                    <a href="?view=serviciosMetasProg" class="list-group-item" data-parent="#SubMenu1">Metas de programa</a>
                    <a href="?view=serviciosTecAplic" class="list-group-item" data-parent="#SubMenu1">T&eacute;cnicas de aplicaci&oacute;n</a>
                    <a href="?view=web/othersArts/othersArts&seccion=3" class="list-group-item" data-parent="#SubMenu1">Articulos linkeados</a>
                </div>

                <!-- GALERÍA -->
                <a href="#SubMenuGallery" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Galer&iacute;a <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu" id="SubMenuGallery">
                    <a href="?view=web/metatags&idSeccion=4" class="list-group-item" data-parent="#SubMenu1">Metatags</a>
                    <a href="?view=web/gallery/gallery" class="list-group-item" data-parent="#SubMenu1">Galer&iacute;a</a>
                    <a href="?view=web/gallery/upload" class="list-group-item" data-parent="#SubMenu1">Subir fotos</a>
                </div>

                <!-- BENEFICIOS -->
                <a href="#SubMenuBenefit" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Beneficios <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu" id="SubMenuBenefit">
                    <a href="?view=web/metatags&idSeccion=5" class="list-group-item" data-parent="#SubMenu1">Metatags</a>
                    <a href="?view=web/beneficios/benefContent" class="list-group-item" data-parent="#SubMenu1">Contenido</a>
                </div>

                <!-- OTROS ARTICULOS -->
                <!--<a href="?view=web/othersArts/othersArts" class="list-group-item" data-parent="#SubMenu1">Otros Articulos</a>-->


                <!-- CAPACITACIONES -->
                <!-- No olvidar hacer foreign keys con mysql -->
                <a href="#SubMenuCap" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Capacitaciones <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu" id="SubMenuCap">
                    <a href="?view=web/metatags&idSeccion=9" class="list-group-item" data-parent="#SubMenu1">Metatags</a>
                    <a href="?view=web/cap/introCap" class="list-group-item" data-parent="#SubMenu1">Intro</a>
                    <a href="?view=web/cap/cap" class="list-group-item" data-parent="#SubMenu1">Capacitaciones</a>
                </div>

                <!-- EMPLEO -->
                <!-- No olvidar hacer foreign keys con mysql -->
                <a href="#SubMenuJob" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Empleo <i class="fa fa-caret-down"></i></a>
                <div class="collapse list-group-submenu" id="SubMenuJob">
                    <a href="?view=web/empleo/bandeja" class="list-group-item" data-parent="#SubMenu1">Postulaciones</a>
                    <a href="?view=web/empleo/intro" class="list-group-item" data-parent="#SubMenu1">Intro</a>
                    <a href="?view=web/empleo/empleos" class="list-group-item" data-parent="#SubMenu1">Anuncios</a>
                    <a href="?view=web/metatags&idSeccion=10" class="list-group-item" data-parent="#SubMenu1">Metatags</a>
                </div>

                <!-- BANNER PRESUPUESTO -->
                <a href="?view=web/bannerPresupuesto/bannerPresupuesto" class="list-group-item" data-parent="#SubMenu1">Banner Presupuesto</a>

            </div>
            <!-- /.WEB -->
            <a href="#menuSistem" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Sistema <i class="fa fa-caret-down"></i></a>
            <div class="collapse" id="menuSistem">
                <a href="?view=sistema/sistemaUsuarios" class="list-group-item">Usuarios</a>
                <a href="?view=sistema/sistemaPresentismo" class="list-group-item">Presentismo</a>
                <a href="?view=sistema/sistemaIndustria" class="list-group-item">Industria</a>
                <a href="?view=sistemaReportes" class="list-group-item">Reportes</a>
            </div>
        </div>
    </div><!-- /#MainMenu -->
</div>
