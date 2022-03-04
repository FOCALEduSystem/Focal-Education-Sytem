<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center>
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => tester
        $conn = mysqli_connect("localhost", "root", "", "tester");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 4 values from the form data(input)
        $email =  $_REQUEST['email'];
        $passwordHash = $_REQUEST['passwordHash'];
        $fname =  $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO login  VALUES ('$email', 
            '$passwordHash','$fname','$lname')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("\n$email\n $passwordHash\n "
                . "$fname\n $lname");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>