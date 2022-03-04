<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>User Resigration Form</title>
</head>
  
<body>
    <center>
        <h1>User Resigration Form</h1>
  
        <form action="insert.php" method="post">
              
              
<p>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email">
            </p>
  
  
  
              
              
<p>
                <label for="password">Password:</label>
                <input type="text" name="passwordHash" id="password">
            </p>
  
  
  
              
              
<p>
                <label for="firstName">First Name:</label>
                <input type="text" name="fname" id="firstName">
            </p>
  
  
              
              
              
<p>
                <label for="lastName">Last Name:</label>
                <input type="text" name="lname" id="lastName">
            </p>
  
              
            <input type="submit" value="Submit">
        </form>
    </center>
</body>
  
</html>