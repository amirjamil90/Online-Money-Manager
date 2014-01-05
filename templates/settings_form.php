<script type="text/javascript">
function isValidDate(date_val)
{
        var matches = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(date_val);

        if (matches == null)
         {
            alert("Enter Date of birth in YYYY-MM-DD format")
            return false;
         }
         return true;
}

function checkDates() {
  var to = document.getElementsByName('date2')[0].value;
  var from = document.getElementsByName('date1')[0].value;
  var curdate=new Date();
  if(to>curdate||to<from||from==''||to==''||!isValidDate(to)||!isValidDate(from))
  {
  	alert('Please verify dates!');
  	return false;
  }
}
</script>
<div class='content'>
<table class='table table-striped table-bordered' style="width:1200px;margin-left:auto;margin-right:auto">
	<tr>
		<td style="width:200px">
			<?php require("../templates/member_menu.php") ?>
		</td>
		<td>
			<table class='table table-bordered'>
				<tr>
					<td>
						<h4>
							Add Category
						</h4>
					</td>
				</tr>
				<tr>
					<td>
						<form action='settings.php' method='POST'>
							<input type='text' name='category' placeholder='Category' required=''/>
							<input class='btn' type='submit' value='Add'>
						</form>
					</td>
				</tr>
				<tr>
					<td>
						<h4>
							Change Password
						</h4>
					</td>
				</tr>
				<tr>
					<td>
						<form action="settings.php" method='POST'>
							<input type='password' name='passwd1' placeholder='New Password' required=''/>
							<input type='password' name='passwd2' placeholder='Confirm Password' required=''/>
							<input class='btn' type='submit' value='Change'>
						</form>
					</td>
				</tr>
				<tr>
					<td>
						<h4>
							Record Range
						</h4>
					</td>
				</tr>
				<tr>
					<td>
						<form action='settings.php' method='POST' onsubmit="return checkDates()">
							<input type='date' name='date1' value="<?=$values['start']?>">
							<input type='date' name='date2' value="<?=$values['end']?>">
							<input type='submit' class='btn' value='Update'>
						</form>
					</td>
				</tr>
				<?php 
		if(!empty($values["message"]))
		{
		?>
			<tr>
				<td style="color:green; font-size:18">
					<?=$values["message"]?>
				</td>
			</tr>
		<?php
		}
	?>
	<?php 
		if(!empty($values["error"]))
		{
		?>
			<tr>
				<td style="color:red; font-size:18">
					<?=$values["error"]?>
				</td>
			</tr>
		<?php
		}
	?>
				
			</table>
		</td>
	</tr>
	
					
</table>
</div>