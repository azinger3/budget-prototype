<?php

// Initialize site configuration
require_once('../config.inc.php');

// Initialize form values
$categoryName = NULL;
$categoryAmount = NULL;
$categoryType = NULL;
$isActive = NULL;
$sortOrder = NULL;

// Check for page postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Get user input from form
	$action = $_POST['action'];
        $categoryName = $_POST['categoryName'];
	$categoryAmount = $_POST['categoryAmount'];
	$categoryType = $_POST['categoryType'];
	$isActive = $_POST['isActive'];
	$sortOrder = $_POST['sortOrder'];

	// Execute database query
	$category = new Category();
	
	$category->categoryName = $categoryName;
	$category->categoryAmount = $categoryAmount;
	$category->categoryType = $categoryType;
	$category->isActive = $isActive;
	$category->sortOrder = $sortOrder;
	$count = $category->save();
		
	// Redirect to category page
        header('Location: ../../category.php?event=' . $action . '&result=' . $count);
}