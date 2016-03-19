<?php require_once("../../database/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
	// must have an ID
  if(empty($_GET['id'])) {
  	$session->message("No photograph ID was provided.");
    redirect_to('admin.php');
  }

  $blogPhoto = BlogPhotos::find_by_id($_GET['id']);
  if($blogPhoto && $blogPhoto->destroy()) {
    $session->message("The photo {$blogPhoto->filename} was deleted.");
    redirect_to('listblogphotos.php');
  } else {
    $session->message("The photo could not be deleted.");
    redirect_to('listblogphotos.php');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>
