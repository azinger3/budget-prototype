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
					$("#indexMenu").jMenu( {
						openClick : false,
						ulWidth : '200',
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
		
		<ul  id="indexMenu">
			
			<?php foreach($navbar as $nav): ?>
			
				<li>
					<a href="<?php echo $nav->MenuLinkHref;?>"><?php echo $nav->MenuLinkDisplay;?></a>
				
				<?php
				
				$navid = $nav->MenuId;
				
				$subnav = Menu::getNavBarChildren($navid);
				
				if (count($subnav) > 0) {
					
					echo '<ul>';
					
					foreach($subnav as $sub):
					
						$subLinkDisplay = $sub->MenuLinkDisplay;
						$subLinkHref = $sub->MenuLinkHref;
					
						echo "<li><a href='$subLinkHref'>$subLinkDisplay</a></li>";
					
					endforeach;
					
					echo "</ul>";	
				} 
				
				?>
				
				</li>
				
			<?php endforeach; ?>
			
				<li><a href="admin.php">Admin >></a></li>
		</ul>


	
	
	