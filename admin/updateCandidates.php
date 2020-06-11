<?php
require('../connection.php');

session_start();
if (empty($_SESSION['admin'])) {
    header("location:index.php");
}
?>
<html>

<head>
    <?php include_once '../includes/header.php' ?>
    <?php include_once '../includes/bootstrapCss.php' ?>
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <div class="container" style="  margin-right: 11rem ; margin-left: 11rem ; margin-bottom: 19rem ; margin-top: 3rem ;">
        <div class="row text-center ">
            <h2 class="font-weight-bold mt-2">Ghana Polling System</h2>
        </div>
        <div class="row center">
           <form method="POST">
               <div class="form-group">
               <label for="">Presidential Candidate:</label>
                <select name="pres_id" class="mr-3">
						<option>Choose a name</option>
						<?php
						$can_sql = "SELECT * FROM pres_candidates";
						$run_canSql = mysqli_query($con, $can_sql);
						while ($row = mysqli_fetch_array($run_canSql)) {
							$candidate_id = $row['candidate_id'];
							$candidate_name = $row['candidate_name'];
							echo "<option value='$candidate_id'>$candidate_name</option>";
						}
						?>
					</select>
					<button class="btn" type="submit" name="view_pres">View</button>
               </div>
               <div class="form-group">
               <label for="">Parliamentary Candidate :</label>
                <select name="par_id" class="mr-3">
						<option>Choose a name</option>
						<?php
						$con_sql = "SELECT * FROM par_candidates";
						$run_conSql = mysqli_query($con, $con_sql);
						while ($row = mysqli_fetch_array($run_conSql)) {
							$candidate_id = $row['candidate_id'];
							$candidate_name = $row['candidate_name'];
							echo "<option value='$candidate_id'>$candidate_name</option>";
						}
						?>
					</select>
					<button class="btn" type="submit" name="view_par">View</button>
               </div>
           </form>  
        </div>

        <div class="row">
          <h4 class="font-weight-bold text-center mt-4">Candidate Details</h4>
          <form action="" method="post">

                <?php 
                     if(isset($_POST['view_pres'])){
                     $pres_id = $_POST['pres_id'];
                     
                    $get_candidate = "SELECT * from  pres_candidates where  candidate_id ='$pres_id'";

                    $run_candidate = mysqli_query($con,$get_candidate);
                    $row_candidate = mysqli_fetch_array($run_candidate);
                    $_SESSION['can_id'] = $row_candidate['candidate_id'];
                    
                    $name = $row_candidate['candidate_name'];
                    $img = $row_candidate['candidate_img'];
                    $party_id = $row_candidate['party_id'];
                    $position_id = $row_candidate['position_id'];

                    $party = "SELECT party_name FROM party WHERE party_id = '$party_id'";
                    $run = mysqli_query($con, $party);
                    $row = mysqli_fetch_array($run);

                    $sql = "SELECT position_name FROM positions WHERE position_id = '$position_id'";
                    $run_pos = mysqli_query($con, $sql);
                    $rows = mysqli_fetch_array($run_pos);

                    echo "
                          <form method = 'POST'>
                            <div class='form-group'>
                                <label class='font-weight-bold'>Candidate Name :</label>
                                <input type='text' name='can_name' class='form-control' value=' $name' required/>
                            </div>
                            <div class='form-group'>
                                <label class='font-weight-bold'>Candidate img:</label>
                                <input type='file' name='can_img' class='form-control' value='$img' />
                            </div>
                            <div class='form-group'>
                            <label class='font-weight-bold'>Party: </label>
                                <select name='party_id' class='form-control'>
                                    <option>$row[party_name]</option>
                            ".
                            $get_party = "SELECT * FROM party";
                            $run_get_party = mysqli_query($con, $get_party);
                            while ($my_row = mysqli_fetch_array($run_get_party)) {
                                $party_id = $my_row['party_id'];
                                $party_name = $my_row['party_name'];
                                echo "<option value='$party_id'>$party_name</option>";
                            }
                            " . ";
                    echo "
                           </select>
                           </div>
                           <div class='form-group'>
                           <label class='font-weight-bold'>Position: </label>
                               <select name='position_id' class='form-control'>
                                   <option>$rows[position_name]</option>
                           ".
                           $position = "SELECT * FROM positions";
                           $run_position = mysqli_query($con, $position);
                           while ($myRows = mysqli_fetch_array($run_position)) {
                               $position_id = $myRows['position_id'];
                               $position_name = $myRows['position_name'];
                               echo "<option value='$position_id'>$position_name</option>";
                           } "."; 
                    echo "
                            </select>
                            </div>
                            <div class='form-group'>
                                <div>
                                    <input name='update_pres' value='UPDATE' type='submit' class='btn form-control'>
                                </div>
                            </div>
                        </form>
                         ";
                    } else if(isset($_POST['view_par'])){
                        $par_id = $_POST['par_id'];
                     
                    $get_candidate = "SELECT * from  par_candidates where  candidate_id ='$par_id'";

                    $run_candidate = mysqli_query($con,$get_candidate);
                    $row_candidate = mysqli_fetch_array($run_candidate);
                    $_SESSION['can_id'] = $row_candidate['candidate_id'];
                    
                    $name = $row_candidate['candidate_name'];
                    $img = $row_candidate['candidate_img'];
                    $party_id = $row_candidate['party_id'];
                    $const_id = $row_candidate['const_id'];
                    $position_id = $row_candidate['position_id'];

                    $party = "SELECT party_name FROM party WHERE party_id = '$party_id'";
                    $run = mysqli_query($con, $party);
                    $row = mysqli_fetch_array($run);

                    $sql = "SELECT position_name FROM positions WHERE position_id = '$position_id'";
                    $run_pos = mysqli_query($con, $sql);
                    $rows = mysqli_fetch_array($run_pos);

                    
                    $const = "SELECT constituency FROM constituency WHERE const_id = '$const_id'";
                    $run_const = mysqli_query($con, $const);
                    $const_row = mysqli_fetch_array($run_const);

                    echo "
                          <form method = 'POST'>
                            <div class='form-group'>
                                <label class='font-weight-bold'>Candidate Name :</label>
                                <input type='text' name='can_name' class='form-control' value=' $name' required/>
                            </div>
                            <div class='form-group'>
                                <label class='font-weight-bold'>Candidate img:</label>
                                <input type='file' name='can_img' class='form-control' value='$img'/>
                            </div>
                            <div class='form-group'>
                            <label class='font-weight-bold'>Party: </label>
                                <select name='party_id' class='form-control'>
                                    <option>$row[party_name]</option>
                            ".
                            $get_party = "SELECT * FROM party";
                            $run_get_party = mysqli_query($con, $get_party);
                            while ($my_row = mysqli_fetch_array($run_get_party)) {
                                $party_id = $my_row['party_id'];
                                $party_name = $my_row['party_name'];
                                echo "<option value='$party_id'>$party_name</option>";
                            }
                            " . ";
                    echo "
                           </select>
                           </div>
                           <div class='form-group'>
                           <label class='font-weight-bold'>Position: </label>
                               <select name='position_id' class='form-control'>
                                   <option>$rows[position_name]</option>
                           ".
                           $position = "SELECT * FROM position";
                           $run_position = mysqli_query($con, $position);
                           while ($myRows = mysqli_fetch_array($run_position)) {
                               $position_id = $myRows['position_id'];
                               $position_name = $myRows['position_name'];
                               echo "<option value='$position_id'>$position_name</option>";
                           } "."; 
                    echo "
                            </select>
                            </div>
                            <div class='form-group'>
                            <label class='font-weight-bold'>Constituency: </label>
                                <select name='const_id' class='form-control'>
                                    <option>$const_row[constituency]</option>
                            ".
                            $get_const = "SELECT * FROM constituency";
                            $run_get_const = mysqli_query($con, $get_const);
                            while ($myRow = mysqli_fetch_array($run_get_const)) {
                                $position_id = $myRow['position_id'];
                                $position_name = $myRow['position_name'];
                                echo "<option value='$position_id'>$position_name</option>";
                            } "."; 
                    echo "
                            </select>
                            </div>
                            <div class='form-group'>
                                <div>
                                    <input name='update_par' value='UPDATE' type='submit' class='btn form-control'>
                                </div>
                            </div>
                        </form>
                         ";
                    }
                ?>
          </form>
        </div>
        <div class="row text-center">
			<a href="manage-candidates.php" class="text-dark mt-3">
				<h5 class="font-weight-bold "> <i class="fas fa-angle-double-left"></i>Go Back </h5>
			</a>
		</div>
    </div>
    <?php include_once '../includes/footer.php' ?>
    <?php include_once '../includes/bootstrapJs.php' ?>
