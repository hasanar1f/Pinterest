<!DOCTYPE html>
<html>

<head>

      <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>

 <div class="logo">
    <img src="html_img/pin_lg.png" width="60" height="60" alt="Pinterest" title="Pinterest" align= "left" usemap="pmap"/>
     <button class="button" onclick=" window.location.href = 'welcome.php'; ">Home</button>
    <button class="button2" onclick=" window.location.href = 'following.php'; ">Following</button>
    <map name="pmap">
        <area shape="rect" coords="0,0,80,80" href="home.html">
    </map>
</div>

<?php
    $cookie_name = "user_name";

    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
       // echo "Cookie '" . $cookie_name . "' is set!<br>";
       // echo "Value is: " . $_COOKIE[$cookie_name];
    }
    
    $name = " '".$_COOKIE[$cookie_name]."'" ;
    //echo "$name";

    $db= pg_connect("host=localhost dbname=Pinterest user=postgres password=efaz");
    
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
            <img src=$proPic width=50px height=48px usemap=\"propicmap\" />
            <h1>$u_name</h1>
            <map name=\"propicmap\">
              <area shape=\"rect\" coords=\"0,0,50,50\" href=\"profile.php\" >
            </map>
            <style>
                div.test img { 
                    background: url($proPic) 50% 50% no-repeat; 
                    position: absolute;
                    top: 4%;
                    left: 30%;
                    box-shadow: 0 8px 16px 0 rgba(255,0,0,0.4), 0 6px 20px 0 rgba(0,0,0,0.19);
                }
                h1 {
                  position: absolute;
                  top: 2%;
                  left: 35%;
                  color: rgb(226, 59, 84);
                  text-shadow: 2.5px 1.25px black;
                }
            </style>
            </div>
           ";

    }
    
    
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
            where creator_id in
            (
            select followee_id
            from "pintS"."Follow"
            where user_id ='.$name.'
            )
        )
    )';

    $result = pg_query($query);

    
    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
        $p_name = $row['pin_name'];
        $link = $row['pin_link'];

        //echo "<p> $p_name </p>";
        //echo " <div class = \"pic\" ><img src=$link  width=\"400\" height=\"250\" title=$p_name style=\" top:20%;\">  </div> ";

        //echo " <div class=\"pic\">
        //    <img src=$link title=$p_name width=\"400\" height=\"250\">
        //    <p>$p_name</p> </div>";
        //echo "$link";

        echo " <div class=\"gallery\">
         <a target=\"_blank\" href=$link>
        <img src=$link title=$p_name width=\"400\" height=\"250\">
        </a>
        <div class=\"desc\">$p_name</div>
        </div> " ;

    }
?>


</body>

</html>
