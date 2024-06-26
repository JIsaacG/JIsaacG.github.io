<?php
//cpndicion que validara que si es un usuario solo podra las solicitudes y craer solicitudes y si es uno de soporte podra ver el mantenimiento de las solicitudes
if ($_SESSION["ID_ROL"] == 1) {
?>

    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li>
                <a href="../NuevoIngresoSolicitud/"><i class="si si-book-open"></i><span class="sidebar-mini-hide">Nuevo Ingreso de Solicitud</span></a>

            </li>
            <li>
                <a href="../ConsultarSolicitudes/"><i class="si si-magnifier"></i><span class="sidebar-mini-hide">Consultar Solicitudes</span></a>
            </li>

        </ul>
    </div>

<?php
} else {
?>
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li>
                <a href="../NuevoIngresoSolicitud/"><i class="si si-book-open"></i><span class="sidebar-mini-hide">Nuevo Ingreso de Solicitud</span></a>

            </li>
            <li>
                <a href="../ConsultarSolicitudes/"><i class="si si-magnifier"></i><span class="sidebar-mini-hide">Consultar Solicitudes</span></a>
            </li>
            <li>
                <a href="../SeguimientoAcademico/"><i class="si si-magnifier"></i><span class="sidebar-mini-hide">Seguimiento Académico</span></a>
            </li>
            <li>
                <a href="../MantenimientoSolicitudes/"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Mantenimiento Solicitudes</span></a>
            </li>
            <li>
                <a href="../Reportes/"><i class="si si-magnifier"></i><span class="sidebar-mini-hide">Reportes</span></a>
            </li>
            <li>
                <a href="../MantenimientoSistema/"><i class="si si-magnifier"></i><span class="sidebar-mini-hide">Mantenimiento</span></a>
            </li>
            <li>
                <a href="../Seguridad/"><i class="si si-magnifier"></i><span class="sidebar-mini-hide">Seguridad</span></a>
            </li>

        </ul>
    </div>

<?php
}

?>