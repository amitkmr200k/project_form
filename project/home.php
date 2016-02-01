<?php
require("isset_session.php");
require("fetch_record.php");
require("header.php");
?>
<div class="main">
	<div class="container">
		<h1 class="h1"> 
			<img width = "150px" height="150px" src="/project/new/img/<?php echo $row['image'];?>">
			<?php
			echo "<br/>Hi, {$row['user_name']} <br/><br/> This is your profile<br/>"
			?> </h1>
			<div class="table-responsive">
				<!-- Details of the user -->			
				<table class="table table-bordered">
					<tbody>	
						<tr>
							<td class="info">User Name</td>
							<td> <?php echo $row['user_name'];?></td>
						</tr>
						<tr>
							<td class="info">First Name</td>
							<td> <?php echo $row['first_name'];?></td>
						</tr>
						<tr>
							<td class="info">Middle Name</td>
							<td> <?php echo $row['middle_name'];?></td>
						</tr>
						<tr>
							<td class="info">Last Name</td>
							<td> <?php echo $row['last_name'];?></td>
						</tr>
						<tr>
							<td class="info">Email ID</td>
							<td> <?php echo $row['email_id'];?></td>
						</tr>
						<tr>
							<td class="info">Gender</td>
							<td> <?php echo $row['gender'];?></td>
						</tr>
						<tr>
							<td class="info">Age</td>
							<td> <?php echo $row['age'];?></td>
						</tr>
						<tr>
							<td class="info">Date Of Birth</td>
							<td> <?php echo $row['dob'];?></td>
						</tr>
						<tr>
							<td class="info">Marital Status</td>
							<td> <?php echo $row['marital_status'];?></td>
						</tr>
						<tr>
							<td class="info">Employment</td>
							<td> <?php echo $row['employment'];?></td>
						</tr>
						<tr>
							<td class="info">Employer</td>
							<td> <?php echo $row['employer'];?></td>
						</tr>
						<tr>
							<td class="info">Residence Address</td>
							<td> 
								<?php echo "Street - {$row['residence_street']} <br/>"
								."City - {$row['residence_city']} <br/> "
								."State - {$row['residence_state']} <br/>" 
								."Pin Code - {$row['residence_pincode']} <br/>"
								."Contact No. - {$row['residence_contact_no']}<br/>"
								."Fax No.- {$row['residence_fax_no']}";?>
							</td>
						</tr>
						<td class="info">Permanent Address</td>
						<td> 
							<?php echo "Street - {$row['permanent_street']} <br/>"
							."City - {$row['permanent_city']} <br/> "
							."State - {$row['permanent_state']} <br/>" 
							."Pin Code - {$row['permanent_pincode']} <br/>"
							."Contact No. - {$row['permanent_contact_no']}<br/>"
							."Fax No.- {$row['permanent_fax_no']}";?>
						</td>
					</tr>
					<tr>
						<td class="info">Extra Note</td>
						<td> <?php echo stripcslashes($row['comment']);?></td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>		
<?php require("footer.php");?>
<?php
//releasing the output
mysqli_free_result($result);
?>
</body>
</html>
<?php
//close connection 
mysqli_close($connection);
?>