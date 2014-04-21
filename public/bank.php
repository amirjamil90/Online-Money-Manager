<?php
	include("../includes/config.php");
	
	if(!empty($_SESSION["uname"]))
	{
		$uid = query("select id from accounts where uname=?",$_SESSION["uname"]);
		$uid = $uid["0"]["id"];
		if(!empty($_POST["description"]))
		{
			$uid = query("select id from accounts where uname=?",$_SESSION["uname"]);
			$uid = $uid["0"]["id"];
			query("insert into bank_transactions(id, day, type, amount, description) values(?,?,?,?,?)",$uid, $_POST["date"], $_POST["type"], $_POST["amount"], $_POST["description"]);
			$cbb = query("select bbalance from accounts where id =?",$uid);
			$cbb = $cbb["0"]["bbalance"];
			$cb = query("select balance from accounts where id = ?", $uid);
			$cb = $cb["0"]["balance"];
			if($_POST["type"]=="Deposit")
			{
				$cbb += $_POST["amount"];
				$cb -= $_POST["amount"];
			}
			else if($_POST["type"]=="Transfer")
			{
				$cbb -= $_POST["amount"];
			}
			else if($_POST["type"]=="Deduction")
			{
				$cbb -= $_POST["amount"];
			}
			else if($_POST["type"]=="Withdraw")
			{
				$cbb -= $_POST["amount"];
				$cb += $_POST["amount"];
			}
			
			query("update accounts set balance=? where id =?",$cb,$uid);
			query("update accounts set bbalance=? where id =?", $cbb, $uid);
			
		}
		$records = query("select * from bank_transactions  where id=? order by day desc",$uid);
		render("bank_transaction.php", ["title"=>"Bank transactions", "records"=>$records]);
	}
	else
	{
		render("login_form.php", ["title"=>"Log In"]);
	}
?>
