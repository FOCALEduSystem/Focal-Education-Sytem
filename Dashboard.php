<!DOCTYPE html>
<html lang="en">
<head>
	<meta charste="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewpoint" content="width=device-width, intial-scale=1.0">
<title> Admin Panel </title>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

<link rel="stylesheet" href="style.css">

</head>
<body>

	<section id="menu">
		<div class="logo">
			<img src="images/Focallogo.png">
		</div>
		<div class="logo">
		</div>
		
		<h2>Admin</h2>

		<div class="items">
			<li><i class="fad fa-chart-pie-alt"></i><a href="Dashboard.php">Dashboard</a></li>
			<li><i class="far fa-graduation-cap"></i><a href="Student.php">Students</a></li>
			<li><i class="fas fa-school"></i><a href="Staff.php">Staff</a></li>
			<li><i class="far fa-person-sign"></i><a href="Parents.php">Parents</a></li>
			<li><i class="fad fa-books"></i><a href="Subjects.php">Subjects</a></li>
			<li><i class="fas fa-users-class"></i><a href="Class.php">Class</a></li>
			<li><i class="fas fa-chart-line"></i><a href="#">Blank</a></li>
		</div>
	</section>
    
	<section id="interface">
		<div class="navigation">
			<div class="n1">
				<div class="search">
					<i class="far fa-search"></i>
					<input type="text" placeholder="search">
				</div>
			</div>
			<div class="profile">
			<i class="far fa-bell"></i>
			<img src="images/reading.png">

			</div>
		</div>
   
		<h3 class="i-name">
			Dashboard
		</h3>
		<div class="values">
			<div class="val-box">
				<i class="fas fa-users"></i>
				<div>
					<h3>5,000</h3>
					<span>Students</span>
				</div>
			</div>
			<div class="val-box">
				<i class="fas fa-users"></i>
				<div>
					<h3>50</h3>
					<span>Staff</span>
				</div>
			</div>
			<div class="val-box">
				<i class="fas fa-users"></i>
				<div>
					<h3>5,000</h3>
					<span>Parents</span>
				</div>
			</div>
			<div class="val-box">
				<i class="fas fa-users"></i>
				<div>
					<span>Pending</span>
				</div>
			</div>
		</div>
	</section>

<div id="sidebar">
	
</div>
    
<div id="data"><br>
	</div>

</body>
</html>