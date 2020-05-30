<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once '../includes/header.php' ?>
	<?php include_once '../includes/bootstrapCss.php' ?>
</head>

<body>
	<?php include_once '../includes/navbar.php' ?>
	<?php include('../connection.php') ?>

	<div class="container ">

		<div class="row text-center">
			<h2 class="font-weight-bold my-3">View ongoing Election</h2>
		</div>
		<div class="row center">
			<form action="" method="POST" class="px-5">
				<div>
					<label style=" margin-top: 20px; margin-right: 14rem" class="myLabel">Presidential Election</label>
					<button class="btn  mb-0" type="submit" name="per_view"> View</button>
				</div>
				<div>
					<label for="" class="mr-3">Parliamentary Election</label>
					<select name="constituency" class="mr-3">
						<option>Select a constituency</option>
						<?php
						$con_sql = "SELECT * FROM constituency";
						$run_conSql = mysqli_query($con, $con_sql);
						while ($row = mysqli_fetch_array($run_conSql)) {
							$const_id = $row['const_id'];
							$constituency = $row['constituency'];
							echo "<option value='$const_id'>$constituency</option>";
						}
						?>
					</select>
					<button class="btn" type="submit" name="view">View</button>
				</div>
			</form>
		</div>
		<div class="row center mt-5">
			<h4 class="font-weight-bold text-center">Results</h4>
			<table class="table-striped my-4">
				<thead>
					<tr>
						<th>Candidate</th>
						<th>Party</th>
						<th>Votes</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($_POST['per_view'])) {
						$results = "SELECT * from pres_candidates";
						$run_results = mysqli_query($con, $results);
						while ($myRow = mysqli_fetch_array($run_results)) {
							$name = $myRow['candidate_name'];
							$party = $myRow['party_id'];
							$can_votes = $myRow['candidate_votes'];
							$vote = ($can_votes / 25) * 100;


							$run_id = "SELECT * FROM party WHERE party_id = '$party'";
							$run = mysqli_query($con, $run_id);
							$array = mysqli_fetch_array($run);
							echo "
								<tr>
								  <td>$name</td>
								  <td class='font-weight-bold'> " . $array['party_name'] . "&nbsp;&nbsp; <img style='width: 50px; height: 50px' src='images/$array[party_logo]' /></td>
								  <td>$vote%</td>
								</tr>
					         	 ";
						}
					} else if (isset($_POST['view'])) {
						$const = $_POST['constituency'];

						$results = "SELECT * FROM par_candidates WHERE const_id = '$const'";
						$run_results = mysqli_query($con, $results);
						while ($myRow = mysqli_fetch_array($run_results)) {
							$name = $myRow['candidate_name'];
							$party = $myRow['party_id'];
							$can_votes = $myRow['candidate_votes'];
							$vote = ($can_votes / 2500) * 100;

							$run_id = "SELECT * FROM party WHERE party_id = '$party'";
							$run = mysqli_query($con, $run_id);
							$array = mysqli_fetch_array($run);
							echo "
								<tr>
								  <td>$name</td>
								  <td class='font-weight-bold'> " . $array['party_name'] . "&nbsp;&nbsp; <img style='width: 50px; height: 50px' src='images/" . $array['party_logo'] . "' /></td>
								  <td>$vote%</td>
								</tr>
					         	 ";
						}
					}
					?>
				</tbody>
			</table>
		</div>
		<div class="row text-center">
			<a href="admin.php" class="text-dark mt-3">
				<h5 class="font-weight-bold "> <i class="fas fa-angle-double-left"></i>Go Back </h5>
			</a>
		</div>
	</div>

	<?php include_once '../includes/footer.php' ?>
	<?php include_once '../includes/bootstrapJs.php' ?>
</body>

</html>