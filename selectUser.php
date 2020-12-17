<?php 
	include('db_connect.php');

	$sql = 'SELECT c_name, c_balance FROM customer_details ORDER BY c_id';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Select User | Banking System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body  style="background-color:#cc99ff">
	<?php include('navbar.php'); ?>
	<section>
		<div class="wrapper">
			<form action="singleUser.php" method="POST">
				<div class="container" style="margin: 70px auto">
				<table class="highlight" >
					<tr style="color:#660066;font-weight:600">
						<th>Name</th>
						<th>Current Balance(in ₹)</th>
					</tr>
					<?php 
						foreach($customers as $customer) {
							echo "<tr><td> ".$customer['c_name']."</td><td>".$customer['c_balance']."</td></tr>";
						}
					?>
				</table>
			</div>

			<div class="container col s12" style="margin: 20px auto">

				<label  style="color:#660066;font-weight:600">Select a user</label>
				<select class="browser-default" name="name">
					<option value="" disabled selected>Choose your option</option>
					<?php 
						foreach($customers as $customer) {
							echo "<option value='".$customer['c_name']."'>".$customer['c_name']."</option>";
						}
					?> 
			</select>
			
			</div>
			<div class="center">
				<button type="submit" class="waves-effect waves-light btn z-depth-2" style="background-color:salmon; margin: 20px;color:black;font-weight:600">Submit</button>
				<a href="index.php" class="waves-effect waves-light btn black z-depth-2" style="margin: 20px;color:salmon;font-weight:600;">Home</a> 
			</div>
			
			</form>
		</div>
	</section>
	<?php include('footer.php'); ?>
</body>

</html>