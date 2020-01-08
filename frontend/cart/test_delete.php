<?php
session_start();
$index = $_GET['index'];
unset($_SESSION['Cart'][$index]);
$_SESSION['Cart'] = array_values($_SESSION['Cart']);
header('Location: ../cart.php?Del=true');
?>