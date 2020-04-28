<?php
    function deleteAlert() {
        if (isset($_SESSION['aceptado'])) {
            unset($_SESSION['aceptado']);
        }
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['errores'])) {
            unset($_SESSION['errores']);
        }
        if (isset($_SESSION['actualizado'])) {
            unset($_SESSION['actualizado']);
        }
    }
?>