<?php
require_once("../database/initialize.php");

// 1. the current page number ($current_page)
$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;

// 2. records per page ($per_page)
$per_page = 6;

// 3. total record count ($total_count)
$total_count = GalleryPhotos::count_all();


// Find all photos
// use pagination instead
//$photos = Photograph::find_all();

$pagination = new Pagination($page, $per_page, $total_count);

// Instead of finding all records, just find the records 
// for this page
$sql = "SELECT * FROM galleryphotos ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$photos = GalleryPhotos::find_by_sql($sql);

// Need to add ?page=$page to all links we want to 
// maintain the current page (or store $page in $session)
?>
<!--
File: gallery.php

Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions

Created: 26-Jan-2016 16:41:31

Purpose: Gallery Page


Modification History:

-->
<?php include_layout_template('header.php'); ?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>Gallery</h3>                
                Click image to leave a comment<br><br>
                <?php foreach ($photos as $photo): ?>
                    <div style="float: left; margin-left: 20px; width:200px; height:300px;">
                        <div style="margin: 0; padding: 0; border: 0; width: 200px; max-height: 275px; overflow: hidden;">
                            <a href="photo.php?id=<?php echo $photo->id; ?>">
                                <img class="img-thumbnail" src="<?php echo $photo->image_path(); ?>" alt="<?php echo 'thumbnail of ' . $photo->caption ?>">
                            </a>
                        </div>
                        <p><?php echo $photo->caption; ?></p>
                    </div>
                <?php endforeach; ?>

                <div id="pagination" style="clear: both;">
                    <?php
                    if ($pagination->total_pages() > 1) {

                        if ($pagination->has_previous_page()) {
                            echo "<a class=\"btn btn-primary\" role=\"button\" href=\"gallery.php?page=";
                            echo $pagination->previous_page();
                            echo "\"><span class='glyphicon glyphicon-circle-arrow-left'></span>&nbsp;&nbsp;Previous</a> ";
                        }

                        for ($i = 1; $i <= $pagination->total_pages(); $i++) {
                            if ($i == $page) {
                                echo " <span class=\"selected\">{$i}</span> ";
                            } else {
                                echo " <a class=\"btn btn-primary\" role=\"button\" href=\"gallery.php?page={$i}\">{$i}</a> ";
                            }
                        }

                        if ($pagination->has_next_page()) {
                            echo " <a class=\"btn btn-primary\" role=\"button\" href=\"gallery.php?page=";
                            echo $pagination->next_page();
                            echo "\">Next&nbsp;&nbsp;<span class='glyphicon glyphicon-circle-arrow-right'></span></a> ";
                        }
                    }
                    ?>
                </div>
            </div>            
        </div>
    </div>
</main>

<script src="assets/js/gallery.js"></script>
<?php
include_layout_template("footer.php");
?>