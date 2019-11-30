<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>


    <?php
    
    $db_connection = pg_connect("host=localhost dbname=Pinterest user=postgres password=efaz");

    $query = 'Select user_name,password From "pintS"."User"';
    $result = pg_query($query);
    
    while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
        $name = $row['user_name'];
        $link = $row['password'];
        //echo " <div class = \"pic\" ><img src=$link  width=\"400\" height=\"250\" /> <br/> </div> ";
        echo "<p> $name <br/> </p>" ;
        echo "<p> $link <br/> </p>";
        //if (!file_exists('user_uploads\\'.$name)) {
        //mkdir('user_uploads\\'.$name, 0777, true);
        //    }
    }
    
?>


</body>

</html>
