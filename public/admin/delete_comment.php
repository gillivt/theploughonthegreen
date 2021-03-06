<?php require_once("../../database/initialize.php"); ?>
<?php if (!$session->is_logged_in()) {
    redirect_to("login.php");
} ?>
<?php

// must have an ID
if (empty($_GET['id'])) {
    $session->message("<div class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>&nbsp&nbsp;No comment ID was provided.</div>");
    redirect_to('admin.php');
}

$comment = Comment::find_by_id($_GET['id']);
if ($comment && $comment->delete()) {
    $session->message("<div class='alert alert-success'><span class='glyphicon glyphicon-ok-sign'></span>&nbsp&nbsp;The comment was deleted.</div>");
    redirect_to("comments.php?id={$comment->photograph_id}");
} else {
    $session->message("<div class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>&nbsp&nbsp;The comment could not be deleted.</div>");
    redirect_to('listgalleryphotos.php');
}
?>
<?php if (isset($database)) {
    $database->close_connection();
} ?>
