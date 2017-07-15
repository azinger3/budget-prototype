	<h4>
		Category Admin
	</h4>

	<p style="color: red; font-weight: bold">
		
	<?php if (isset($_GET['event']) && isset($_GET['result'])) {

		$event = $_GET['event'];
		$result = $_GET['result'];
		
		if($event == 'create' && $result > 0) {
			
			echo 'Category Added!';
		}
		
		if($event == 'update' && $result > 0) {
			
			echo 'Category Updated!';
		}
		
		if($event == 'delete' && $result > 0) {
			
			echo 'Category Deleted!';
		} 
	} ?>
	
	</p>

	<form id="createform" method="post" action="includes/controllers/createcategory.php">
		
		<table  border="1" cellpadding="10">
			<tr>
				<th>Category Name</th>
				<th>Category Amount</th>
				<th>Category Type</th>
				<th>Is Active</th>
				<th>Sort Order</th>
				<th>Action</th>
			</tr>
	
		<?php foreach($categories as $cat): ?>
	
			<tr>
				<td><?php echo $cat->CategoryName;?></td>
				<td><?php echo $cat->CategoryAmount;?></td>
				<td><?php echo $cat->CategoryType;?></td>
				<td><?php echo $cat->IsActive;?></td>
				<td><?php echo $cat->SortOrder;?></td>
				<td>
					<a href="updatecategory.php?id=<?php echo $cat->CategoryId; ?>">Update</a>
					<a href="includes/controllers/deletecategory.php?id=<?php echo $cat->CategoryId; ?>&action=delete" onClick="javascript: return confirm('Are you sure you want to delete this category?'); return false;">Delete</a>
				</td>
			</tr>
	
		<?php endforeach; ?>
		
			<tr>
				<td><input type="text" name="categoryName"></td>
				<td><input type="text" name="categoryAmount"></td>
				<td><input type="text" name="categoryType"></td>
				<td><input type="text" name="isActive"></td>
				<td><input type="text" name="sortOrder"></td>
				<td><a href="#" onclick="document.getElementById('createform').submit(); return false;">Add</a></td>
			</tr>
		
		</table>
		
		<input type="hidden" name="action" value="create">
	</form>	
	

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>
