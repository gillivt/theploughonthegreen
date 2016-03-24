<?php
/*
 * File: createblog.php
 * 
 * Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions
 * 
 * Created: 04-Mar-2016 20:44:55
 * 
 * Purpose: Class definition for blog database table
 * 
 * Modification History:
 * 
 */
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH . DS . 'class.database.php');

class Blog extends DatabaseObject {

    protected static $table_name = "blog";
    protected static $db_fields = array('id', 'blogTitle', 'blogContent', 'imageURL', 'linkTitle', 'linkAddress', 'date');
    public $id;
    public $blogTitle;
    public $blogContent;
    public $imageURL;
    public $linkTitle;
    public $linkAddress;
    public $date;

}