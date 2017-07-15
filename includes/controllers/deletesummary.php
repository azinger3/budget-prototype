<?php

// Initialize site configuration
require_once('../config.inc.php');

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
	
	// Get id from querystring
	$id = $_GET['id'];
        $action = $_GET['action'];
	
	// Execute database query
	$summaries = new Summary();
	$summaries->summaryId = $id;
	$count = $summaries->delete();	
}

// Redirect to category page
header('Location: ../../summary.php?event=' . $action . '&result=' . $count);