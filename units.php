<?php
session_start();
include ("../includes/header.php");

if (!isset($_SESSION['uid'])) {
	echo "You must be logged in to view this page.";
} else {
	if(isset($_POST['train'])){
		$worker = protect($_POST['worker']);
		$farmer = protect($_POST['farmer']);
		$warrior = protect($_POST['warrior']);
		$defender = protect($_POST['defender']);
		$food_needed = (10 * $worker) + (10 * $farmer) + (10 * $warrior) + (10 * $defender);
		if($worker < 0 || $farmer < 0 || $warrior < 0 || $defender < 0){
			output("You must train a positive number of units!");
		}elseif($stats['food'] < $food_needed){
			output("You do not have enough food for those units!");
		}else{
			$unit['worker'] += $worker;
			$unit['farmer'] += $farmer;
			$unit['warrior'] += $warrior;
			$unit['defender'] += $defender;
			
			$update_unit = mysql_query("UPDATE `unit` SET 
			`worker`='".$unit['worker']."',
			`farmer`='".$unit['farmer']."',
			`warrior`='".$unit['warrior']."',
			`defender`='".$unit['defender']."'
			WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			
			$stats['food'] -= $food_needed;
			$update_food = mysql_query("UPDATE `stats` SET 
			`food`='".$stats['food']."'
			WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			
			include("update_stats.php");
			output("You have trained your units at the cost of ".$food_needed." food!");
		}
	}elseif(isset($_POST['untrain'])){
		$worker = protect($_POST['worker']);
		$farmer = protect($_POST['farmer']);
		$warrior = protect($_POST['warrior']);
		$defender = protect($_POST['defender']);
		$food_gained = (8 * $worker) + (8 * $farmer) + (8 * $warrior) + (8 * $defender);
		if($worker < 0 || $farmer < 0 || $warrior < 0 || $defender < 0){
			output("You must untrain a positive number of units!");
		}elseif($worker > $unit['worker'] || $farmer > $unit['farmer'] || $warrior > $unit['warrior'] || $defender > $unit['defender']){
			output("You do not have that many units!");
		}else{
			$unit['worker'] -= $worker;
			$unit['farmer'] -= $farmer;
			$unit['warrior'] -= $warrior;
			$unit['defender'] -= $defender;
			
			$update_unit = mysql_query("UPDATE `unit` SET 
			`worker`='".$unit['worker']."',
			`farmer`='".$unit['farmer']."',
			`warrior`='".$unit['warrior']."',
			`defender`='".$unit['defender']."'
			WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			
			$stats['food'] += $food_gained;
			$update_food = mysql_query("UPDATE `stats` SET 
			`food`='".$stats['food']."'
			WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			
			include("update_stats.php");
			output("You have UNTRAINED your units and gained ".$food_gained." food!");
		}
		}

?>
<center>
	<h3>Your Units</h3>
	Your Food: <?php echo $stats['food']; ?>
</center>
<br />
Units can be trained and untrained here.
<br />
<br />
<form action="units.php" method="post">
	<table cellpadding="5" cellspacing="5">
		<tr>
			<td><b>Unit Type</b></td>
			<td><b>Number of Units</b></td>
			<td><b>Unit Cost</b></td>
			<td><b>Train More</b></td>
		</tr>
		<tr>
			<td>Worker</td>
			<td><?php echo number_format($unit['worker']); ?></td>
			<td>10 food</td>
			<td>
			<input type="text" name="worker" />
			</td>
		</tr>
		<tr>
			<td>Farmer</td>
			<td><?php echo number_format($unit['farmer']); ?></td>
			<td>10 food</td>
			<td>
			<input type="text" name="farmer" />
			</td>
		</tr>
		<tr>
			<td>Warrior</td>
			<td><?php echo number_format($unit['warrior']); ?></td>
			<td>10 food</td>
			<td>
			<input type="text" name="warrior" />
			</td>
		</tr>
		<tr>
			<td>Defender</td>
			<td><?php echo number_format($unit['defender']); ?></td>
			<td>10 food</td>
			<td>
			<input type="text" name="defender" />
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" name="train" value="Train!"</td>
			</tr>
			</table>
			</form>
			<hr>
			<form action="units.php" method="post">
			<table cellpadding="5" cellspacing="5">
			<tr>
			<td><b>Unit Type</b></td>
			<td><b>Number of Units</b></td>
			<td><b>Refund</b></td>
			<td><b>Untrain</b></td>
		</tr>
		<tr>
		<td>Worker</td>
		<td><?php echo number_format($unit['worker']); ?></td>
		<td>8 food</td>
		<td><input type="text" name="worker" /></td>
		</tr>
		<tr>
		<td>Farmer</td>
		<td><?php echo number_format($unit['farmer']); ?></td>
		<td>8 food</td>
		<td><input type="text" name="farmer" /></td>
		</tr>
		<tr>
		<td>Warrior</td>
		<td><?php echo number_format($unit['warrior']); ?></td>
		<td>8 food</td>
		<td><input type="text" name="warrior" /></td>
		</tr>
		<tr>
		<td>Defender</td>
		<td><?php echo number_format($unit['defender']); ?></td>
		<td>8 food</td>
		<td><input type="text" name="defender" /></td>
		</tr>
		<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><input type="submit" name="untrain" value="Untrain!"</td>
		</tr>
	</table>
</form>
<?php
}

include ("../includes/footer.php");
?>