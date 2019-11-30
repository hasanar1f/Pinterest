<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

	<?php

		$isFollowing = false;
        if(isset($_POST['unfollow'])){
            //echo $_POST['unfollow'];
            $isFollowing = false;
        }
        else if(isset($_POST['follow'])){
            //echo $_POST['follow'];
            $isFollowing = true;
        }

	?>
<form  method="post">
		<?php
		if (true) {
		    if ($isFollowing) {
		       echo "<input type=\"button\" name=\"unfollow\" value=\"unfollow\", style=\"
		       		width:100%;
		       		background-image:url(&quot;none&quot;);
		       		background-color:#687b9b;
		       		color:#fff;
		       		padding:16px 32px;
		       		margin:0px 0px 0px;
		       		border:none;
		       		box-shadow:none;
		       		text-shadow:none;
		       		opacity:0.9;
		       		text-transform:uppercase;
		       		font-weight:bold;
		       		font-size:13px;
		       		letter-spacing:0.4px;
		       		line-height:1;
		       		outline:none;\"
		       		>
		       	";              
		    } else {
		        echo "<input type=\"button\" name=\"follow\" value=\"Follow\", style=\"
		        	width:100%;
		        	background-image:url(&quot;none&quot;);
		        	background-color:#da052b;
		        	color:#fff;
		        	padding:16px 32px;
		        	margin:0px 0px 6px;
		        	border:none;
		        	box-shadow:none;
		        	text-shadow:none;
		        	opacity:0.9;
		        	text-transform:uppercase;
		        	font-weight:bold;
		        	font-size:13px;
		        	letter-spacing:0.4px;
		        	line-height:1;
		        	outline:none;
		        	\">
		        ";
		    }
		}
?>
</form>

	

</body>
</html>