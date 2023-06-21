<?php
	include('connection.php');
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="style.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Notification System in PHP</title>
	</head>
	<style>
		label{
			color: blue;
		}
	</style>
<body>
	<nav class="navbar navbar-default" style="background-color: black">
    <div class="container-fluid">
		<div class="navbar-header text-primary">
			<a class="navbar-brand glyphicon glyphicon-home" style="color: rgb(71, 71, 147);" href="#">Notification </a>
		</div>
		<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="label label-pill label-danger count" style="border-radius:10px;"></span>

				<button type="button" class="icon-button">
					<span class="material-icons">notifications</span>
					<span class="icon-button__badge">2</span>
				  </button>
             </a>				
				<ul class="dropdown-menu"></ul>
			</li>			
		</ul>
    </div>
	</nav>
	<div style="height:5px;"></div>
	<div class="row">	
		<div class="col-md-3">
		</div>
		<!--<div class="col-md-6 well" style="background-color: black;">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class="text-primary">Notification System in PHP</h2></center>
					<hr>
				<div>
					<form class="form-inline" method="POST" id="add_form">
						<div class="form-group">
							<label>Firstname:</label>
							<input type="text" name="firstname" id="firstname" class="form-control">
						</div>
						<div class="form-group">
							<label>Lastname:</label>
							<input type="text" name="lastname" id="lastname" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="addnew" id="addnew" class="btn btn-primary" value="Add">
						</div>
					</form>
				</div>
                </div>
            </div><br>
			<div class="row">
			<div id="userTable"></div>
			</div>
		</div>-->

	

		<div class = "col-md-3">
		</div>
	</div>
</body>
<script type = "text/javascript">
$(document).ready(function(){
	
	function load_unseen_notification(view = ''){
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data){
			$('.dropdown-menu').html(data.notification);
			if(data.unseen_notification > 0){
			$('.count').html(data.unseen_notification);	}}});} 
	load_unseen_notification(); 
	$('#add_form').on('submit', function(event){
		event.preventDefault();
		if($('#title').val() != ''){
		var form_data = $(this).serialize();
		$.ajax({
			url:"complaint_submission.php",
			method:"POST",
			data:form_data,
			success:function(data){
			$('#add_form')[0].reset();
			load_unseen_notification();	}});}
		else{ alert("Enter Data First");}}); 
	$(document).on('click', '.dropdown-toggle', function(){
	$('.count').html('');
	load_unseen_notification('yes');}); 
	setInterval(function(){ 
		load_unseen_notification();; 
	}, 5000);
});
</script>
</html>