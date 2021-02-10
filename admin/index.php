<?php require_once 'config.php' ?>
<?php require_once './includes/header.php'; ?>

<?php 
if(isset($_SESSION["admin"]) && !empty($_SESSION["admin"])): 
    include 'layout.php';
else:
    include 'login.php';
endif;
?>

<?php require_once './includes/footer.php'; ?>