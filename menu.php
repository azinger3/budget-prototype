<?php 
// Initialize site configuration
require_once('includes/config.inc.php');

// Get menus from database
$menus = Menu::getAll();

// Title tag
$pageTitle = 'Budget Admin - Menus';

// Include page header
require_once(VIEW_PATH.'admin.header.inc.php');

// Include page view
require_once(VIEW_PATH.'menu.view.php');