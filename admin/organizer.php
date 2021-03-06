<!DOCTYPE html>
<html>
<?php
session_start();
?>
<style>
.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    position: relative;
    top: 90px;
    text-decoration: none;
    transition: background-color .3s;
}

.pagination a.active {
    background-color:lightblue;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<head>
	<title>Organizers</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Oswald|Raleway" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Font-Awesome/css/font-awesome.min.css">
	<!-- Css Styling Links -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!-- JavaScript Links -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navigation">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<!-- Brand and Toggle get Grouped -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expended="false">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a href="#" class="navbar-brand">Logo</a>
					</div>
					<!-- Collect Nav links and Content for Toggling -->
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-left">
							<li></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="welcome.php">Home</a></li>
							<li><a href="user.php">User</a></li>
							<li><a href="event.php">Event</a></li>
							<li><a href="organizer.php" class="active">Organizer's</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<!-- Navigation Ends -->

	<!-- Main Section with Sidebar-Menu and Main Content -->
	<div class="main-user" id="main-user">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="list-group">
						<a href="welcome.php" class="list-group-item active"><i class="fa fa-cog"></i> Dashboard</a>
						<a href="suggestions.php" class="list-group-item"><i class="fa fa-globe"></i> Suggestions</a>
						<a href="upload-adds.php" class="list-group-item"><i class="fa fa-upload"></i> Upload ADD's</a>
						<a href="#" class="list-group-item"><i class="fa fa-handshake-o"></i> Transaction</a>
						<a href="adminsetting.php" class="list-group-item"><i class="fa fa-wrench"></i> Admin Setting</a>
						<a href="adminlogout.php" class="list-group-item"><i class="fa fa-sign-out"></i> Log Out</a>
					</div>
					<?php
					 $con=mysql_connect("localhost","root","") or die(' connection query error');
 $db=mysql_select_db('ema',$con) or die('database selection  query error');
 $countorg=mysql_query("select count(organizer_email) from organizer")or die('count query error');
					$totalorg=mysql_fetch_array($countorg);

					?>
					<span><b>Total Organizer:</b></span> <span style=" "> <b><?php echo $totalorg[0];?></b> </span>
				</div>
				<!-- Sidebar Ends Here -->

				<!-- User's on EMA Starts -->
				<div class="col-lg-9 col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<h4>Organizars in EMA</h4>
							</div>
						</div>
						<?php
						 
   $query=mysql_query(" select user.fristname,user.lastname,user.email,organizer.companyname,organizer.country,organizer.city,organizer.logo from user join organizer where user.email=organizer.organizer_email LIMIT 0,20 ") or die('organizer    table selection query error');
 
if(mysql_num_rows($query)>0){

	   
	   	?>
						<div class="panel-body table-responsive">
							<table class="table">
								<tbody>
									<thead>
										<td>Logo</td>
										<td>Name</td>
										<td>Org's</td>
										<td>Email</td>
										<td>Country</td>
										<td>City</td>
										<td>Options</td>
									</thead>
									<?php
									 while($rows=mysql_fetch_array($query)){
									 	 ?>
									<tr>
										<td>
											 
										<img src="../profile_pictures/<?php echo $rows[6];?>" class="img-responsive img-rounded">
										 
										</td>
										<td><?php echo $rows[0]." ".$rows[1];?></td>
										<td><?php echo $rows[3];?> </td>
										<td><?php echo $rows[2];?></td>
										<td><?php echo $rows[4];?></td>
										<td><?php echo $rows[5];?></td>
										<td> <a href="deleteorganizer.php?email=<?php echo $rows[2];?>&&page=<?php echo 'organizer.php';?>" onclick="return window.confirm('Are you sure to delete')"> <button type="button" class="btn btn-danger">Delete</button></a></td>
									</tr>
									 
									 
									 <?php
									}
									?>
								</tbody>
							</table>	
						</div>
						<?php
					}
					else{
						echo "NO ORganizer";
					}
					?>
					</div>
				</div> <!-- User's on EMA Ends -->
			</div>
		</div>
	</div>
	<!-- Main Section with Sidebar-Menu and Main Content Ends -->
	 
<!--pagenation -->
	<div class="row" align="center">
	<div class="pagination" style="align-content: center;">
   <a class="active" href="organizer.php">1</a>
  <a   href="organizer1.php">2</a>
  <a   href="organizer2.php">3</a>
  <a href="organizer1.php">&raquo;</a>
</div>
</div>
	<!-- Footer -->
	<div class="footer" id="footer">
		<p>&copy; CopyRight-2017 | All Right Reserved</p>
	</div>
	<!-- Footer Ends -->

</body>
</html>