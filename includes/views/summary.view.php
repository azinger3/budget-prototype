	<h4>
		Summary Admin
	</h4>

	<p style="color: red; font-weight: bold">
		
	<?php if (isset($_GET['event']) && isset($_GET['result'])) {

		$event = $_GET['event'];
		$result = $_GET['result'];
		
		if($event == 'create' && $result > 0) {
			
			echo 'Summary Added!';
		}
		
		if($event == 'update' && $result > 0) {
			
			echo 'Summary Updated!';
		}
		
		if($event == 'delete' && $result > 0) {
			
			echo 'Summary Deleted!';
		} 
	} ?>
	
	</p>

	<form id="createform" method="post" action="includes/controllers/createsummary.php">
		
		<table  border="1" cellpadding="10">
			<tr>
				<th>Display Text</th>
				<th>Link To</th>
				<th>Is Current</th>
				<th>Sort Order</th>
				<th>Action</th>
			</tr>
	
		<?php foreach($summaries as $sum): ?>
	
			<tr>
				<td><?php echo $sum->SummaryLinkDisplay;?></td>
				<td><?php echo $sum->SummaryLinkHref;?></td>
				<td><?php echo $sum->IsCurrent;?></td>
				<td><?php echo $sum->SortOrder;?></td>
				<td>
					<a href="updatesummary.php?id=<?php echo $sum->SummaryId; ?>">Update</a>
					<a href="includes/controllers/deletesummary.php?id=<?php echo $sum->SummaryId; ?>&action=delete" onClick="javascript: return confirm('Are you sure you want to delete this summary?'); return false;">Delete</a>
				</td>
			</tr>
	
		<?php endforeach; ?>
		
			<tr>
				<td><input type="text" name="summaryLinkDisplay"></td>
				<td><input type="text" name="summaryLinkHref"></td>
				<td><input type="text" name="isCurrent"></td>
				<td><input type="text" name="sortOrder"></td>
				<td><a href="#" onclick="document.getElementById('createform').submit(); return false;">Add</a></td>
			</tr>
		
		</table>
		
		<input type="hidden" name="action" value="create">
	</form>	
	

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>
