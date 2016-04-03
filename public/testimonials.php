<?php
require_once("../database/initialize.php");
include_layout_template("header.php");

/* File: testimonials.php
 *
 * Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions
 *
 * Created: 26-Jan-2016 16:41:31
 * 
 * Purpose: Testimonial Page
 *
 * Modification History:
 *
 * 
 */
// Get testimonials date descending
$sql = "SELECT * FROM testimonials ";
$sql .= "ORDER BY date DESC ";
$testimonials = Testimonial::find_by_sql($sql);
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-1">
                <br><br>
                <a href="https://www.facebook.com/The-Plough-Ashby-De-La-Zouch-1409446652610698/"><img data-toggle="tooltip" title="Find us on Facebook" class="img-responsive" src="assets/images/facebook.png" alt="facebook"></a>
            </div>
            <div class="col-sm-12 col-md-11 text"><h2>Customer Comments</h2>
                <?php echo output_message($message); ?>
                Please Leave you comments on our 'Contact Us' page.<br><br>
                <?php foreach ($testimonials as $testimonial):?>
                <span style="color:red;"><?php echo esc_quot($testimonial->title); ?></span>
                <br>
                <?php echo nl2br(esc_quot($testimonial->comment)); ?>
                <br>
                <span style="color:blue;"><?php echo esc_quot($testimonial->name); ?></span>
                <br>
                <?php echo date('jS F Y',strtotime($testimonial->date)); ?>
                <hr>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<script src="assets/js/testimonials.js"></script>
<?php
include_layout_template("footer.php");
?>