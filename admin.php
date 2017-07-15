<?php 

// Initialize site configuration
require_once('includes/config.inc.php');

// Title tag
$pageTitle = 'Budget Admin';

// Include page header	
require_once(VIEW_PATH.'admin.header.inc.php');

// Include page view
require_once(VIEW_PATH.'admin.view.php');