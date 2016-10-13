<?php
    session_start();

    $usuarioID = 0;
    if (isset($_SESSION['Auth.UsuarioID'])) {
        $usuarioID = $_SESSION['Auth.UsuarioID'];
        $empleado  = $_SESSION['eNombres'].' '.$_SESSION['eApellidos'];
        $cargoID   = $_SESSION['eCargoID'];
        $cargo     = $_SESSION['eCargo'];
    } else {
        header('location:login.php');
        exit();
    }
    $page = '';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <title>Restaurante</title>
    <link rel="stylesheet" type="text/css" href="site/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="site/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="site/css/styles.css"/>
    <script type="text/javascript" src="site/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="site/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="site/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="site/js/utils.js"></script>

</head>
<body id="wrapper">

<div id="banner">
    <p><img src='site/img/gorro.png' style='height: 32px;'>
        Sistema web control de comandas <a id="btnCerrar" class="btn-menu">Cerrar sesion</a>
    </p>
    <div style='background-color: #8fd2d2;height: 5px;'></div>
</div>

<table style="width:100%;height:100%;">
<tr style="height:100%;">
<td style="width:190px;vertical-align:top;">
    <div id="menu">
        <div id="acordion" style='margin-top: 12px;'>
            <?php if ($cargoID == 1) { ?>
                <p>Productos</p>
                <div>
                    <p><a href="#" onclick="$('#contenido').load('presentation/producto/producto.php');">Productos</a>
                    </p>
                    <p><a href="#"
                          onclick="$('#contenido').load('presentation/tipo_producto/tipo_producto.php');">Tipos
                            de producto</a></p>
                    <p><a href="#" onclick="$('#contenido').load('presentation/marca/marca.php');">Marcas</a>
                    </p>
                </div>
            <?php } ?>
            <?php if ($cargoID == 1 || $cargoID == 2) { ?>
                <p>Mesas</p>
                <div>
                    <p><a href="#" onclick="$('#contenido').load('presentation/mesa/mesa.php');">Mesas</a>
                    </p>
                    <p><a href="#" onclick="$('#contenido').load('presentation/tipo_mesa/tipo_mesa.php');">Tipo
                            Mesa</a></p></div>
            <?php } ?>
            <?php if ($cargoID == 1 || $cargoID == 2 || $cargoID == 3) { ?>
                <p>Pedidos</p>
                <div>
                    <p><a href="#" onclick="$('#contenido').load('presentation/pedido/pedido.php');">Pedido</a>
                    </p>
                    <p><a href="#">Clientes</p></div>
            <?php } ?>
        </div>
        <script>
            $(function () {
                $("#acordion").accordion();
            });
        </script>
    </div>
</td>
<td style="vertical-align:top;">
    <div id="contenido" class="contenido" style="margin-top:0px;">
        <div class="bienvenido">
            <?php if ($usuarioID) {
                echo 'Bienvenido, '.$empleado."<br/>".$cargo;
            } ?>
        </div>
    </div>
</td>
</tr>
</table>

<div width="700px" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="width:750px !important">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Becas USP</h4>
            </div>
            <center>
                <div id="modal_body" class="modal-body"></div>
            </center>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

</body>
<script>
    cargarPagina();
    $('#btnCerrar').click(function () {
        $.post('presentation/usuario/proceso/cerrarsesion.php', {},
                function (data) {
                    window.location = "login.php";
                });
    });
    function cargarPagina() {
        var page = '<?php echo $page; ?>';
        if (page != '') {
            $('#contenido').load('presentation/' + page + '/' + page + '.php');
        }
    }
</script>
</html>
