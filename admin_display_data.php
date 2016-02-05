<?php
//error_reporting(0); 
require ('connection.php');
$page = $_POST['page']; 
$limit = $_POST['rows']; 
$sidx = $_POST['sidx']; 
$sord = $_POST['sord']; 
if(!$sidx) $sidx =1; 
$query = "SELECT COUNT(*) AS count FROM user";
$result = mysqli_query($connection, $query); 
$row = mysqli_fetch_assoc($result); 
mysqli_free_result($result);
$count = $row['count'];
if( $count > 0 && $limit > 0) { 
	$total_pages = ceil($count/$limit); 
} else { 
	$total_pages = 0; 
} 
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit;
if($start <0) $start = 0; 
$sql = "SELECT * FROM user ORDER BY $sidx $sord LIMIT $start , $limit"; 
$result = mysqli_query($connection,$sql );
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count; 
$i=0;
while($row = mysqli_fetch_array($result)) {
	$response->rows[$i]['id']=$row['id'];
	$response->rows[$i]['cell']=array($row['id'],$row['user_name'],$row['first_name'],
		$row['middle_name'],$row['last_name'],$row["age"],
		$row["gender"],$row["dob"],$row['marital_status'],$row["employment"],$row["employer"],
		 $row["residence_street"],$row["residence_city"],$row["residence_state"],
		$row["residence_pincode"],$row["residence_contact_no"],$row["residence_fax_no"]
		);
	$i++;
}
echo json_encode($response);
?>