<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<style type="text/css">
			td{
				padding: 10px;
			}
		</style>
	</head>
	<body>
		<?php
			include 'config/conf.php';
			include 'config/redir.php';
		?>
		<form method="post">
			<table align="center">
				<tr>
					<th colspan="2">Form</th>
				</tr>
				<tr>
					<td>Name</td>
					<td>
						<input type="text" name="name">
					</td>
				</tr>
				<tr>
					<td>Age</td>
					<td>
						<input type="text" name="age">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="submit" name="submit" value="Submit">
					</td>
				</tr>
			</table>
		</form>
		<br>
		<hr>
		<br>
		<table align="center" border="1">
			<tr>
				<th colspan="4">View Form</th>
			</tr>
			<tr>
			    <td>ID</td>
			    <td>Name</td>
			    <td>Age</td>
			    <td>Options</td>
			</tr>
			<?php echo dbSelect(array('*')); ?>
		</table>
		
	</body>
</html>