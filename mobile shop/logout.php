<?php include 'header.php' ?>
<?php include 'conn.php' ?>
<?php 
session_unset();
echo '<script> window.location = "index.php" </script>';
?>