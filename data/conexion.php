<?php

    class conexion {
        public  $server   = 'localhost';
        public  $user     = 'root';
        public  $password = '';
        public  $database = 'comandas';
        private $conexion;

        function conectar() {
            $cnn = mysqli_connect($this->server, $this->user, $this->password, $this->database);

            $this->conexion = $cnn;
            return $cnn;
        }

        function desconectar() {
            if ($this->conexion) {
                return mysqli_close($this->conexion);
            }
        }

        function ejecutar($consulta) {
            $cnn = $this->conectar();
            if ($cnn) {
                mysqli_query($cnn, "SET NAMES 'utf8'");
                $rs = mysqli_query($cnn, $consulta);
                $this->desconectar();
                return $rs;
            }
            return null;
        }
    }