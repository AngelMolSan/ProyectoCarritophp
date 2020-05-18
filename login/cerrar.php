<?php
session_start();
unset($_SESSION['rol']);
header("Location: ../index.php");
?>