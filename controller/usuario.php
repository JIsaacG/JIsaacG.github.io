<?php

require_once ("../config/conexion.php");
require_once ("../models/Usuario.php");

$usuario = new Usuario();

//controlador de las operacion a hacer dependiendo que quiera hacer el usuario de soporte
switch ($_GET["op"]) {
    case "guardaryeditar":
        //Si viene vacio se registra usuario
        if (empty(($_POST["NUM_IDENTIDAD"]))) {
            if (is_array($datos) == true and count($datos) == 0) {
                $usuario->insert_usuario($_POST["USUARIO"], $_POST["NOMBRE_USUARIO"], $_POST["CONTRASEÑA"], $_POST["CORREO_ELECTRONICO"], $_POST["ID_ROL"]);
            }
        } else {
            //si no se edita el usuario
            $usuario->update_usuario($_POST["NUM_IDENTIDAD"], $_POST["USUARIO"], $_POST["NOMBRE_USUARIO"], $_POST["CONTRASEÑA"], $_POST["CORREO_ELECTRONICO"], $_POST["ID_ROL"]);
            ;
        }

        break;

    //lista los usuario registrados de la base de datos
        case "listar":
            $datos=$usuario->get_usuario();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["USUARIO"];
                $sub_array[] = $row["NOMBRE_USUARIO"];
                $sub_array[] = $row["CORREO_ELECTRONICO"];
                $sub_array[] = $row["CONTRASEÑA"];

                if ($row["ID_ROL"]=="1"){
                    $sub_array[] = '<span class="">Usuario</span>';
                }else{
                    $sub_array[] = '<span class="">Soporte</span>';
                }

                $sub_array[] = '<button type="button" onClick="editar('.$row["NUM_IDENTIDAD"].');"  id="'.$row["NUM_IDENTIDAD"].'" class=""><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["NUM_IDENTIDAD"].');"  id="'.$row["NUM_IDENTIDAD"].'" class=""><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;


    case "eliminar":
        $usuario->delete_usuario($_POST["NUM_IDENTIDAD"]);
        break;

    case "mostrar":
        $datos = $usuario->get_usuario_x_id($_POST["NUM_IDENTIDAD"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["NUM_IDENTIDAD"] = $row["NUM_IDENTIDAD"];
                $output["USUARIO"] = $row["USUARIO"];
                $output["NOMBRE_USUARIO"] = $row["NOMBRE_USUARIO"];
                $output["CORREO_ELECTRONICO"] = $row["CORREO_ELECTRONICO"];
                $output["CONTRASEÑA"] = $row["CONTRASEÑA"];
                $output["ID_ROL"] = $row["ID_ROL"];
            }
            echo json_encode($output);

        }
        break;


}
