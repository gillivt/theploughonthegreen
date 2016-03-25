<?php
require_once("../database/initialize.php");
/******************************************************************************
/* File: blog.php
/*
/* Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions
/*
/*Created: 26-Jan-2016 16:41:31
/*
/* Purpose: Display Blog
/*
/* Modification History:
/*
/******************************************************************************/
// 1. the current page number ($current_page)
$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;

// 2. records per page ($per_page)
$per_page = 6;

// 3. total record count ($total_count)
$total_count = Blog::count_all();

$pagination = new Pagination($page, $per_page, $total_count);

// Instead of finding all records, just find the records 
// for this page
$sql = "SELECT * FROM blog ";
$sql .= "ORDER BY date DESC ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$blog = Blog::find_by_sql($sql);

// Need to add ?page=$page to all links we want to 
// maintain the current page (or store $page in $session)
include_layout_template("header.php");
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-1">
                <br><br>
                <a href="https://www.facebook.com/The-Plough-Ashby-De-La-Zouch-1409446652610698/"><img data-toggle="tooltip" title="Find us on Facebook" class="img-responsive" src="assets/images/facebook.png" alt="facebook"></a>
            </div>
          
            <div id="blogsearch" class="col-sm-0 col-md-2">
                <?php echo output_message($message); ?>
                <form method="GET" action="blogsearch.php" role="search">
                    <div class="input-group">
                        <input data-toggle="tooltip" 
                               title="enter a blog title or part of one e.g. 'sam'" 
                               type="text" 
                               name="search" 
                               class="form-control" 
                               placeholder="Search for blog post">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form> 
                <br>
                <?php foreach ($blog as $blogEntry): ?>
                <a href="blogsearch.php?search=<?php echo $blogEntry->blogTitle ?>"><?php echo esc_quot($blogEntry->blogTitle) ?></a><br>
                <?php endforeach; ?>
            </div>
          
            <div class="col-sm-12 col-md-9">
                <?php foreach ($blog as $blogEntry): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <h1><?php echo esc_quot($blogEntry->blogTitle) ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <img class="img-responsive img-rounded" src="<?php echo WEB_ROOT.'/assets/blogimages/'.$blogEntry->imageURL ?>">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <p><?php echo nl2br(esc_quot($blogEntry->blogContent)) ?></p>
                            <a href="<?php echo $blogEntry->linkAddress ?>"><?php echo $blogEntry->linkTitle ?></a>
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
                    echo "<a class=\"btn btn-primary\" role=\"button\" href=\"blog.php?page=";
                    echo $pagination->previous_page();
                    echo "\">&laquo; Previous</a> ";
                }

                for ($i = 1; $i <= $pagination->total_pages(); $i++) {
                    if ($i == $page) {
                        echo " <span class=\"selected\">{$i}</span> ";
                    } else {
                        echo " <a class=\"btn btn-primary\" role=\"button\" href=\"blog.php?page={$i}\">{$i}</a> ";
                    }
                }

                if ($pagination->has_next_page()) {
                    echo " <a class=\"btn btn-primary\" role=\"button\" href=\"blog.php?page=";
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