<?php require_once("../../database/initialize.php"); ?>
<?php	
    $session->logout();
    redirect_to("login.php");
?>
