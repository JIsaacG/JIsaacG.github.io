<!doctype html>
<html lang="en" class="no-focus">

<head>

    <?php require_once("../MainHead/MainHead.php"); ?>

</head>

<body>

    <div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed">

        <aside id="side-overlay">

            <div id="side-overlay-scroll">

                <div class="content-header content-header-fullrow">
                    <div class="content-header-section align-parent">
                        <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>

                        <div class="content-header-item">
                            <a class="img-link mr-5" href="be_pages_generic_profile.html">
                                <img class="img-avatar img-avatar32" src="../../public/assets/img/avatars/avatar15.jpg" alt="">
                            </a>
                            <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">John Smith</a>
                        </div>

                    </div>
                </div>



            </div>

        </aside>


        <nav id="sidebar">

            <div id="sidebar-scroll">

                <div class="sidebar-content">


                    <?php require_once("../MainSidebar/MainSidebar.php"); ?>


                    <?php require_once("../MainMenu/MainMenu.php"); ?>

                </div>

            </div>

        </nav>

        <?php require_once("../MainHeader/MainHeader.php"); ?>



        <!-- Inicio de la entrada de la universidad -->

        <main id="main-container">
            <div class="content">
                <h2 class="content-heading">Análisis Curricular</h2>

                <div class="row justify-content-center">
                    <div class="col-md-4" data-toggle="appear">
                        <a href="../MantenimientoSolicitudes/AnalisisCurricular_Emitir.php" class="block block-link-shadow text-center">
                            <div class="block-content block-content-full">
                                <div class="py-30 text-center">
                                    <div class="item item-2x item-circle bg-warning text-white mx-auto">
                                        <i class="si si-book-open text-default"></i>
                                    </div>
                                </div>
                                <div class="block-content bg-body-light">
                                    <p class="h5 font-w600">Emitir Opinión Razonada</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4" data-toggle="appear">
                        <a href="../MantenimientoSolicitudes/AnalisisCurricular_RYAOR.php" class="block block-link-shadow text-center">
                            <div class="block-content block-content-full">
                                <div class="py-30 text-center">
                                    <div class="item item-2x item-circle bg-default text-white mx-auto">
                                        <i class="si si-magnifier text-warning"></i>
                                    </div>
                                </div>
                                <div class="block-content bg-body-light">
                                    <p class="h5 font-w600">Revisar y Aprobar Opinión Razonada</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


        </main>


        <?php require_once("../MainFooter/MainFooter.php"); ?>


    </div>

    <?php require_once("../MainJs/MainJs.php"); ?>

</body>

</html>