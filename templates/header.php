<?php
/*
 * File: header.php
 * 
 * Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions
 * 
 * Created: 27-Jan-2016 00:22:31
 * 
 * Purpose: Header and navigation template
 * 
 * Modification History:
 * 
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="http://localhost/ThePloughOnTheGreen2/public/assets/favicons/favicon.ico">
        <title>The Plough On the Green - About Us</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css">
        <link rel="stylesheet" href="/ThePloughOntheGreen2/public/assets/css/styles.css">
        <link rel="stylesheet" href="/ThePloughOntheGreen2/public/assets/css/showhidepass.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Javascripts -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment-with-locales.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/ThePloughOnTheGreen2/public/assets/js/resizemain.js"></script>
    </head>
    <body>
        <div id="mywrapper"> 
            <header>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" 
                                    class="navbar-toggle collapsed" 
                                    data-toggle="collapse" 
                                    data-target="#collapsemenu"
                                    aria-expanded="false">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>   
                            <a href="#" class="navbar-brand">
                                <img src="/ThePloughOnTheGreen2/public/assets/images/theplough160x160.jpg" class="pull-left" alt="The Plough On The Green - Branding">
                                The Plough On The Green
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="collapsemenu">
                            <ul class="nav navbar-nav">
                                <li id="index" class="active"><a href="/ThePloughOnTheGreen2/public/index.php">About Us</a></li>
                                <li id="findus"><a href="/ThePloughOntheGreen2/public/findus.php">Find Us</a></li>
                                <li id="menus"><a href="/ThePloughOntheGreen2/public/menus.php">Menus</a></li>
                                <li id="news"><a href="/ThePloughOnTheGreen2/public/news.php">Blog</a></li>
<!--                                <li id="events"><a href="/ThePloughOnTheGreen2/public/events.php">Events</a></li>-->
                                <li id="contactus"><a href="/ThePloughOnTheGreen2/public/contactus.php">Contact Us</a></li>
                                <li id="gallery"><a href="/ThePloughOnTheGreen2/public/gallery.php">Gallery</a></li>
                            </ul>
                            <ul class="nav navbar-nav pull-right">
                                <li id="admin"><a href="/ThePloughOnTheGreen2/public/admin/admin.php">Admin</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>


