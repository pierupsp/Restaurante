<?php
    include_once 'conexion.php';

    class clienteDAL {
        public function get($id_cliente) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT cli.id_cliente, cli.telefono, cli.email, cli.id_tipocliente, cli.id_persona, cli.id_empresa
                 FROM cliente cli
                 WHERE cli.id_cliente = $id_cliente;");
            return $rs;
        }

        public function getFields($id_cliente) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT cli.id_cliente, cli.telefono, cli.email, cli.id_tipocliente, cli.id_persona, cli.id_empresa,
                    pers.nombre AS persona
                 FROM cliente cli
                    INNER JOIN tipo_cliente tcli ON cli.id_tipocliente = tcli.id_tipocliente
                    INNER JOIN empresa empr ON cli.id_empresa = empr.id_empresa
                    INNER JOIN persona pers ON cli.id_persona = pers.id_persona
                 WHERE cli.id_cliente = $id_cliente;");
            return $rs;
        }

        public function getFullList($s = 1) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT cli.id_cliente, cli.telefono, cli.email, cli.id_tipocliente, cli.id_persona,
                    pers.nombre AS pers_nombre, pers.apellido_paterno, pers.apellido_materno
                 FROM cliente cli
                    INNER JOIN tipo_cliente tcli ON cli.id_tipocliente = tcli.id_tipocliente                   
                    INNER JOIN persona pers ON cli.id_persona = pers.id_persona WHERE cli.id_tipocliente = 1;");
            return $rs;
        }

        public function getList($s = 1) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT cli.id_cliente, cli.telefono, cli.email, cli.id_tipocliente, cli.id_persona, cli.id_empresa,
                    pers.nombre AS persona
                 FROM cliente cli
                    INNER JOIN tipo_cliente tcli ON cli.id_tipocliente = tcli.id_tipocliente
                    INNER JOIN empresa empr ON cli.id_empresa = empr.id_empresa
                    INNER JOIN persona pers ON cli.id_persona = pers.id_persona
                 LIMIT 0,50;");
            return $rs;
        }

        public function search($b, $s = 1) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT cli.id_cliente, cli.telefono, cli.email, cli.id_tipocliente, cli.id_persona, cli.id_empresa,
                    pers.nombre AS persona
                 FROM cliente cli
                    INNER JOIN tipo_cliente tcli ON cli.id_tipocliente = tcli.id_tipocliente
                    INNER JOIN empresa empr ON cli.id_empresa = empr.id_empresa
                    INNER JOIN persona pers ON cli.id_persona = pers.id_persona
                 WHERE cli.id_cliente = '$b'
                 LIMIT 0,50;");
            return $rs;
        }

        public function insert($e) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("INSERT INTO cliente (telefono, email, id_tipocliente, id_persona, id_empresa)
                    VALUES ('$e->telefono', '$e->email', '$e->id_tipocliente', '$e->id_persona', '$e->id_empresa');");
            return $rs;
        }

        public function update($e) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("UPDATE cliente SET telefono = '$e->telefono', email = '$e->email', id_tipocliente = '$e->id_tipocliente', id_persona = '$e->id_persona', id_empresa = '$e->id_empresa'
                     WHERE id_cliente = $e->id_cliente;");
            return $rs;
        }
    }

?>