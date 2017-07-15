<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<title><?php echo $pageTitle ?></title>
		
	<!-- CSS file -->
	<link rel="stylesheet" type="text/css" href="includes/styles/BudgetStyles.css">
	<link rel="stylesheet" type="text/css" href="includes/styles/jmenu.css" media="screen" />
	 
	<!-- jQuery files -->
	<script type="text/javascript" src="includes/script/jquery.js"></script>
	<script type="text/javascript" src="includes/script/jquery-ui.js"></script>
	<script type="text/javascript" src="includes/script/jMenu.jquery.js"></script>

<head>
	
<body>

	<script type="text/javascript">
		
		$(document).ready(function()
				  {
					$("#adminMenu").jMenu( {
						openClick : false,
						ulWidth :'auto',
						TimeBeforeOpening : 100,
						TimeBeforeClosing : 11,
						animatedText : false,
						paddingLeft: 1,
						effects : {
							effectSpeedOpen : 150,
							effectSpeedClose : 150,
							effectTypeOpen : 'slide',
							effectTypeClose : 'slide',
							effectOpen : 'swing',
							effectClose : 'swing'
							}
						});
				});
	    
        </script>

	<div class="container">

		<ul id="adminMenu">
			
		    <li>
			<a href="index.php"><< Home</a>
		    </li>
	
		    <li>
			<a href="category.php">Categories</a>
		    </li>
	
		    <li>
			<a href="summary.php">Summaries</a>
		    </li>
		    
		    <li>
			<a href="menu.php">Menu</a>
		    </li>
		
		</ul>

	
	
	