<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH . DS . 'database.php');

class News extends DatabaseObject {

    protected static $table_name = "news";
    protected static $db_fields = array('id', 'newsTitle', 'newsContent', 'imageURL', 'linkTitle', 'linkAddress');
    public $id;
    public $newsTitle;
    public $newsContent;
    public $imageURL;
    public $linkTitle;
    public $linkAddress;

}