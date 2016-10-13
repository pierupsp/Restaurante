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
    $_SESSION['pagina'] = 'presentation/producto/productoReg.php';
    $parent             = '';
    if (isset($_GET['parent'])) {
        $_SESSION['proreg.parent'] = $parent = $_GET['parent'];
    } elseif (isset($_SESSION['proreg.parent'])) {
        $parent = $_SESSION['proreg.parent'];
    }
?>
<?php
    include_once '../../data/tipo_productoDAL.php';
    $dal_tpro = new tipo_productoDAL();
    $tpro_rs  = $dal_tpro->getFullList();
?>
<?php
    include_once '../../data/marcaDAL.php';
    $dal_mc = new marcaDAL();
    $mc_rs  = $dal_mc->getFullList();
?>
<form name='frmproductoReg' method='post'>
<div class='regform'>
<div class='regform-body'>
<div class='formtitle'>
    <h1>Registrar producto</h1>
</div>
<hr class='separator'/>
<center>
    <table>
        <tr>
            <td><label for='txtnombre'>Nombre:</label></td>
            <td><input type='text' id='txtnombre' name='txtnombre' maxlength='50'
                       placeholder='Ingrese nombre'/></td>
        </tr>
        <tr>
            <td><label for='txtid_tipoproducto'>Tipo:</label></td>
            <td><select id='txtid_tipoproducto' name='txtid_tipoproducto'>
                    <?php if ($tpro_rs) {
                        while ($tpro_row = mysqli_fetch_assoc($tpro_rs)) { ?>
                            <option value='<?php echo $tpro_row['id_tipoproducto']; ?>'>
                                <?php echo $tpro_row['nombre']; ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for='txtid_marca'>Marca:</label></td>
            <td><select id='txtid_marca' name='txtid_marca'>
                    <?php if ($mc_rs) {
                        while ($mc_row = mysqli_fetch_assoc($mc_rs)) { ?>
                            <option value='<?php echo $mc_row['id_marca']; ?>'>
                                <?php echo $mc_row['nombre']; ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for='txtprecio'>Precio:</label></td>
            <td><input type='text' id='txtprecio' name='txtprecio' placeholder='Ingrese precio'/></td>
        </tr>
        <tr>
            <td><label for='txtstock'>Stock:</label></td>
            <td><input type='text' id='txtstock' name='txtstock' maxlength='10'
                       placeholder='Ingrese stock'/></td>
        </tr>
    </table>
</center>
<hr class='separator'/>
<div class='formfoot'>
    <input class='btn azul' type='button' name='btnRegistrar' id='btnRegistrar' value='Registrar'/>
    <input class='btn' type='button' name='btnCancelar' id='btnCancelar' value='Cancelar'/></td>
</div>
</div>
</div>
</form>
<br/>
<script>
    $(document).ready(function (e) {
        $('#txtnombre').focus();
        $('#btnRegistrar').off('click').click(function (e) {
            var nombre          = $('#txtnombre').val();
            var id_tipoproducto = $('#txtid_tipoproducto').val();
            var id_marca        = $('#txtid_marca').val();
            var precio          = $('#txtprecio').val();
            var stock           = $('#txtstock').val();

            $.post('presentation/producto/proceso/regproducto.php', {
                        nombre         : nombre,
                        id_tipoproducto: id_tipoproducto,
                        id_marca       : id_marca,
                        precio         : precio,
                        stock          : stock
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
            performLoad('presentation/producto/producto.php');
        else
            performLoad('presentation/' + parent);
    }
</script>