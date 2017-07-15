<?php 

// Initialize site configuration
require_once('includes/config.inc.php');

// Get section data from database
$navbar = Menu::getNavBarItems();

$currentsummary = Summary::getCurrentSummary();

$allsummaries = Summary::getAllSummaries();

$variablefunds = Category::getVariableFundsView();

$savingsfunds = Category::getSavingsBreakdownView();

// Title tag
$pageTitle = 'Budget';

// Include page header
require_once(VIEW_PATH.'index.header.inc.php');

// Include page view
require_once(VIEW_PATH.'index.view.php');