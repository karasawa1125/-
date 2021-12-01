<?php session_start(); ?>
<?php unset($_SESSION["account"]); ?>
<?php
header('Location: ../');
exit();
?>
