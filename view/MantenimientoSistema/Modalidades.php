<!doctype html>
<html lang="en" class="no-focus">

<head>

    <?php require_once("../MainHead/MainHead.php"); ?>

    <title>Home / Bienvenido </title>

</head>

<body >

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
                            <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html"><!-- llamada del usuario   -->
                            <span><?php echo $_SESSION["USUARIO"] ?> <?php echo $_SESSION["NOMBRE_USUARIO"] ?></span></a>
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
                <h2 class="content-heading">Bienvenido, UNITEC </h2>
                <div class="block-header block-header-default">
                        <h3 class="block-title">Modalidades <small></small></h3>
                    </div>

                <!DOCTYPE html>
<html>
<head>
    <title>Tabla de Modalidades</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: blue;
            color: white;
            padding: 10px;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        .action-buttons form {
            display: inline;
        }
        .action-buttons input[type="submit"] {
            margin: 0 5px;
        }
        .top-buttons {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="top-buttons">
    <form action="buscar.php" method="GET" style="display:inline;">
        <input type="text" name="buscar" placeholder="Buscar Modalidades">
        <input type="submit" value="Buscar">
    </form>
    <form action="agregar.php" method="POST" style="display:inline;">
        <input type="submit" value="Agregar Modalidades">
    </form>
</div>

<?php
// Inicialmente no hay datos en la tabla
$modalidades = [];

echo '<table border="1">';
echo '<tr>';
echo '<th>IDmodalidad</th>';
echo '<th>Nombre Modalidad</th>';
echo '<th>Acción</th>';
echo '</tr>';

// Si hay departamentos, los mostramos
if (!empty($modalidades)) {
    foreach ($modalidades as $modalidades) {
        echo '<tr>';
        echo '<td>' . $modalidades['IDmodalidad'] . '</td>';
        echo '<td>' . $departamento['NombreModalidad'] . '</td>';
        echo '<td class="action-buttons">';
        echo '<form action="editar.php" method="POST">';
        echo '<input type="hidden" name="IDmodalidad" value="' . $modalidad['IDmodalidad'] . '">';
        echo '<input type="submit" value="Editar">';
        echo '</form>';
        echo '<form action="eliminar.php" method="POST">';
        echo '<input type="hidden" name="IDmodalidad" value="' . $modalidad['IDmodalidad'] . '">';
        echo '<input type="submit" value="Eliminar" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este departamento?\');">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    // Si no hay datos, mostramos una fila vacía con botones de ejemplo
    echo '<tr>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td class="action-buttons">';
    echo '<form action="editar.php" method="POST">';
    echo '<input type="hidden" name="IDmodalidad" value="">';
    echo '<input type="submit" value="Editar">';
    echo '</form>';
    echo '<form action="eliminar.php" method="POST">';
    echo '<input type="hidden" name="IDmodalidad" value="">';
    echo '<input type="submit" value="Eliminar">';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
?>

</body>
</html>




                



                    

               


                    

              
                



                    

                
                


              
               

                
                    
               

            </div>

        </main>


        <?php require_once("../MainFooter/MainFooter.php"); ?>


    </div>

    <?php require_once("../MainJs/MainJs.php"); ?>

</body>

</html>