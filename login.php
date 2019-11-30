<?php

    $db= pg_connect("host=localhost dbname=Pinterest user=postgres password=efaz");

    session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      //$myusername = mysqli_real_escape_string($db,$_POST['username']);
      //$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
        $myusername = trim($_POST['username']);
        $mypassword = trim($_POST['password']);
        $name = " '".$myusername."'" ;
        $pass = " '".$mypassword."'" ;
       //echo "$myusername";
       //echo "$mypassword";

      //Select user_name,password From "pintS"."User"
      $query = 'Select user_name,password From "pintS"."User" WHERE user_name= '.$name.' and password=' .$pass ;
      $result = pg_query($query);
      $row = pg_fetch_array($result,NULL,PGSQL_ASSOC);
    
      //$active = $row['active'];
       $count = pg_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $cookie_name = "user_name";
          $cookie_value = $myusername;
         setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
          echo $error;
      }
      
      
  }
?>
