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
    include_once '../../data/pedidoDAL.php';
    $dal_pd = new pedidoDAL();
    $id     = 0;
    if (isset($_GET['id'])) {
        $id    = $_GET['id'];
        $pd_rs = $dal_pd->get($id);
        if ($pd_rs) {
            $row = mysqli_fetch_assoc($pd_rs);
        }
    }
    $_SESSION['pagina'] = "presentation/pedido/pedidoUpd.php?id=$id";
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
<form name='frmpedidoUpd' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
    <h1>Editar pedido</h1>
</div>
<hr class='separator'/>
<center>
<table>
<tr>
    <td><label for='txtid_tipopedido'>Tipo pedido:</label></td>
    <td><select id='txtid_tipopedido' name='txtid_tipopedido'>
            <?php if ($tpd_rs) {
                while ($tpd_row = mysqli_fetch_assoc($tpd_rs)) { ?>
                    <option value='<?php echo $tpd_row['id_tipopedido'] ?>' <?php echo $tpd_row['id_tipopedido'] == $row['id_tipopedido'] ? 'selected' : ''; ?>>
                        <?php echo $tpd_row['descripcion']; ?>
                    </option>
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
                    <option value='<?php echo $cli_row['id_cliente']; ?>'  <?php echo $cli_row['id_cliente'] == $row['id_cliente'] ? 'selected' : ''; ?>>
                        <?php echo $cli_row['pers_nombre'].' '.$cli_row['apellido_paterno']; ?></option>
                <?php }
            } ?>
        </select>
    </td>
</tr>

<tr>
    <td><label for='txtfecha_reserva'>F. reserva:</label></td>
    <td><input type='text' id='txtfecha_reserva' name='txtfecha_reserva' value='<?php if ($id) {
            echo formatDate($row['fecha_reserva']);
        } ?>' placeholder='Ingrese fecha_reserva'/></td>
</tr>
<tr>
    <td><label for='txtimporte'>importe:</label></td>
    <td><input type='text' id='txtimporte' name='txtimporte' value='<?php if ($id) {
            echo $row['importe'];
        } ?>' maxlength='10' placeholder='Ingrese importe'/></td>
</tr>
<tr>
    <td><label for='txtadeudo'>adeudo:</label></td>
    <td><input type='text' id='txtadeudo' name='txtadeudo' value='<?php if ($id) {
            echo $row['adeudo'];
        } ?>' maxlength='6' placeholder='Ingrese adeudo'/></td>
</tr>
<tr hidden>
    <td><label for='txtestado'>estado:</label></td>
    <td><input type='text' id='txtestado' name='txtestado' value='<?php if ($id) {
            echo $row['estado'];
        } ?>' maxlength='20' placeholder='Ingrese estado'/></td>
</tr>
<tr>
    <td><label for='txtfecha_registro'>F. registro:</label></td>
    <td><input type='text' id='txtfecha_registro' name='txtfecha_registro' value='<?php if ($id) {
            echo formatDate($row['fecha_registro']);
        } ?>' placeholder='Ingrese fecha_registro'/></td>
</tr>
<tr class='hidden'>
    <td><label for='txtid_usuario'>id_usuario:</label></td>
    <td><input type='text' id='txtid_usuario' name='txtid_usuario' value='<?php if ($id) {
            echo $row['id_usuario'];
        } ?>' maxlength='10' placeholder='Ingrese id_usuario'/></td>
</tr>
</table>
</center>
<div class='formfoot'>
    <input class='btn naranja' type='button' name='btnActualizar' id='btnActualizar' value='Guardar'/>
    <input class='btn' type='button' name='btnCancelar' id='btnCancelar' value='Cancelar'/></td>
</div>
</div>
</div>
</form>
<br/>
<script>
    $(document).ready(function (e) {
        $('#txtfecha_reserva').focus();
        $('#btnActualizar').off('click').click(function (e) {
            var id_pedido      = '<?php echo $id; ?>';
            var fecha_reserva  = getDateYMD($('#txtfecha_reserva').val());
            var importe        = $('#txtimporte').val();
            var adeudo         = $('#txtadeudo').val();
            var estado         = $('#txtestado').val();
            var fecha_registro = getDateYMD($('#txtfecha_registro').val());
            var id_usuario     = $('#txtid_usuario').val();
            var id_tipopedido  = $('#txtid_tipopedido').val();
            var id_cliente     = $('#txtid_cliente').val();

            $.post('presentation/pedido/proceso/updpedido.php', {
                        id_pedido     : id_pedido,
                        fecha_reserva : fecha_reserva,
                        importe       : importe,
                        adeudo        : adeudo,
                        estado        : estado,
                        fecha_registro: fecha_registro,
                        id_usuario    : id_usuario,
                        id_tipopedido : id_tipopedido,
                        id_cliente    : id_cliente
                    },
                    function (data) {
                        if (data == 1) {
                            alert('Actualizacion correcta');
                            volver();
                        } else {
                            alert('Error al actualizar. ' + data);
                        }
                    });
        });
        $('#btnCancelar').click(function (e) {
            volver();
        });
    });
    function volver() {
        performLoad('presentation/pedido/pedido.php');
    }
</script>