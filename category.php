<?php 

// Initialize site configuration
require_once('includes/config.inc.php');

// Get categories from database
$categories = Category::getAll();

// Title tag
$pageTitle = 'Budget Admin - Categories';

// Include page header
require_once(VIEW_PATH.'admin.header.inc.php');

// Include page view
require_once(VIEW_PATH.'category.view.php');