<?php
session_start();
include ("header.php");

if (!isset($_SESSION['uid'])) {
	echo "You must be logged in to view this page.";
} else {
	?>
	<center><h3>Your Stats</h3></center>
	<br /><br />
	<table cellpadding="3" cellspacing="5">
		<tr>
			<td>Username:</td>
			<td><i><?php echo $user['username']; ?></i></td>
		</tr>
				<tr>
			<td>Attack:</td>
			<td><i><?php echo $stats['attack']; ?></i></td>
		</tr>
				<tr>
			<td>Defense:</td>
			<td><i><?php echo $stats['defense']; ?></i></td>
		</tr>
						<tr>
			<td>Overall Rating:</td>
			<td><i><?php echo $ranking['overall']; ?></i></td>
		</tr>
		<tr><td><td></td></td></tr>
				<tr>
			<td>Gold & Income</td>
			<td><i><?php echo $stats['gold']; ?></i>g</td>
			<td>+<i><?php echo $stats['income']; ?></i></td>
		</tr>
				<tr>
			<td>Food & Farming</td>
			<td><i><?php echo $stats['food']; ?></i>f</td>
			<td>+<i><?php echo $stats['farming']; ?></i></td>
		</tr>
						<tr>
			<td>Turns:</td>
			<td><i><?php echo $stats['turns']; ?></i></td>
		</tr>
		<tr><td><td></td></td></tr>
				<tr>
			<td>Workers:</td>
			<td><i><?php echo $unit['worker']; ?></i></td>
		</tr>
						<tr>
			<td>Farmers:</td>
			<td><i><?php echo $unit['farmer']; ?></i></td>
		</tr>
						<tr>
			<td>Warriors:</td>
			<td><i><?php echo $unit['warrior']; ?></i></td>
		</tr>
						<tr>
			<td>Defenders:</td>
			<td><i><?php echo $unit['defender']; ?></i></td>
		</tr>
	</table>
	
	<?php
}

include ("footer.php");
?>