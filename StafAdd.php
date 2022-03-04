<!DOCTYPE html>
<html lang="en">
  
<head>
	<meta charste="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewpoint" content="width=device-width, intial-scale=1.0">
<title> Admin Panel </title>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

<link rel="stylesheet" href="style.css">

    <title>User Resigration Form</title>
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
        
    <center>
        <h1>User Resigration Form</h1>
     
        <form action="StafInsert.php" method="post">
            <table>
                <tr>
                    <td><label for="sta_ID">ID:</label></td>
                    <td><input type="text" placeholder="Auto" name="sta_ID" id="staid"></td>
                </tr>
                
                <tr>
                    <td><label for="firstName">First Name:</label></td>
                    <td><input type="text" placeholder="Enter First Name"name="sta_fname" id="firstName" required></td>
                </tr>
                
                <tr>
                    <td><label for="lastName">Last Name:</label></td>
                    <td><input type="text" placeholder="Enter Last Name"name="sta_lname" id="lastName" required></td>
                </tr>
                
                <tr>
                    <td><label for="telnum">Tel Number:</label></td>
                    <td><input type="text" placeholder="Enter Tel Number"name="sta_telnum" id="telnum" required></td>
                </tr>
                
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="text" placeholder="Enter Email"name="sta_email" id="email" required></td>
                </tr>
                
                <tr>
                    <td><label for="role">Role ID:</label></td>
                    <td><input type="text" placeholder="Enter Role ID"name="role_id" id="role" required></td>
                </tr>
        </div>
            
        <tr>
        <td><input type="submit" value="Submit"></td>
        </tr>
        </form>
    </center>
</body>
  
</html>