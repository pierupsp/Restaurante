<?php
    session_start();
    $UsuarioID = 0;
    if (!isset ($_SESSION['Auth.UsuarioID'])) {
        echo 'Inicie sesión de nuevo.';
        exit();
    } else {
        $UsuarioID = $_SESSION['Auth.UsuarioID'];
    }
?>
<?php
    if (isset($_SESSION['Auth.UsuarioID'])) {
        include_once '../../../entities/pedido.php';
        include_once '../../../data/pedidoDAL.php';

        if (isset($_POST['fecha_reserva'], $_POST['importe'], $_POST['adeudo'], $_POST['fecha_registro'],  $_POST['id_tipopedido'], $_POST['id_cliente'])) {
            $obj                 = new pedido();
            $obj->fecha_reserva  = $_POST['fecha_reserva'];
            $obj->importe        = $_POST['importe'];
            $obj->adeudo         = $_POST['adeudo'];
            $obj->fecha_registro = $_POST['fecha_registro'];
            $obj->id_usuario     = $_SESSION['Auth.UsuarioID'];
            $obj->id_tipopedido  = $_POST['id_tipopedido'];
            $obj->id_cliente     = $_POST['id_cliente'];

            $dal_pd = new pedidoDAL();
            $pd_rs  = $dal_pd->insert($obj);
            echo ($pd_rs == 1) ? 1 : 'No se ha podido registrar';
        } else {
            echo 'Ingrese datos validos';
        }
    }
?>