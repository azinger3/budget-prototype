<?php

// Initialize site configuration
require_once('../config.inc.php');

// Initialize form values
$summaryLinkDisplay = NULL;
$summaryLinkHref = NULL;
$isCurrent = NULL;
$sortOrder = NULL;

// Check for page postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Get user input from form
	$action = $_POST['action'];
        $summaryLinkDisplay = $_POST['summaryLinkDisplay'];
	$summaryLinkHref = $_POST['summaryLinkHref'];
	$isCurrent = $_POST['isCurrent'];
	$sortOrder = $_POST['sortOrder'];

	// Execute database query
	$summaries = new Summary();
	
	$summaries->summaryLinkDisplay = $summaryLinkDisplay;
	$summaries->summaryLinkHref = $summaryLinkHref;
	$summaries->isCurrent = $isCurrent;
	$summaries->sortOrder = $sortOrder;
	$count = $summaries->save();
		
	// Redirect to category page
        header('Location: ../../summary.php?event=' . $action . '&result=' . $count);
}