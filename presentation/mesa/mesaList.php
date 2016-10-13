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
    include_once '../../data/mesaDAL.php';
    $dal_ms = new mesaDAL();
    $b      = isset($_GET['b']) ? htmlspecialchars($_GET['b']) : '';
    if ($b != '') {
        $ms_rs = $dal_ms->search($b);
    } else {
        $ms_rs = $dal_ms->getList();
    }
?>
<table id='tblmesa' class='datatable'>
    <tr>
        <th>Cód</th>
        <th>Tipomesa</th>
        <th>Nº mesa</th>
        <th>Ubicacion</th>
        <th hidden>estado</th>
        <th>Editar</th>
    </tr>
    <?php if ($ms_rs) {
        while ($row = mysqli_fetch_assoc($ms_rs)) { ?>
            <tr>
                <td class='center'><?php echo pad($row['id_mesa']); ?></td>
                <td><?php echo $row['tipomesa']; ?></td>
                <td class='center'><?php echo pad($row['nro_mesa'], 2); ?></td>
                <td class='center'><?php echo $row['ubicacion']; ?></td>
                <td hidden><?php echo $row['estado']; ?></td>
                <td class='center'><a href='#' onclick="editar(<?php echo $row['id_mesa']; ?>);">Editar</a></td>
            </tr>
        <?php }
    } ?>
</table>
<script>
    function editar(id) {
        performLoad('presentation/mesa/mesaUpd.php?id=' + id);
    }
</script>