<div class='content'>
<table class='table table-striped table-bordered' style="width:1200px;margin-left:auto;margin-right:auto;height:100%">
	<tr>
		<td style="width:200px">
			<?php require("../templates/member_menu.php") ?>
		</td>
		<td>
			<table style="width:900px;">
				<tr>
					<td>
					<h3>Statistics </h3>
					</td>
				</tr>
				<tr>
					<td>
						<h4>Statisitics from <?=$values["start"]?> to <?=$values["end"]?></h4>
					</td>
				</tr>
				<tr>
					<td style="text-align:center">
						<table class='table table-striped table-bordered' style="margin-left:auto;margin-right:auto;font-size:20">
							<tr>
								<td>
									Total Expense
								</td>
								<td>
									<?=$values["total"]?>
								</td>
							</tr>
							<tr>
								<td>
									Days Elapsed
								</td>
								<td>
									<?=$values["days"]?>
								</td>
							</tr>
							<tr>
								<td>
									Average Daily Expense
								</td>
								<td>
									<?=round($values["average"],2)?>
								</td>
							</tr>
							<tr>
								<td>
									Current Balance
								</td>
								<td>
									<?=round($values["cb"],2)?>
								</td>
							</tr>
							<tr>
								<td>
									Current Bank Balance
								</td>
								<td>
									<?=round($values["cbb"],2)?>
								</td>
							</tr>
							
						</table>
					</td>
				</tr>
				
			</table>
		</td>
	</tr>
</table>
</div>
