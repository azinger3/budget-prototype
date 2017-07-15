
	<h4>
		Update Summary
	</h4>

	<form id="updateform" method="POST" action="<?php echo sanitize_output($_SERVER['REQUEST_URI']);?>">

	<table>
		<tr>
			<td>
				<label for="summaryLinkDisplay">Display Text:</label>	
			</td>
			<td>
				<input id="summaryLinkDisplay" name="summaryLinkDisplay" type="text" value="<?php echo sanitize_output($summaryLinkDisplay); ?>" autofocus/>	
			</td>
		</tr>
		<tr>
			<td>
				<label for="summaryLinkHref">Link To:</label>
			</td>
			<td>
				<input id="summaryLinkHref" name="summaryLinkHref" type="text" value="<?php echo sanitize_output($summaryLinkHref); ?>"/>	
			</td>
		</tr>
		<tr>
			<td>
				<label for="isCurrent">Is Current:</label>
			</td>
			<td>
				<input id="isCurrent" name="isCurrent" type="text" value="<?php echo sanitize_output($isCurrent); ?>"/>	
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
				<a href="#" onclick="javascript: confirm('Are you sure you want to update this summary?'); document.getElementById('updateform').submit(); return false;">Save</a>
				&nbsp;
				<a href="summary.php">Cancel</a>
			</td>
		</tr>
	</table>
	
	<input type="hidden" name="action" value="update">

	</form>

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>