</body>

</html>

<?php 
    if(isset($_POST['update_pres'])){
        $can_name = $_POST['can_name'];
        $partyID = $_POST['party_id'];
        $positionID = $_POST['position_id'];
        $id = $_SESSION['can_id'];
        
        $update_can = mysqli_query($con, "UPDATE pres_candidates SET candidate_name = '$can_name', party_id= '$partyID' , position_id='$positionID' where candidate_id ='$id'");
        if($update_can){
            echo "
                    <script>alert('Candidate has been updated successfully')</script>
                 ";
        }else {
            echo " <script>alert('not successful')</script>";
        }
    } elseif (isset($_POST['update_par'])) {
            $can_name = $_POST['can_name'];
            $partyID = $_POST['party_id'];
            $positionID = $_POST['position_id'];
            $constID = $_POST['const_id'];
            $id = $_SESSION['can_id'];
    
            echo $partyID;
            // $update_can = mysqli_query($con, "UPDATE par_candidates SET candidate_name = '$can_name', party_id='$partyID' ,position_id='$positionID' and const_id = '$constID' WHERE candidate_id = '$id'");
            // if($update_can){
            //     echo "
            //             <script>alert('Candidate has been updated successfully')</script>
            //          ";
            // }else {
            //     echo " <script>alert('par not successful')</script>";
            // }     
    }
?>