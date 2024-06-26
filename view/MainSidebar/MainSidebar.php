

<div class="sidebar-content">
    <!-- Contenido del sidebar -->
    <div class="sidebar-sticky">
        <!-- Logo y título -->
        <div class="content-side content-side-full px-10">
            <div class="text-center">
                <!-- Logo -->
                <a class="img-link" href="../home/index.php">
                    <img class="img-avatar" src="../../public/assets/img/logo/LOGO.png" alt="">
                </a>
                <!-- Título -->
                <div class="font-size-lg text-dual-primary-dark mt-10">
                    Dirección de <br> Educación Superior
                </div>
            </div>
        </div>

        <!-- Opciones del sidebar -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible solo en modo normal -->
            <div class="sidebar-mini-hidden-b text-center">
                <!-- Enlace al perfil del usuario -->
                <a class="img-link" href="be_pages_generic_profile.html">
                    <img class="img-avatar" src="../../public/assets/img/avatars/avatar15.jpg" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <!-- Mostrar nombre de usuario -->
                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html"><?php echo $_SESSION["NOMBRE_USUARIO"] ?></a>
                    </li>
                    <li class="list-inline-item">
                        <!-- Opciones adicionales de sidebar -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="../Logout/logout.php">
                            <i class="si si-logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Fin de visibilidad en modo normal -->
        </div>
    </div>
</div>
