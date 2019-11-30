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
		
		$query = 'select pin_name,pin_link
					from "pintS"."Pin"
					where pin_id in
					(
						select pin_id
						from "pintS"."Board_pin"
						where board_id in
							(
							select board_id
							from "pintS"."Board"
							where creator_id ='.$name.'
							)
					)';

	    $result = pg_query($query);

	    
	    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
	        $p_name = $row['pin_name'];
        	$link = $row['pin_link'];
	       	
	        echo " <div class=\"pingallery\">
	         <a target=\"_new\" href=$link>
		        <img src=$link title=$p_name width=\"400\" height=\"250\">
		        </a>
		        <div class=\"bgdesc\">";
					    echo strtoupper("$p_name");
					    echo"
			    	</div>
	        </div> " ;
		 }

		 /*$query = ' 
			select "pintS"."pinCount"('.$name.')
		 ';

	    $result = pg_query($query);

	    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
	        $totalPin = $row['pinCount'];
	    }*/

    ?>
    

</body>
</html>