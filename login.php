<?php // Do not put any HTML above this line
require_once "pdo.php";

  session_start();
    
if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; // Pw is php123

$failure = false;  // If we have no POST data
$md5 = hash('md5', 'XyZzy12*_');


// Check to see if we have some POST data, if we do process it

// Note triple not equals and think how badly double
// not equals would work here...
if ( isset($_POST['email']) && isset($_POST['pass']) ) {
   if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
   	 error_log("Login failed User name and/or password empty");
   $_SESSION['f7'] = "User name and password required";
header("Location: login.php");
return;
				
    }  else  {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
                          error_log("Login success ");
                         
              
              // Redirect the browser to view.php
			$_SESSION['name'] = $_POST['email'];
			header("Location: view.php");
			return;			    
        }
        
            else if ( $check !== $stored_hash ) {
       
$_SESSION['f8'] = " Incorrect password ";
header("Location: login.php");
	   error_log("Login failed wrong password ".($_POST['pass'])." " .'is incorrect');
return;

        	    } 
        	    }
             
    }


// Fall through into the View

?>


<!DOCTYPE html>
<html lang="en">
<head>
	
	<title> Login Form || Moshe Janani || Website </title>
	
	<meta charset="utf-8">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Moshe janani">
    
    <link rel="stylesheet" href="sylesall.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="favicon_package_v0.16//favicon-32x32.png" >
	<link rel="apple-touch-icon" sizes="180x180" href="favicon_package_v0.16//apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon_package_v0.16//favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon_package_v0.16/favicon-16x16.png">
	<link rel="manifest" href="favicon_package_v0.16//site.webmanifest">
	<link rel="mask-icon" href="favicon_package_v0.16//safari-pinned-tab.svg" color="#5bbad5">

	<script src="https://kit.fontawesome.com/9eb6d0ba08.js" crossorigin="anonymous"></script>
	
</head>

<body id="homebody">

<div class="container-fluid" >
<header>
<nav id="Home-p-Head" class="navbar navbar-default">
<div class="navbar-header">
<div id="brand" onclick="history.go(0);" class="navbar-brand"> Login Page: </div> 
</div>
  <button id= "menuicon" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
                    <i id="bars" class="fas fa-bars" ></i>                    

                                          </button>
                                          
  <!--nav bar area -    - -   - - - - - - - -nav bar  - - - - - - -  - - - - - - - -->
 <div class="collapse navbar-collapse" id="collapsable-nav">
          <ul id="nav-list" class="nav navbar-nav navbar-right visible-xs">
          
           <li class="text-capitalize list21">
            
  <a href="index.html" class="text-decoration-none text-light"  > Go Back Home </a> </li>
  
 
            <li class="text-capitalize list21"> 
            <a href="cour-index.html" class="text-decoration-none text-light"  > Coursera files </a> </li>
          </ul>
        </div>


</nav>


</header>

<!-- body area this is the body section see this --> 

<form method="POST">

<div class="form-group">
<?php 
if ( isset($_SESSION['f7']) ) {
  echo('<p style="color: red;">'.htmlentities($_SESSION['f7'])."</p>\n");
  unset($_SESSION['f7']);
}
if ( isset($_SESSION['f8']) ) {
  echo('<p style="color: red;">'.htmlentities($_SESSION['f8'])."</p>\n");
  unset($_SESSION['f8']);
}

?>

  <label> Email </label>
  <input type="email" class="form-control w-50" id="username" name="email">
</div>
<div class="form-group">
  <label> Password: </label>
  <input type="password" class="form-control w-75" id="password" name="pass">
</div>


<input type="submit" value="Log In" >

<button id="ser" class=" btn-link " onclick="ng()"  id="recaptcha" class="g-recaptcha btn-link" 
        data-sitekey="6LdhNMoZAAAAAKx8wRFfPTHEzpb9ct2AXMoveThS" 
        data-callback='onSubmit' 
        data-action='submit'
>  
<span> Registar Now </span>

</button>
</form>

<!-- this is the footer area  -->
 </div> <!-- do not remove not extra this is the /div for container -->

 

<script src="javascrall.js" > </script>
 <script>
   function onSubmit(token) {
     document.getElementById("recaptcha").submit();
   }
 </script>

 <script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
