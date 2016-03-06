<?php
require_once("../../database/initialize.php");
// if not logged in redirect to login page
if (!$session->is_logged_in()) {
    redirect_to("login.php");
}
/******************************************************************************
/* File: admin.php
/*
/* Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions
/*
/* Created: 26-Jan-2016 16:41:31
/*
/* Purpose: present administration options
/*
/* Modification History:
/******************************************************************************/
include_layout_template("header.php");
// get user object
$user = User::find_by_id($session->user_id);
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Admin</h1>
                    Welcome <?php echo $user->full_name(); ?><br><br>
                    <?php echo output_message($message); ?><br><br>
                    <div class="list-group">
                        <a class="list-group-item list-group-item-info" href="logfile.php">View Log File</a>
                        <a class="list-group-item list-group-item-info" href="galleryphotoupload.php">Upload Photo To Gallery</a>
                        <a class="list-group-item list-group-item-info" href="listgalleryphotos.php">List Gallery Photos</a>
                        <a class="list-group-item list-group-item-info" href="blogphotupload.php">Upload Photo to Blog Photo Library</a>
                        <a class="list-group-item list-group-item-info" href="listblogphotos.php">List Blog Photo Library</a>
                        <a class="list-group-item list-group-item-info" href="createblog.php">Create Blog Entry</a>
                        <a class="list-group-item list-group-item-info" href="logout.php">Log Out / Sign Off / Auf Wieder Sehen / Au Revoir / 再见 / Arrivederci / Adiós</a>
                    </div>
            </div>
        </div>
    </div>
</main>

<script src="../assets/js/admin.js"></script>
<?php
include_layout_template("footer.php");
?>