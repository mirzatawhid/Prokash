<?php
//fetch.php;
if(isset($_POST["view"])){
	
	include("connection.php");
	if($_POST["view"] != ''){
		mysqli_query($conn,"update `complaint_list` set seen_status='1' ");
	}
	
	$query=mysqli_query($conn,"select * from `complaint_list` order by prb_id desc limit 10");
	$output = '';
 
	if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_array($query)){
	$output .= '
	<li>
		<a href="#">
		Pending Problem title: <strong>'.$row['prb_title'].'</strong><br />
		</a>
		<a class="button" href="#">Approve</a><br>
	</li>
	
	';
	}
	}
	else{
	$output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
	}
	
	$query1=mysqli_query($conn,"select * from `complaint_list` where seen_status='0'");
	$count = mysqli_num_rows($query1);
	$data = array(
		'notification'   => $output,
		'unseen_notification' => $count
	);
	echo json_encode($data);
	
 }
 ?>