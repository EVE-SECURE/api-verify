<?php

error_reporting(E_ALL);

// SQL Configuration Information
$sql_username = "immuta5_site";
$sql_password = "YN4RAB?C";
$sql_database = "immuta5_site";

// Root folder
$root = "/home/immuta5/public_html/";
$url  = "http://immutableproductions.com/";

// Access levels (weight values)
$blog_post_level = 3;
$blog_delete_level = 3;
$blog_update_level = 3;
$article_post_level = 3;
$article_delete_level = 3;
$blog_update_level = 3;
$project_post_level = 3;
$project_delete_level = 3;
$blog_update_level = 3;
$category_post_level = 3;
$category_delete_level = 3;
$category_update_level = 3;

include_once($root.'lib/SqlManager.php');
$sqlManager = new SqlManager($sql_username, $sql_password, $sql_database);

?>