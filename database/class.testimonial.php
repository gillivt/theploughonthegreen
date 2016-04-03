<?php
/*
 * File: class.tetimonial.php
 * 
 * Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions
 * 
 * Created: 04-Mar-2016 20:44:55
 * 
 * Purpose: Class definition for testimonials table
 * 
 * Modification History:
 * 
 */
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH . DS . 'class.database.php');

class Testimonial extends DatabaseObject {

    protected static $table_name = "testimonials";
    protected static $db_fields = array('id', 'title', 'name', 'comment', 'date');
    public $id;
    public $title;
    public $name;
    public $comment;
    public $date;
}