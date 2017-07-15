
	<h4>
		Update Category
	</h4>

	<form id="updateform" method="POST" action="<?php echo sanitize_output($_SERVER['REQUEST_URI']);?>">

	<table>
		<tr>
			<td>
				<label for="categoryName">Category Name:</label>	
			</td>
			<td>
				<input id="categoryName" name="categoryName" type="text" value="<?php echo sanitize_output($categoryName); ?>" autofocus/>	
			</td>
		</tr>
		<tr>
			<td>
				<label for="categoryAmount">Category Amount:</label>	
			</td>
			<td>
				<input id="categoryAmount" name="categoryAmount" type="text" value="<?php echo sanitize_output($categoryAmount); ?>"/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="categoryType">Category Type:</label>
			</td>
			<td>
				<input id="categoryType" name="categoryType" type="text" value="<?php echo sanitize_output($categoryType); ?>"/>	
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
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td style="text-align:center" colspan=2>
				<a href="#" onclick="javascript: confirm('Are you sure you want to update this category?'); document.getElementById('updateform').submit(); return false;">Save</a>
				&nbsp;
				<a href="category.php">Cancel</a>
			</td>
		</tr>
	</table>
	
	<input type="hidden" name="action" value="update">

	</form>

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>