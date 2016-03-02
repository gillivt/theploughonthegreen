<?php require_once("../../database/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
  // Find all the photos
  $photos = Photograph::find_all();
?>
<?php include_layout_template('header.php'); ?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h2>Photographs</h2>
                <?php echo output_message($message); ?>
                <table class="table table-striped table-bordered table-responsive">
                    <tr>
                        <th>Image</th>
                        <th>Filename</th>
                        <th>Caption</th>
                        <th>Size</th>
                        <th>Type</th>
                        <th>Comments</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach($photos as $photo): ?>
                    <tr>
                        <td><img src="../<?php echo $photo->image_path(); ?>" width="100" /></td>
                        <td><?php echo $photo->filename; ?></td>
                        <td><?php echo $photo->caption; ?></td>
                        <td><?php echo $photo->size_as_text(); ?></td>
                        <td><?php echo $photo->type; ?></td>
                        <td>
                            <a class="btn btn-info" role="button" href="comments.php?id=<?php echo $photo->id; ?>">
				<?php echo count($photo->comments()); ?>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" role="button" href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" role="button" href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <a class="btn btn-primary" role="button" href="photo_upload.php">Upload a new photograph</a>
            </div>
        </div>
    </div>
</main>

<script src="../assets/js/list_photos.js"></script>
<?php include_layout_template('footer.php'); ?>
