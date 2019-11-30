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
			select topic_id 
			from "pintS"."Topic_interest"
			where user_id =  '.$name.'
		 ';

	    $result = pg_query($query);


	    $ftcount = 0;
	    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
	        //$boardName = $row['title'];
	       	$followedtopicList[$ftcount] = $row['topic_id'];
	       	$ftcount++;
	       }

	    //print_r($followedtopicList);
	    //echo "<br>";

	    $query = ' 
			select id
			from "pintS"."Topic"
			where id not in
				(
				select topic_id 
				from "pintS"."Topic_interest"
				where user_id = '.$name.'
				) 
		 ';

	    $result = pg_query($query);

	    $unftcount = 0;
	    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
	        //$boardName = $row['title'];
	       	$unfollowedtopicList[$unftcount] = $row['id'];
	       	$unftcount++;
	       }
	    //print_r($unfollowedtopicList);

	    for($i=0 ; $i<$ftcount;$i++){
	    	$query = ' 
				select topic_name
				from "pintS"."Topic"
				where id ='.$followedtopicList[$i].' 
		 	';

	    	$result = pg_query($query);

	    	while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
	        	$topicName = $row['topic_name'];
	    	}

	    	$query = ' 
				select pin_id
				from "pintS"."Topic_pin"
				where topic_id ='.$followedtopicList[$i].'
		 	';

	    	$result = pg_query($query);

	    	$count = pg_num_rows($result);

	    	if($count>=1){
	    		$row = pg_fetch_array($result,NULL,PGSQL_ASSOC);
	    		$pinId = $row['pin_id'];

	    		$query = ' 
					select pin_link
					from "pintS"."Pin"
					where pin_id ='.$pinId.'
		 		';

	    		$result = pg_query($query);

	    		$row = pg_fetch_array($result,NULL,PGSQL_ASSOC);
	    		$link = $row['pin_link'];
	    	}
	    	else{
	    		$link = "\"icons\blank.jpg\"";
	    	}

	    	echo " 
		        <div class=\"boardgallery\">
		        	<div class=\"bgdesc\">";
					    echo strtoupper("$topicName");
					    echo"
			    	</div>
			         <a target=\"_blank\" href='home.html'>
			        <img src=$link  width=\"250\" height=\"150\">
			        </a>

			        <div class=\"bgdesc2\"><p>unFollow</p></div>

		        </div>
	         " ;

	    }

	    for($i=0 ; $i<$unftcount;$i++){
	    	$query = ' 
				select topic_name
				from "pintS"."Topic"
				where id ='.$unfollowedtopicList[$i].' 
		 	';

	    	$result = pg_query($query);

	    	while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
	        	$topicName = $row['topic_name'];
	    	}

	    	$query = ' 
				select pin_id
				from "pintS"."Topic_pin"
				where topic_id ='.$unfollowedtopicList[$i].'
		 	';

	    	$result = pg_query($query);

	    	$count = pg_num_rows($result);

	    	if($count>=1){
	    		$row = pg_fetch_array($result,NULL,PGSQL_ASSOC);
	    		$pinId = $row['pin_id'];

	    		$query = ' 
					select pin_link
					from "pintS"."Pin"
					where pin_id ='.$pinId.'
		 		';

	    		$result = pg_query($query);

	    		$row = pg_fetch_array($result,NULL,PGSQL_ASSOC);
	    		$link = $row['pin_link'];
	    	}
	    	else{
	    		$link = "\"icons\blank.jpg\"";
	    	}

	    	echo " 
		        <div class=\"boardgallery\">
		        	<div class=\"bgdesc\">";
					    echo strtoupper("$topicName");
					    echo"
			    	</div>
			         <a target=\"_blank\" href='home.html'>
			        <img src=$link  width=\"250\" height=\"150\">
			        </a>
			        <div class=\"bgdesc2\"><p>Follow</p></div>
			        

		        </div>
	         " ;

	    }

    ?>

</body>
</html>