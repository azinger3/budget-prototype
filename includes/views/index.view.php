		<h4>
			Savings Breakdown
		</h4>
		
		<table>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td>
					<table border="1" cellpadding="10">
						<tr>
							
							<?php foreach($savingsfunds as $sf): ?>
							
							<td><?php
								
								$savname = $sf->CategoryName;
								$savsortf = $sf->SortOrder;
								
								if ($savsortf == 999) {
									echo "<b>$savname</b>";
									
								} else {
									echo $savname;
									
								}
							
							?></td>
							
							<?php endforeach; ?>
							
						</tr>
						<tr>
							<?php foreach($savingsfunds as $sa): ?>
							
							<td><?php
								
								$savamt = $sa->CategoryAmount;
								$savsorta = $sa->SortOrder;
								
								if ($savsorta == 999) {
									echo "<b>$$savamt</b>";
									
								} else {
									echo "$" . $savamt;
									
								}
							
							?></td>
							
							<?php endforeach; ?>
						</tr>	
					</table>
				</td>
				
			</tr>
		</table>

		<h4>
			Budget Summaries
		</h4>
		
		<table>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td><a href="<?php echo $currentsummary->SummaryLinkHref;?>"><b><?php echo $currentsummary->SummaryLinkDisplay;?></b></a></td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>
						<table>
							<tr>
								<td>Remaining Variable Funds</td>
							</tr>
						</table>
						<table border="1" cellpadding="10">
							<tr>
								
								<?php foreach($variablefunds as $vf): ?>
								
								<td><?php
									
									$name = $vf->CategoryName;
									$sortf = $vf->SortOrder;
									
									if ($sortf == 99) {
										echo "<b>$name</b>";
										
									} else {
										echo $name;
										
									}
								
								?></td>
								
								<?php endforeach; ?>
								
							</tr>
							<tr>
								<?php foreach($variablefunds as $va): ?>
								
								<td><?php
									
									$amt = $va->CategoryAmount;
									$sorta = $va->SortOrder;
									
									if ($sorta == 99) {
										echo "<b>$$amt</b>";
										
									} else {
										echo "$" . $amt;
										
									}
								
								?></td>
								
								<?php endforeach; ?>
							</tr>
						</table>
						
						
						
					</td>
				</tr>
				
			<?php foreach($allsummaries as $allsum): ?>
				
			<tr>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td><a href="<?php echo $allsum->SummaryLinkHref;?>"><?php echo $allsum->SummaryLinkDisplay;?></a></td>
			</tr>
			
			<?php endforeach; ?>
			
		</table>
			
<?php require_once(VIEW_PATH.'footer.inc.php'); ?>
