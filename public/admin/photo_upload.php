<?php
require_once('../../database/initialize.php');
if (!$session->is_logged_in()) {
    redirect_to("login.php");
}
?>
<?php
$max_file_size = 2097152;   // expressed in bytes (2MB)
//     10240 =  10 KB
//    102400 = 100 KB
//   1048576 =   1 MB
//  10485760 =  10 MB

if (isset($_POST['submit'])) {
    $photo = new Photograph();
    $photo->caption = $_POST['caption'];
    $photo->attach_file($_FILES['file_upload']);
    if ($photo->save()) {
        // Success        
        $session->message("Photograph uploaded successfully.");
        $user = User::find_by_id($session->user_id);
        log_action("Image Uploaded ".$photo->filename, "By: ".$user->full_name());   
        redirect_to('list_photos.php');
    } else {
        // Failure
        $message = join("<br />", $photo->errors);
    }
}
?>

<?php include_layout_template('header.php'); ?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h2>Photo Upload</h2>
                <?php echo output_message($message); ?>
                <form id="uploadimage" data-toggle="validator" role="form" action="photo_upload.php" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>">
                    <fieldset class="form-group">
                        <label class="control-label" for="fileupload">File to Upload</label>
                        <input class="form-control" type="file" required data-image="image" data-error="Please choose an image file (.jpg/.png/.gif)" id="fileupload" name="file_upload">
                        <span class="help-block with-errors"></span>
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="control-label" for="caption">Caption:</label>
                        <input class="form-control" type="text" id="caption" name="caption" required data-error="Caption is Required" value="">
                        <span class="help-block with-errors"></span>
                    </fieldset>
                    <fieldset class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Upload" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="../bootstrap-validator-master/dist/validator.min.js"></script>
<script src="../assets/js/photo_upload.js"></script>
<?php include_layout_template('footer.php'); ?>
		
