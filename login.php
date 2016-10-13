<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <title>Sistema de becas</title>
    <script type="text/javascript" src="site/js/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="site/css/bootstrap.min.css"/>
    <script type="text/javascript" src="site/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="site/css/custom.css"/>
</head>
<body id="wrapper">
<div id="banner">
    <p><img src='site/img/gorro.png' style='height: 32px;'> Sistema control de comandas</p>
    <div style='background-color: #8fd2d2;height: 5px;'></div>
</div>

<div id="divfrmlogin">
    <form id="frmlogin" name="frmlogin" class="form-vertical">
        <table width="100%">
            <tr>
                <td colspan='2' style="text-align: center; padding: 20px 15px 20px 15px;">
                    <h4 class="form-title" style="color: #e77438;">ACCESO AL SISTEMA WEB</h4>
                </td>

            </tr>
            <tr>
                <td width="100px"><label style="padding-left:25px;">Usuario:</label></td>
                <td style="padding: 5px 25px 5px 5px;">
                    <input type="text" id="txtusuario" name="txtusuario" class="form-control input-sm"
                           placeholder="Ingrese su codigo de usuario">
                </td>
            </tr>
            <tr>
                <td><label style="padding-left:25px;">Clave:</label></td>
                <td style="padding: 5px 25px 15px 5px;">
                    <input type="password" id="txtContrasena" name="txtContrasena" class="form-control input-sm"
                           placeholder="Ingrese su clave">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-right:25px;text-align:right;">
                    <button type="button" class="btn btn-primary" id="btnLogear" name="btnLogear">Iniciar sesión
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#txtContrasena').keyup(function (e) {
            if (e.which == 13) {
                var Nombre     = $('#txtusuario').val();
                var Contrasena = $('#txtContrasena').val();

                $.post('presentation/usuario/proceso/logear.php', {
                            Nombre    : Nombre,
                            Contrasena: Contrasena
                        },
                        function (data) {
                            if (data == '1') {
                                window.location = "index.php";
                            }
                            else {
                                alert('Usuario no valido');
                            }
                        });
            }
        });

        $('#btnLogear').click(function () {
            var Nombre     = $('#txtusuario').val();
            var Contrasena = $('#txtContrasena').val();

            $.post('presentation/usuario/proceso/logear.php', {
                        Nombre    : Nombre,
                        Contrasena: Contrasena
                    },
                    function (data) {
                        if (data == '1') {
                            window.location = "index.php";
                        }
                        else {
                            alert('Usuario no valido');
                        }
                    });
        });
    });
</script>
</body>
</html>