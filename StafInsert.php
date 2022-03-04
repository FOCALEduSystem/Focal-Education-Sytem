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
          
        // Taking all 6 values from the form data(input)
        $sta_ID =  $_REQUEST['sta_ID'];
        $sta_fname =  $_REQUEST['sta_fname'];
        $sta_lname = $_REQUEST['sta_lname'];
        $sta_telnum =  $_REQUEST['sta_telnum'];
        $sta_email = $_REQUEST['sta_email'];
        $role_id = $_REQUEST['role_id'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO staff  VALUES ('$sta_ID', '$sta_fname', 
            '$sta_lname','$sta_telnum','$sta_email','$role_id')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("\n$sta_ID\n $sta_fname\n $sta_lname\n "
                . "$sta_telnum\n $sta_email\n $role_id");
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