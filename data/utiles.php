<?php
    define('CARGO_ADMINISTRADOR', 1);
    define('CARGO_MOZO', 2);
    define('CARGO_CAJERO', 3);
    function cargo($id_cargo) {
        if ($id_cargo == CARGO_ADMINISTRADOR) {
            return "Administador";
        } elseif ($id_cargo == CARGO_MOZO) {
            return "Mozo";
        } elseif ($id_cargo == CARGO_CAJERO) {
            return "Cajero";
        }
        return "";
    }