<!DOCTYPE html>
<html>

<head>
	<title>
		This is just a test page
	</title>

	<link rel="stylesheet" type="text/css" href="style3.css"/>

</head>

<body>

	<div class ="logo">
            <img src="html_img/pin_lg.png" width="60" height="60" alt="Pinterest" title="Pinterest" align= "left"/>
             <!--<h1>Welcome To Pinterest</h1>-->
             <button class="button" onclick=" window.location.href = 'log_in.html'; ">Sign IN</button>
             <button class="button2">Sign UP</button>
        </div>

	<div class="hoverButton">
		<button class="b" onclick=" window.location.href = 'test2.php'; ">Boards</button>
		<style type="text/css">
			button.b{
				position: absolute;
				top: 300px;
			}
		</style>
	</div>
	

	<?php

	$cookie_name = "user_name";

	$db= pg_connect("host=localhost dbname=Pinterest user=postgres password=efaz");

	$name = " '".$_COOKIE[$cookie_name]."'";
	/*echo "$name";

    $query = ' select "pro_pic","full_name"
    from "pintS"."User"
    where user_name = '.$name.'
    ';

    $result = pg_query($query);

    
    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
        $u_name = $row['full_name'];
        $proPic = $row['pro_pic'];
        //echo "$proPic";

         echo " <div class=\"test\">
         	<img src=$proPic width=50px height=50px usemap=\"pmap\" />
         	<h1>$u_name</h1>
         	<map name=\"pmap\">
        	  <area shape=\"rect\" coords=\"0,0,50,50\" href=\"profile.php\" >
   		    </map>
            <style>
            	.img { 
  					background: url($proPic) 50% 50% no-repeat; 
  					width: 10px;
  					height: 10px;
				}
				h1 {
				  position: absolute;
				  top: 5px;
				  left: 62px;
				   color: red;
				}
            </style>
           ";
	}*/


    ?>
</body>
</html>