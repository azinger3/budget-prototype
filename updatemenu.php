<?php

// Initialize site configuration
require_once('includes/config.inc.php');

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

	// Initialize form values
        $menuLinkDisplay = NULL;
        $menuLinkHref = NULL;
        $isActive = NULL;
        $sortOrder = NULL;
        $parentMenu = NULL;

	// Get id from querystring
	$id = $_GET['id'];
		
	// Check for inital page request
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                // Execute database query
                $menu = Menu::getById($id);
                                                        
                // Set form values
                $menuLinkDisplay = $menu->MenuLinkDisplay;
                $menuLinkHref = $menu->MenuLinkHref;
                $isActive = $menu->IsActive;
                $sortOrder = $menu->SortOrder;
                $parentMenu = $menu->ParentMenu;
	} 
	
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
                $menu = new Menu();
                $menu->menuId = $id;
                $menu->menuLinkDisplay = $menuLinkDisplay;
                $menu->menuLinkHref = $menuLinkHref;
                $menu->isActive = $isActive;
                $menu->sortOrder = $sortOrder;
                $menu->parentMenu = $parentMenu;
                $count = $menu->save();

                // Redirect to menu page
                header('Location: menu.php?event=' . $action . '&result=' . $count);	
	} 

} else {

	// Redirect to site root
	redirect_to('.');
}

// Title tag
$pageTitle = 'Budget Admin - Menus';

// Include page header
require_once(VIEW_PATH.'admin.header.inc.php');

// Include page view
require_once(VIEW_PATH.'updatemenu.view.php');