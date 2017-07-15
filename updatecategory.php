<?php

// Initialize site configuration
require_once('includes/config.inc.php');

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

	// Initialize form values
	$categoryName = NULL;
        $categoryAmount = NULL;
        $categoryType = NULL;
        $isActive = NULL;
        $sortOrder = NULL;

	// Get id from querystring
	$id = $_GET['id'];
		
	// Check for inital page request
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                // Execute database query
                $category = Category::getById($id);
                                                        
                // Set form values
                $categoryName = $category->CategoryName;
                $categoryAmount = $category->CategoryAmount;
                $categoryType = $category->CategoryType;
                $isActive = $category->IsActive;
                $sortOrder = $category->SortOrder;
	} 
	
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
                $category->categoryId = $id;
                $category->categoryName = $categoryName;
                $category->categoryAmount = $categoryAmount;
                $category->categoryType = $categoryType;
                $category->isActive = $isActive;
                $category->sortOrder = $sortOrder;
                $count = $category->save();

                // Redirect to category page
                header('Location: category.php?event=' . $action . '&result=' . $count);	
	} 

} else {

	// Redirect to site root
	redirect_to('.');	
}

// Title tag
$pageTitle = 'Budget Admin - Categories';

// Include page header
require_once(VIEW_PATH.'admin.header.inc.php');

// Include page view
require_once(VIEW_PATH.'updatecategory.view.php');