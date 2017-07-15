<?php

// Initialize site configuration
require_once('../config.inc.php');

// Initialize form values
$menuLinkDisplay = NULL;
$menuLinkHref = NULL;
$isActive = NULL;
$sortOrder = NULL;

// Check for page postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Get user input from form
	$action = $_POST['action'];
        $menuLinkDisplay = $_POST['menuLinkDisplay'];
	$menuLinkHref = $_POST['menuLinkHref'];
	$isActive = $_POST['isActive'];
	$sortOrder = $_POST['sortOrder'];
        $parentMenu = $_POST['parentMenu'];

	// Execute database query
	$menus = new Menu();
	
	$menus->menuLinkDisplay = $menuLinkDisplay;
	$menus->menuLinkHref = $menuLinkHref;
	$menus->isActive = $isActive;
	$menus->sortOrder = $sortOrder;
        $menus->parentMenu = $parentMenu;
	$count = $menus->save();
		
	// Redirect to category page
        header('Location: ../../menu.php?event=' . $action . '&result=' . $count);
}