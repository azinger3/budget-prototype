	<h4>
		Update Menu
	</h4>

	<form id="updateform" method="POST" action="<?php echo sanitize_output($_SERVER['REQUEST_URI']);?>">

	<table>
		<tr>
			<td>
				<label for="menuLinkDisplay">Display Text:</label>	
			</td>
			<td>
				<input id="menuLinkDisplay" name="menuLinkDisplay" type="text" value="<?php echo sanitize_output($menuLinkDisplay); ?>" autofocus/>	
			</td>
		</tr>
		<tr>
			<td>
				<label for="menuLinkHref">Link To:</label>
			</td>
			<td>
				<input id="menuLinkHref" name="menuLinkHref" type="text" value="<?php echo sanitize_output($menuLinkHref); ?>"/>	
			</td>
		</tr>
		<tr>
			<td>
				<label for="isActive">Is Active:</label>
			</td>
			<td>
				<input id="isActive" name="isActive" type="text" value="<?php echo sanitize_output($isActive); ?>"/>	
			</td>
		</tr>
		<tr>
			<td>
				<label for="sortOrder">Sort Order:</label>	
			</td>
			<td>
				<input id="sortOrder" name="sortOrder" type="text" value="<?php echo sanitize_output($sortOrder); ?>"/>	
			</td>
		</tr>
		<tr>
			<td>
				<label for="parentMenu">Parent Menu ID:</label>	
			</td>
			<td>
				<input id="parentMenu" name="parentMenu" type="text" value="<?php echo sanitize_output($parentMenu); ?>"/>	
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td style="text-align:center" colspan=2>
				<a href="#" onclick="javascript: confirm('Are you sure you want to update this menu?'); document.getElementById('updateform').submit(); return false;">Save</a>	
				&nbsp;
				<a href="menu.php">Cancel</a>				
			</td>
		</tr>
	</table>
	
	<input type="hidden" name="action" value="update">

	</form>

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>
