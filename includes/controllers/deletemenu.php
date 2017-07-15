<?php

// Initialize site configuration
require_once('../config.inc.php');

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
	
	// Get id from querystring
	$id = $_GET['id'];
        $action = $_GET['action'];
	
	// Execute database query
	$menus = new Menu();
	$menus->menuId = $id;
	$count = $menus->delete();	
}

// Redirect to category page
header('Location: ../../menu.php?event=' . $action . '&result=' . $count);