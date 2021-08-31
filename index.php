<!DOCTYPE html>  
<html>  
  
<head> 
<style>
body{
    margin: 0;
    padding: 0;
    background: white;
    }
nav{
    width: 100%;
    height: 50px;
    
    background: white;
    overflow: auto;
    position: fixed; /* Set the navbar to fixed position */
  top: -100; /* Position the navbar at the top of the page */
  width: 100%;
    
    }
ul {
    padding: 0;
    
    margin: 0 0 0 150px;
    list-style: none;
    }
li {
    float:left;
    
    
        
    }
.logo img{
    position: absolute;
    margin-top: 0px;
    margin-left: 10px;

        
    }
    nav a{
        width: 100px;
        display: block;
        
        margin-top: 10px;
        margin-left: 0px;
        text-decoration: none;
        font-family: arial;
        color: black;
        text-align: center;
    }
nav li {
        width: 70px;
        display: block;
        padding: 20p;
        margin-top: 10px;
        margin-left: 40px;
        text-decoration: none;
        font-family: arial;
        color: black;
        text-align: center;
    }
.bg {
  
  background-image: url("home-bg.jpg");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
    * {
  box-sizing: border-box;
}
.column {
  float: left;
  width: 25%;
  padding: 5px;
margin-left:7%;
  
}

.row::after {
  content: "";
  clear: both;
  display: table;
}
footer {
  text-align: center;
  padding: 20px;
  background-color: brown;
  color: white;
}
    footer a{
        width: 100%;
        margin-left: 50px;
        font-family: arial;
        color: aliceblue;
        text-align: center;
    }
    

    </style>
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
?>

    
<center><b><h1 style="font-size:250%; color:red;">
<?php print $row[0] . "\n"; ?></h1></b></center>
<?php
    
    mysqli_close($link);
?>
<img src="https://github.com/KeerthanSN/deploymulticontainer/blob/master/images/home-bg.jpg?raw=true" width="100%">

<h1><center>Our Features</center></h1>
<h4><center>Our 3 Primary Features -</center></h4>
    <center>
<div class="row">
  <div class="column">
    <img src="https://github.com/KeerthanSN/deploymulticontainer/blob/master/images/digital-inventory.png?raw=true" alt="Snow" style="width:50%">
      <h3>Digital Book Inventory</h3>

  </div>
  <div class="column">
    <img src="https://github.com/KeerthanSN/deploymulticontainer/blob/master/images/search-online.png?raw=true" alt="Forest" style="width:50%">
      <h3>Search Box</h3>
    
  </div>
  <div class="column">
    <img src="https://github.com/KeerthanSN/deploymulticontainer/blob/master/images/defaulters-list.png?raw=true" alt="Mountains" style="width:50%">
      <h3>Defaulter List</h3>
    
  </div>
    
</div>
</center>
<img src="https://github.com/KeerthanSN/deploymulticontainer/blob/master/images/in-homepage-banner.jpg?raw=true" width="100%">
<center><h1>Our Process</h1>
<h4>We have simple 3 step Process</h4></center>
<center>
<div class="row">
  <div class="column">
    <img src="https://github.com/KeerthanSN/deploymulticontainer/blob/master/images/sign-up.png?raw=true" alt="Snow" style="width:50%">
      <h3>Signup</h3>

  </div>
  <div class="column">
    <img src="https://github.com/KeerthanSN/deploymulticontainer/blob/master/images/search-online.png?raw=true" alt="Forest" style="width:50%">
      <h3>Search Books</h3>
 
  </div>
  <div class="column">
    <img src="https://github.com/KeerthanSN/deploymulticontainer/blob/master/images/library.png?raw=true" alt="Mountains" style="width:50%">
      <h3>Visit Us</h3>
    
  </div>
    
</div>
</center>
<footer>
    <center><ul>
                <li><a href="#">Admin Login</a></li>
                <li><a href="#">Author Management</a></li>
                <li><a href="#">Publisher Management</a></li>
                <li><a href="#">Book Inventory</a></li>
                <li><a href="#">Book issuing</a></li>
                <li><a href="#">Member Management</a></li>
                
            </ul></center>
    </footer>

</body>
</html>
