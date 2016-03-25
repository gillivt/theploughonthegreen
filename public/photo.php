<?php require_once("../database/initialize.php"); ?>
<?php
if (empty($_GET['id'])) {
    $session->message("<div class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>&nbsp&nbsp;No Photograph ID Was Provided.</div>");
    redirect_to('gallery.php');
}

$photo = GalleryPhotos::find_by_id($_GET['id']);
if (!$photo) {
    $session->message("<div class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>&nbsp&nbsp;The Photo Could Not Be Located.</div>");
    redirect_to('gallery.php');
}

if (isset($_POST['submit'])) {
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);

    $new_comment = Comment::make($photo->id, $author, $body);
    if ($new_comment && $new_comment->save()) {
        // comment saved
        // No message needed; seeing the comment is proof enough.
        // Send email
        $new_comment->try_to_send_notification();

        // Important!  You could just let the page render from here. 
        // But then if the page is reloaded, the form will try 
        // to resubmit the comment. So redirect instead:
        redirect_to("photo.php?id={$photo->id}");
    } else {
        // Failed
        $message = "<div class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>&nbsp&nbsp;There was an error that prevented the comment from being saved.</div>";
    }
} else {
    $author = "";
    $body = "";
}

$comments = $photo->comments();
?>
<?php include_layout_template('header.php'); ?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-8"> 
                <a href="gallery.php"class="btn btn-primary" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;&nbsp;Back</a><br><br>
                <div style="margin-left: 20px;">
                    <img class="img-responsive img-rounded" src="<?php echo $photo->image_path(); ?>" />
                    <p><?php echo $photo->caption; ?></p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <br>
                <div id="comments">
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment" style="margin-bottom: 2em;">
                            <div class="author">
                        <?php echo htmlentities($comment->author); ?> wrote:
                            </div>
                            <div class="body">
                                <?php echo strip_tags($comment->body, '<strong><em><p>'); ?>
                            </div>
                            <div class="meta-info" style="font-size: 0.8em;">
                                <?php echo datetime_to_text($comment->created); ?>
                            </div>
                        </div>
                            <?php endforeach; ?>
                    <?php if (empty($comments)) {echo "No Comments.";} ?>
                </div>

                <div id="comment-form">
                    <h3>New Comment</h3>
                    <?php echo output_message($message); ?>
                    <form data-toggle="validator" role="form" action="photo.php?id=<?php echo $photo->id; ?>" method="post">
                        <div class="form-group">
                            <label class="control-label" for="author">Your Name:</label>
                            <input type="text" id="author" name="author" required data-error="Your Name is required" class="form-control" value="<?php echo $author; ?>" />
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="body">Your Comment:</label>
                            <textarea name="body" id="body" required data-error="Your Comment is Required" class="form-control" rows="10"><?php echo $body; ?></textarea>    
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <span class="icon-input-btn"><span class="glyphicon glyphicon-ok-sign"></span><input class="btn btn-primary" type="submit" name="submit" value="Submit Comment" /></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="bootstrap-validator-master/dist/validator.min.js"></script>
<script src="assets/js/photo.js"></script>
<?php include_layout_template('footer.php'); ?>
