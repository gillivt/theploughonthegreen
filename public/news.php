<?php
require_once("../database/initialize.php");

// 1. the current page number ($current_page)
$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;

// 2. records per page ($per_page)
$per_page = 6;

// 3. total record count ($total_count)
$total_count = News::count_all();

$pagination = new Pagination($page, $per_page, $total_count);

// Instead of finding all records, just find the records 
// for this page
$sql = "SELECT * FROM news ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$news = News::find_by_sql($sql);

// Need to add ?page=$page to all links we want to 
// maintain the current page (or store $page in $session)


include_layout_template("header.php");
?>
<!--
File: news.php

Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions

Created: 26-Jan-2016 16:41:31

Purpose: News Page


Modification History:

-->

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-1">
                <br><br>
                <a href="https://www.facebook.com/The-Plough-Ashby-De-La-Zouch-1409446652610698/"><img class="img-responsive" src="assets/images/facebook.png" alt="facebook"></a>
            </div>
            <div class="col-sm-12 col-md-11">
                <?php foreach ($news as $newsItem): ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <h1><?php echo $newsItem->newsTitle ?></h1>
                            <img class="img-responsive" src="<?php echo $newsItem->imageURL ?>">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <h1>&nbsp;</h1>
                            <p><?php echo $newsItem->newsContent ?></p>
                            <a href="<?php echo $newsItem->linkAddress ?>"><?php echo $newsItem->linkTitle ?></a>
                        </div>
                    </div>
                <hr>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="pagination" style="clear: both;">
            <?php
            if ($pagination->total_pages() > 1) {

                if ($pagination->has_previous_page()) {
                    echo "<a class=\"btn btn-primary\" role=\"button\" href=\"news.php?page=";
                    echo $pagination->previous_page();
                    echo "\">&laquo; Previous</a> ";
                }

                for ($i = 1; $i <= $pagination->total_pages(); $i++) {
                    if ($i == $page) {
                        echo " <span class=\"selected\">{$i}</span> ";
                    } else {
                        echo " <a class=\"btn btn-primary\" role=\"button\" href=\"news.php?page={$i}\">{$i}</a> ";
                    }
                }

                if ($pagination->has_next_page()) {
                    echo " <a class=\"btn btn-primary\" role=\"button\" href=\"news.php?page=";
                    echo $pagination->next_page();
                    echo "\">Next &raquo;</a> ";
                }
            }
            ?>
        </div>



    </div>
</main>

<script src="assets/js/news.js"></script>
<?php
include_layout_template("footer.php");
?>