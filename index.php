<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
    $link = mysqli_connect($_ENV["DATABASE_SERVICE_NAME"],$_ENV["DATABASE_USER"],$_ENV["DATABASE_PASSWORD"],$_ENV["DATABASE_NAME"]);
    if (!$link) {
        http_response_code (500);
        error_log ("Error: unable to connect to database\n");
	die();
    }

    $query = "SELECT count(*) FROM quote";
    $result = $link->query($query);
    if (!$result) {
        http_response_code (500);
        error_log ("SQL error: " . mysqli_error($link) . "\n");
	die();
    }

    $row = mysqli_fetch_array($result);
    mysqli_free_result($result);

    $id = rand(1,$row[0]);

    $query = "SELECT msg FROM quote WHERE id = " . $id;
    $result = $link->query($query);
    if (!$result) {
        http_response_code (500);
        error_log ("SQL error: " . mysqli_error($link) . "\n");
	die();
    }

    $row = mysqli_fetch_array($result);
    mysqli_free_result($result);

    print ?><img src="https://images.unsplash.com/photo-1500622944204-b135684e99fd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1901&q=80"  width="100%" height="100%"> 
	<center><b><h1 style="font-size:300%; color:red;"><?php $row[0] . "\n"; ?></h1></b></center><?php
    
    mysqli_close($link);
?>
</body>
</html>
