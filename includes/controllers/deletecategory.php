<?php

// Initialize site configuration
require_once('../config.inc.php');

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
	
	// Get id from querystring
	$id = $_GET['id'];
        $action = $_GET['action'];
	
	// Execute database query
	$category = new Category();
	$category->categoryId = $id;
	$count = $category->delete();	
}

// Redirect to category page
header('Location: ../../category.php?event=' . $action . '&result=' . $count);