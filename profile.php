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
              <area shape=\"rect\" coords=\"0,0,50,48\" href=\"profile.php\" >
            </map>
            <style>
                div.test img { 
                    background: url($proPic) 50% 50% no-repeat; 
                    position: absolute;
                    top: 4%;
                    left: 32%;
                    box-shadow: 0 8px 16px 0 rgba(255,0,0,0.4), 0 6px 20px 0 rgba(0,0,0,0.19);
                }
                h1 {
                  position: absolute;
                  top: 2%;
                  left: 37%;
                  color: rgb(226, 59, 84);
                  text-shadow: 2.5px 1px black;
                }
            </style>
            </div>
           ";

    }

    $query = ' select "pintS"."followingCount"('.$name.')
    ';

    $result = pg_query($query);

    
    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
        $totalFollowing = $row['followingCount'];
    }

    $query = ' select "pintS"."followerCount"('.$name.')
    ';

    $result = pg_query($query);

    
    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
        $totalFollower = $row['followerCount'];
    }

    
    echo " <div class=\"propicLarge\">
            <img class= \"dp\" src=$proPic width=150px height=150px usemap=\"propicmap\" />
            <h1>$u_name</h1>
            <p class=\"p1\"><b>$totalFollower Followers</b></p>
            <p class=\"p2\"><b>$totalFollowing Following</b></p>
            <map name=\"propicmap\">
              <area shape=\"rect\" coords=\"0,0,150,150\" href=\"profile.php\" >
            </map>
            <style>
                div.propicLarge img.dp { 
                    background: url($proPic) 50% 50% no-repeat; 
                    position: absolute;
                    top: 20%;
                    left: 05%;
                    box-shadow: 0 8px 16px 0 rgba(255,0,0,0.4), 0 6px 20px 0 rgba(0,0,0,0.19);
                }
                div.propicLarge h1 {
                  position: absolute;
                  top: 18%;
                  left: 21%;
                  color: rgb(0, 0, 0);
                  font-size: 40px;
                  font-style: italic;
                  text-shadow: 2.5px 1.25px black;
                }
                div.propicLarge p.p1{
                    position: absolute;
                    top: 27%;
                    left: 22%;
                    color: rgb(0, 0, 0);
                    font-size: 20px;
                }
                div.propicLarge p.p2{
                    position: absolute;
                    top: 31%;
                    left: 22%;
                    color: rgb(0, 0, 0);
                    font-size: 20px;
                }
                
            </style>
            </div>

            <div class=\"container\">
                <img class=\"addB\" src=\"icons\addboard.png\" width=70px height=70px title=\"add board\" usemap=\"addboardMap\" >
                <div class=\"overlay\">
                    <div class=\"text\">add board</div>
                </div>

                <style>
                    div.container img.addB { 
                        background: 50% 50% no-repeat; 
                        position: absolute;
                        top: 28%;
                        left: 65%;
                        
                    }
                    .overlay {
                      position: absolute;
                      top: 29%;
                      left: 65.68%;
                      height: 50px;
                      width: 50px;
                      opacity: 0;
                      transition: .5s ease;
                      background-color: #FF3404;
                    }
                 
                    .container:hover .overlay {
                      opacity: 0.82;
                    }

                    .text {
                      color: white;
                      font-size: 20px;
                      position: absolute;
                      top: 50%;
                      left: 50%;
                      -webkit-transform: translate(-50%, -50%);
                      -ms-transform: translate(-50%, -50%);
                      transform: translate(-50%, -50%);
                      text-align: center;
                    }
                </style>
            </div>

            <div class=\"container2\">
                <img class=\"addP\" src=\"icons\addpin.png\" width=70px height=70px title=\"add pin\" usemap=\"addpinMap\" >
                <div class=\"overlay2\">
                    <div class=\"text2\">add pin</div>
                </div>

                <style>
                    div.container2 img.addP { 
                        background: 50% 50% no-repeat; 
                        position: absolute;
                        top: 28%;
                        left: 75%;
                        
                    }
                    .overlay2 {
                      position: absolute;
                      top: 29%;
                      left: 75.68%;
                      width: 50px;
                      height: 50px;
                      opacity: 0;
                      transition: .5s ease;
                      background-color: #FF3404;
                    }
                 
                    .container2:hover .overlay2 {
                      opacity: 0.82;
                    }

                    .text2 {
                      color: white;
                      font-size: 20px;
                      position: absolute;
                      top: 50%;
                      left: 50%;
                      -webkit-transform: translate(-50%, -50%);
                      -ms-transform: translate(-50%, -50%);
                      transform: translate(-50%, -50%);
                      text-align: center;
                    }
                </style>
            </div>

            <div class=\"hoverButton\">
                <button class=\"board\" onclick=\" window.location.href = 'user_board.php'; \">Boards</button>
                <button class=\"pin\" onclick=\" window.location.href = 'user_pin.php'; \">Pins</button>
                <button class=\"topic\" onclick=\" window.location.href = 'user_topic.php'; \">Topics</button>
            </div>
           ";
?>
    

</body>

</html>
