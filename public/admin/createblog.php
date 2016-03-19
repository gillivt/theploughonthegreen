<?php
/*
 * File: createblog.php
 * 
 * Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions
 * 
 * Created: 04-Mar-2016 20:44:55
 * 
 * Purpose: Create blog item
 * 
 * 
 * Modification History:
 * 
 */
require_once("../../database/initialize.php");
// if not logged in redirect to login page
if (!$session->is_logged_in()) {
    redirect_to("login.php");
}

if (isset($_POST['submit'])) {
    // Get form data
    $blogTitle = $db->escape_value($_POST['blogtitle']);
    $blogContent = $db->escape_value($_POST['blogcontent']);
    $blogImagePath = $_POST['imagesrc'];
    $linkTitle = isset($_POST['linktitle']) ? $db->escape_value($_POST['linktitle']) : "";
    $linkURL = isset($_POST['linkurl']) ? $db->escape_value($_POST['linkurl']) : "";
    
    // create blog object
    $blog = new Blog();
    $blog->blogTitle = $blogTitle;
    $blog->blogContent = $blogContent;
    $blog->imageURL = $blogImagePath;
    $blog->linkTitle = $linkTitle;
    $blog->linkAddress = $linkURL;
    
    if ($blog->save()) {
        $session->message('Blog Created Successfully');
        $user = User::find_by_id($session->user_id);
        log_action("Blog Created", "By: ".$user->full_name());   
        redirect_to('createblog.php');
        
    } else {
        die('failed to create blog');
    }
}
$images = scandir("../assets/blogimages");
array_shift($images); //throw away current and previous dirs
array_shift($images);
include_layout_template("header.php");
?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Create Blog</h1>
                <?php echo output_message($message); ?>
                <form id ="createblog" data-toggle="validator" action="" role="form" method="post">
                    <div class="form-group">
                        <label class="control-label" for="blogtitle">Blog Title:</label>
                        <input class="form-control" 
                               type="text" 
                               name="blogtitle" 
                               placeholder="enter blog title" 
                               id="blogtitle"
                               data-error="You must enter a blog title"
                               required>
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="blogcontent">Blog Content:</label>
                        <textarea class="form-control"
                                  style="height: 300px;"
                                  name="blogcontent" 
                                  id="blogcontent"
                                  data-blog="blog"
                                  data-error="You must enter content for your blog"></textarea>
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="imageurl">Please Select an Image for your Blog</label>
                        <select id="imageurl" class="form-control">
                            <?php $i = 0;
                            foreach ($images as $image): ?>
                                <option value="<?php echo $i ?>" 
                                        data-imagesrc="<?php echo "../assets/blogimages/" . $image ?>"><?php echo $image ?>
                                </option>
                            <?php $i++;
                            endforeach; ?>
                        </select>
                        <input type="hidden" name="imagesrc" id="imagesrc">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="linktitle">Link Title</label>
                        <input type="text" class="form-control"
                               name="linktitle"
                               value="link"
                               id="linktitle" 
                               placeholder="Optional Link Title (e.g. Google)">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="linkurl">Link Address</label>
                        <input type="url"
                               class="form-control" 
                               name="linkurl" id="linkurl" 
                               placeholder="Optional Link Address (e.g. http://www.google.co.uk)"
                               data-error="Must be a valid hyperink">
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Create Blog">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="../bootstrap-validator-master/dist/validator.min.js"></script>
<script src="../assets/js/ddslick.js"></script>
<script src="../assets/js/createblog.js"></script>
<?php
include_layout_template("footer.php");
?>
