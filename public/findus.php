<?php
require_once("../database/initialize.php");
include_layout_template("header.php");
?>
<!--
File: findus.php

Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions

Created: 26-Jan-2016 16:41:31

Purpose: Google Directions


Modification History:

-->
<main>
    <div class="container-fluid">
        <div class="row">
             <div class="col-sm-12 col-md-1">
                <br><br>
                <a href="https://www.facebook.com/The-Plough-Ashby-De-La-Zouch-1409446652610698/"><img class="img-responsive" src="assets/images/facebook.png" alt="facebook"></a>
            </div>
           
            <div class="col-md-3 col-sm-12"><h1>Find Us</h1>           
                <br>
                <form data-toggle="validator" id="validate" role="form" action="map.html" method='post'>
                    <fieldset>
                        <legend>Your Location</legend>
                        <div class="form-group">
                            <input type="hidden" id="daddr" value="The Plough On The Green, 16 North Street, ASHBY-De-La-ZOUCH, LE65 1JU">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="saddr">Enter Your Location:</label><br>
                            <input class="form-control" type="text" placeholder="enter address or postcode" required data-error="Your Location is Required" id="saddr">
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Get Directions" id="button"><br>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="google-maps" id="mapdata">
                    &nbsp;
                </div>
            </div>
        </div> 
    </div>
</main>
<script src="bootstrap-validator-master/dist/validator.min.js"></script>
<script src="assets/js/findus.js"></script>
<?php
include_layout_template("footer.php");
?>