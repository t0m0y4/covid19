
<?php
if (empty($_SESSION['usuario']) && $_SESSION["validarIngreso"] == false)
   {
        echo '<script>alert("Es necesario iniciar sesión"); location.href = "login";</script>';
    }


include_once "nav_bar_top.php";
include_once "nav_menu_side.php";

$userProfile = new userProfilecontroller();
?>
<div id="content">
 <?php $userProfile->getUserProfile(); ?>
</div>

<?php
include_once "footer.php";
?>
