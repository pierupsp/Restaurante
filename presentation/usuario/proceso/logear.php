<?php
    include_once '../../../data/conexion.php';
    include_once '../../../data/utiles.php';
    include_once '../../../data/usuarioDAL.php';
    $mysql   = new conexion();
    $usu_dal = new usuarioDAL();

    session_start();
    $Nombre     = $_POST['Nombre'];
    $Contrasena = $_POST['Contrasena'];

    $usu = $usu_dal->logear($Nombre, $Contrasena);

    if ($usu) {
        $row = $usu;

        $_SESSION['Auth.UsuarioID'] = $row['id_usuario'];
        $_SESSION['eNombres']       = $row['nombre'];
        $_SESSION['eApellidos']     = "$row[apellido_paterno] $row[apellido_materno]";
        $_SESSION['eCargoID']       = $row['id_cargo'];
        $_SESSION['eCargo']         = cargo($row['id_cargo']);
        echo 1;
    } else {
        echo 0;
    }