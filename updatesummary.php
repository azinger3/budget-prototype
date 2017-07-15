<?php

// Initialize site configuration
require_once('includes/config.inc.php');

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

	// Initialize form values
        $summaryLinkDisplay = NULL;
        $summaryLinkHref = NULL;
        $isCurrent = NULL;
        $sortOrder = NULL;

	// Get id from querystring
	$id = $_GET['id'];
		
	// Check for inital page request
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                // Execute database query
                $summary = Summary::getById($id);
                                                        
                // Set form values
                $summaryLinkDisplay = $summary->SummaryLinkDisplay;
                $summaryLinkHref = $summary->SummaryLinkHref;
                $isCurrent = $summary->IsCurrent;
                $sortOrder = $summary->SortOrder;
	} 
	
	// Check for page postback
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
                // Get user input from form
                $action = $_POST['action'];
                $summaryLinkDisplay = $_POST['summaryLinkDisplay'];
                $summaryLinkHref = $_POST['summaryLinkHref'];
                $isCurrent = $_POST['isCurrent'];
                $sortOrder = $_POST['sortOrder'];
                
                // Execute database query
                $summary = new Summary();
                $summary->summaryId = $id;
                $summary->summaryLinkDisplay = $summaryLinkDisplay;
                $summary->summaryLinkHref = $summaryLinkHref;
                $summary->isCurrent = $isCurrent;
                $summary->sortOrder = $sortOrder;
                $count = $summary->save();

                // Redirect to category page
                header('Location: summary.php?event=' . $action . '&result=' . $count);	
	} 

} else {

	// Redirect to site root
	redirect_to('.');	
}

// Title tag
$pageTitle = 'Budget Admin - Summaries';

// Include page header
require_once(VIEW_PATH.'admin.header.inc.php');

// Include page view
require_once(VIEW_PATH.'updatesummary.view.php');