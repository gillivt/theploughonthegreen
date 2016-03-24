<?php require_once("../../database/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
	// must have an ID
  if(empty($_GET['id'])) {
  	$session->message("No blog ID was provided.");
    redirect_to('admin.php');
  }

  $blog = Blog::find_by_id($_GET['id']);
  if($blog && $blog->delete()) {
    $session->message("<div class='alert alert-success' role='alert'>The Blog was deleted.</div>");
    redirect_to("listblog.php");
  } else {
    $session->message("<div class='alert alert-danger' role='alert'>The Blog could not be deleted.</div>");
    redirect_to('listblog.php');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>
