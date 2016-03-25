<?php require_once("../../database/initialize.php"); ?>
<?php if (!$session->is_logged_in()) {
    redirect_to("login.php");
} ?>
<?php

// must have an ID
if (empty($_GET['id'])) {
    $session->message("<div class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>&nbsp&nbsp;No photograph ID was provided.</div>");
    redirect_to('admin.php');
}

$blogPhoto = BlogPhotos::find_by_id($_GET['id']);
if ($blogPhoto && $blogPhoto->destroy()) {
    $session->message("<div class='alert alert-success'><span class='glyphicon glyphicon-ok-sign'></span>&nbsp&nbsp;The photo {$blogPhoto->filename} was deleted.</div>");
    redirect_to('listblogphotos.php');
} else {
    $session->message("<div class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>&nbsp&nbsp;The photo could not be deleted.</div>");
    redirect_to('listblogphotos.php');
}
?>
<?php if (isset($database)) {
    $database->close_connection();
} ?>
