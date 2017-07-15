<?php 

// Initialize site configuration
require_once('includes/config.inc.php');

// Get summaries from database
$summaries = Summary::getAll();

// Title tag
$pageTitle = 'Budget Admin - Summaries';

// Include page header
require_once(VIEW_PATH.'admin.header.inc.php');

// Include page view
require_once(VIEW_PATH.'summary.view.php');