<?php
    session_start();
    if (!isset ($_SESSION['Auth.UsuarioID'])) {
        echo "<script>window.location='login.php';</script>";
        exit();
    }
    include_once '../utils.php';
    include_once '../../data/utiles.php';
?>
<?php
    $_SESSION['pagina'] = 'presentation/pedido/pedidoReg.php';
    $parent             = '';
    if (isset($_GET['parent'])) {
        $_SESSION['pdreg.parent'] = $parent = $_GET['parent'];
    } elseif (isset($_SESSION['pdreg.parent'])) {
        $parent = $_SESSION['pdreg.parent'];
    }
?>
<?php
    include_once '../../data/tipo_pedidoDAL.php';
    $dal_tpd = new tipo_pedidoDAL();
    $tpd_rs  = $dal_tpd->getFullList();
?>
<?php
    include_once '../../data/clienteDAL.php';
    $dal_cli = new clienteDAL();
    $cli_rs  = $dal_cli->getFullList();
?>
<form name='frmpedidoReg' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
    <h1>Registrar pedido</h1>
</div>
<hr class='separator'/>
<center>
    <table>
        <tr>
            <td><label for='txtid_tipopedido'>Tipo pedido:</label></td>
            <td><select id='txtid_tipopedido' name='txtid_tipopedido'>
                    <?php if ($tpd_rs) {
                        while ($tpd_row = mysqli_fetch_assoc($tpd_rs)) { ?>
                            <option value='<?php echo $tpd_row['id_tipopedido'] ?>'><?php echo $tpd_row['descripcion']; ?></option>
                        <?php }
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for='txtid_cliente'>Cliente:</label></td>
            <td><select id='txtid_cliente' name='txtid_cliente'>
                    <?php if ($cli_rs) {
                        while ($cli_row = mysqli_fetch_assoc($cli_rs)) { ?>
                            <option value='<?php echo $cli_row['id_cliente']; ?>'><?php echo $cli_row['pers_nombre'].' '.$cli_row['apellido_paterno']; ?></option>
                        <?php }
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for='txtfecha_reserva'>F. Reserva:</label></td>
            <td><input type='text' id='txtfecha_reserva' name='txtfecha_reserva'
                       placeholder='Ingrese fecha reserva'/></td>
        </tr>
        <tr>
            <td><label for='txtimporte'>Importe:</label></td>
            <td><input type='text' id='txtimporte' name='txtimporte' maxlength='10'
                       placeholder='Ingrese importe'/></td>
        </tr>
        <tr>
            <td><label for='txtadeudo'>Adeudo:</label></td>
            <td><input type='text' id='txtadeudo' name='txtadeudo' maxlength='6'
                       placeholder='Ingrese adeudo'/></td>
        </tr>
        <tr>
            <td><label for='txtfecha_registro'>F. Registro:</label></td>
            <td><input type='text' id='txtfecha_registro' name='txtfecha_registro'
                       placeholder='Ingrese fecha registro'/></td>
        </tr>
    </table>
</center>
<hr class='separator'/>
<div class='formfoot'>
    <input class='btn azul' type='button' name='btnRegistrar' id='btnRegistrar' value='Registrar'/>
    <input class='btn' type='button' name='btnCancelar' id='btnCancelar' value='Cancelar'/>
</div>
</div>
</div>
</form>
<br/>
<script>
    $(document).ready(function (e) {
        $('#txtfecha_reserva').focus();
        $('#btnRegistrar').off('click').click(function (e) {
            var fecha_reserva  = getDateYMD($('#txtfecha_reserva').val());
            var importe        = $('#txtimporte').val();
            var adeudo         = $('#txtadeudo').val();
            var fecha_registro = getDateYMD($('#txtfecha_registro').val());
            var id_usuario     = $('#txtid_usuario').val();
            var id_tipopedido  = $('#txtid_tipopedido').val();
            var id_cliente     = $('#txtid_cliente').val();

            $.post('presentation/pedido/proceso/regpedido.php', {
                        fecha_reserva : fecha_reserva,
                        importe       : importe,
                        adeudo        : adeudo,
                        fecha_registro: fecha_registro,
                        id_tipopedido : id_tipopedido,
                        id_cliente    : id_cliente
                    },
                    function (data) {
                        if (data == 1) {
                            alert('Registro correcto');
                            volver();
                        } else {
                            alert('Error al registrar. ' + data);
                        }
                    });
        });
        $('#btnCancelar').click(function (e) {
            volver();
        });
    });
    function volver() {
        var parent = '<?php echo $parent;?>';
        if (parent == '')
            performLoad('presentation/pedido/pedido.php');
        else
            performLoad('presentation/' + parent);
    }
</script>