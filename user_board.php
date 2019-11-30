<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

	<?php 

		include("profile.php"); 

		$cookie_name = "user_name";
		$name = " '".$_COOKIE[$cookie_name]."'" ;

		$db= pg_connect("host=localhost dbname=Pinterest user=postgres password=efaz");
		
		$query = ' 
			select "title"
		    from "pintS"."Board"
		    where creator_id = '.$name.'
		 ';

	    $result = pg_query($query);

	    /*$query = ' 
			select "pintS"."pinCount"('.$name.')
		 ';

	    $result2 = pg_query($query);

	    while($row = pg_fetch_array($result2,NULL,PGSQL_ASSOC)){
	        $totalPin = $row['pinCount'];
	    }*/
	    


	    
	    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
	        $boardName = $row['title'];
	       
	        echo " 
		        <div class=\"boardgallery\">
			         <a target=\"_blank\" href='home.html'>
			        <img src=\"icons\blank.jpg\"  width=\"250\" height=\"150\">
			        </a>
			        <div class=\"bgdesc\">";
					    echo strtoupper("$boardName");
					    echo"
			    	</div>

		        </div>
	         " ;
		 }

    ?>

</body>
</html>