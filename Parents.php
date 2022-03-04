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
<?php
  
// Username is root
$user = 'root';
$password = ''; 
  
// Database name is gfg
$database = 'tester'; 
  
// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM parent";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>
    
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Staff Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: small;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: small;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>
    <section>
        <h1>Staff Data</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Pa. ID</th>
                <th>First Name/th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Parish</th>
                <th>Tel Num</th>
                <th>Email</th>
                <th class="add"><a href="Add.php">Add</a></th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['P_ID'];?></td>
                <td><?php echo $rows['P_fname'];?></td>
                <td><?php echo $rows['P_lname'];?></td>
                <td><?php echo $rows['P_address1'];?></td>
                <td><?php echo $rows['P_address2'];?></td>
                <td><?php echo $rows['P_parish'];?></td>
                <td><?php echo $rows['P_telnumber'];?></td>
                <td><?php echo $rows['P_email'];?></td>
                <td class="edit"><a href="Edit.php">Edit</a></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
  </html>