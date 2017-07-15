	<h4>
		Menu Admin
	</h4>

	<p style="color: red; font-weight: bold">
		
	<?php if (isset($_GET['event']) && isset($_GET['result'])) {

		$event = $_GET['event'];
		$result = $_GET['result'];
		
		if($event == 'create' && $result > 0) {
			
			echo 'Menu Added!';
		}
		
		if($event == 'update' && $result > 0) {
			
			echo 'Menu Updated!';
		}
		
		if($event == 'delete' && $result > 0) {
			
			echo 'Menu Deleted!';
		} 
	} ?>
	
	</p>

	<form id="createform" method="post" action="includes/controllers/createmenu.php">
		
		<table  border="1" cellpadding="10">
			<tr>
				<th>Menu ID</th>
				<th>Display Text</th>
				<th>Link To</th>
				<th>Is Active</th>
				<th>Sort Order</th>
				<th>Parent Menu ID</th>
				<th>Action</th>
			</tr>
	
		<?php foreach($menus as $m): ?>
	
			<tr>
				<td><?php echo $m->MenuId;?></td>
				<td><?php echo $m->MenuLinkDisplay;?></td>
				<td><?php echo $m->MenuLinkHref;?></td>
				<td><?php echo $m->IsActive;?></td>
				<td><?php echo $m->SortOrder;?></td>
				<td><?php echo $m->ParentMenu;?></td>
				<td>
					<a href="updatemenu.php?id=<?php echo $m->MenuId; ?>">Update</a>
					<a href="includes/controllers/deletemenu.php?id=<?php echo $m->MenuId; ?>&action=delete" onClick="javascript: return confirm('Are you sure you want to delete this menu?'); return false;">Delete</a>
				</td>
			</tr>
	
		<?php endforeach; ?>
		
			<tr>
				<td></td>
				<td><input type="text" name="menuLinkDisplay"></td>
				<td><input type="text" name="menuLinkHref"></td>
				<td><input type="text" name="isActive"></td>
				<td><input type="text" name="sortOrder"></td>
				<td><input type="text" name="parentMenu"></td>
				<td><a href="#" onclick="document.getElementById('createform').submit(); return false;">Add</a></td>
			</tr>
		
		</table>
		
		<input type="hidden" name="action" value="create">
	</form>	
	

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>
