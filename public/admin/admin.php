<?php
require_once("../../database/initialize.php");
// if not logged in redirect to login page
if (!$session->is_logged_in()) {
    redirect_to("login.php");
}
include_layout_template("header.php");
// get user object
$user = User::find_by_id($session->user_id);
?>
<!--
File: admin.php

Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions

Created: 26-Jan-2016 16:41:31

Purpose: present administration options


Modification History:

-->

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Admin</h1>
                    Welcome <?php echo $user->full_name(); ?><br><br>
                    <?php echo output_message($message); ?><br><br>
                    <div class="list-group">
                        <a class="list-group-item btn-primary" href="logfile.php">View Log File</a>
                        <a class="list-group-item btn-primary" href="photo_upload.php">Upload Photo</a>
                        <a class="list-group-item btn-primary" href="list_photos.php">List Photos</a>
                        <a class="list-group-item btn-primary" href="logout.php">Log Out / Sign Off / Auf Wieder Sehen / Au Revoir / 再见 / Arrivederci / Adiós</a>
                    </div>
            </div>
        </div>
    </div>
</main>

<script src="../assets/js/admin.js"></script>
<?php
include_layout_template("footer.php");
?>