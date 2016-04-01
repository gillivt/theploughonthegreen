<?php
require_once("../database/initialize.php");
include_layout_template("header.php");

/*
 * File: menus.php
 *
 * Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions
 *
 * Created: 26-Jan-2016 16:41:31
 *
 * Purpose: Food Menus
 *
 * 
 * Modification History:
 *
 */

$menus = MenuPhotos::find_all()
        
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-1">
                <br><br>
                <a href="https://www.facebook.com/The-Plough-Ashby-De-La-Zouch-1409446652610698/"><img data-toggle="tooltip" title="Find us on Facebook" class="img-responsive" src="assets/images/facebook.png" alt="facebook"></a>
            </div>

            <div class="col-sm-12 col-md-11"><h1>Menus</h1>
            <?php foreach ($menus as $menu):?>
                <img src="<?php echo WEB_ROOT.'/assets/menuimages/'.$menu->filename; ?>">
            <?php endforeach; ?>   
            </div>            

        </div>
    </div>
</main>
        
<script src="assets/js/menus.js"></script>
<?php
include_layout_template("footer.php");
?>