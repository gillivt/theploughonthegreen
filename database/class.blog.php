<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH . DS . 'class.database.php');

class Blog extends DatabaseObject {

    protected static $table_name = "blog";
    protected static $db_fields = array('id', 'blogTitle', 'blogContent', 'imageURL', 'linkTitle', 'linkAddress');
    public $id;
    public $blogTitle;
    public $blogContent;
    public $imageURL;
    public $linkTitle;
    public $linkAddress;

}