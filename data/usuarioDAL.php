<?php
    include_once 'conexion.php';

    class usuarioDAL {
        public function get($id_usuario) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT usu.id_usuario, usu.nombre, usu.contrasena, usu.estado, usu.fecha_registro, usu.fecha_culminacion, usu.id_empleado
             FROM usuario usu
             WHERE usu.id_usuario = $id_usuario;");
            return $rs;
        }

        public function logear($usuario, $contrasena) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT
                    usu.id_usuario, usu.id_cargo, usu.estado,           
                    usu.id_empleado, empl.id_persona,
                    pers.nombre, pers.apellido_paterno, pers.apellido_materno
                FROM usuario usu
                    INNER JOIN empleado empl ON usu.id_empleado = empl.id_empleado
                    INNER JOIN persona pers ON empl.id_persona = pers.id_persona
                WHERE usu.nombre = '$usuario' AND usu.contrasena = '$contrasena'
            ");
            if ($rs && mysqli_num_rows($rs) > 0) {
                return mysqli_fetch_assoc($rs);
            } else {
                return null;
            }
        }

        public function getFields($id_usuario) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT usu.id_usuario, usu.nombre, usu.contrasena, usu.estado, usu.fecha_registro, usu.fecha_culminacion, usu.id_empleado
             FROM usuario usu
                INNER JOIN empleado empl ON usu.id_empleado = empl.id_empleado
             WHERE usu.id_usuario = $id_usuario;");
            return $rs;
        }

        public function getFullList($s = 1) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT usu.id_usuario, usu.nombre, usu.contrasena, usu.estado, usu.fecha_registro, usu.fecha_culminacion, usu.id_empleado
             FROM usuario usu
                INNER JOIN empleado empl ON usu.id_empleado = empl.id_empleado
             WHERE usu.estado = $s;");
            return $rs;
        }

        public function getList($s = 1) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT usu.id_usuario, usu.nombre, usu.contrasena, usu.estado, usu.fecha_registro, usu.fecha_culminacion, usu.id_empleado
             FROM usuario usu
                INNER JOIN empleado empl ON usu.id_empleado = empl.id_empleado
             WHERE usu.estado = $s
             LIMIT 0,50;");
            return $rs;
        }

        public function search($b, $s = 1) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("SELECT usu.id_usuario, usu.nombre, usu.contrasena, usu.estado, usu.fecha_registro, usu.fecha_culminacion, usu.id_empleado
             FROM usuario usu
                INNER JOIN empleado empl ON usu.id_empleado = empl.id_empleado
             WHERE usu.nombre like '$b%'
               AND usu.estado = $s
             LIMIT 0,50;");
            return $rs;
        }

        public function insert($e) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("INSERT INTO usuario (id_usuario, nombre, contrasena, estado, fecha_registro, fecha_culminacion, id_empleado)
                VALUES ('$e->id_usuario', '$e->nombre', '$e->contrasena', 1, '$e->fecha_registro', '$e->fecha_culminacion', '$e->id_empleado');");
            return $rs;
        }

        public function update($e) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("UPDATE usuario SET id_usuario = '$e->id_usuario', nombre = '$e->nombre', contrasena = '$e->contrasena', estado = '$e->estado', fecha_registro = '$e->fecha_registro', fecha_culminacion = '$e->fecha_culminacion', id_empleado = '$e->id_empleado'
                 WHERE id_usuario = $e->id_usuario;");
            return $rs;
        }

        public function activate($id_usuario) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("UPDATE usuario SET estado = 1
                WHERE id_usuario = $id_usuario;");
            return $rs;
        }

        public function deactivate($id_usuario) {
            $mysql = new conexion();
            $rs    = $mysql->ejecutar("UPDATE usuario SET estado = 0
                WHERE id_usuario = $id_usuario;");
            return $rs;
        }
    }

?>