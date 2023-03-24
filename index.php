<?php 
session_start();
include('./include/config.php');
error_reporting(E_ALL);
$msg = "";
$error = "";
if(isset($_POST['login'])){
	if (!isset($_POST['userName']) || $_POST['userName'] == "" || !isset($_POST['password']) || $_POST['password'] == "") {
		$error = "All fields must be filled!";
	} else {

		$userName = $conn -> real_escape_string($_POST['userName']);
    $location = $conn -> real_escape_string($_POST['location']);
		$password = $conn -> real_escape_string($_POST['password']);
    
		// Login Type Check

			$Login = mysqli_query($conn,"SELECT * FROM `users` WHERE `userName` = '$userName'");
			if (mysqli_num_rows($Login) == 1){
				$LoginRow = mysqli_fetch_array($Login);
				// If the password inputs matched the hashed password in the database
				if ($password==$LoginRow['password']) {
					$_SESSION['sess_user'] = $LoginRow['userName'];
          $_SESSION['sess_location'] = $_POST['location'];
					$msg = "logged successfully";
					header("Location: ./dashboard.php");
				}else{
					$error = "Invalid Password!";
				}
			} 
		else {
			$error = "Invalid login!";
		}
	}
}


?>
<!DOCTYPE html>
<html lang="en" >
  
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="./style1.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>
<!-- partial:index.partial.html -->
<!--<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
<header>
  <nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand" href="#">
      <img src="https://tse1.mm.bing.net/th?id=OIP.BrvR9-atH0KR2dbpeW0wxAHaF7&pid=Api&P=0" width="30" height="40" class="d-inline-block align-top" alt="">
      <font color=white> MFU Portal</font>
  </nav>
</header>-->


<!-- <div id="bg"></div> -->

<form method="POST">
  <div class="form-field">
    <input type="email" name="userName"  placeholder="Email / Username" required/>
  </div>
  
  <div class="form-field">
    <input type="password" name="password" placeholder="Password" required/>                         
  </div>

  <div class ="form-field" >
    <div id="Location">Location </div>
    
    <select name="location" id="Location" >
      <option selected  value="India">India</option>
      <option value="USA">USA</option>
      <option value="UK">UK</option>
      
    </select>
    </div>
  <!-- Response Messages -->
  <?php if($error!=""){?><div class="text-danger"><strong><i class="far fa-times-circle text-danger">&nbsp</i> <?php echo htmlentities($error); ?> </strong></div><?php }else if($msg !=""){?><div class="text-success"><strong><i class="far fa-check-circle text-success">&nbsp</i><?php echo htmlentities($msg); ?> </strong></div><?php }?>
	<!-- End Response Messages -->
  
  <div class="form-field">
    <button class="btn" name="login" type="submit" >Log in</button>
  </div>
</form>

<!-- partial -->
  
</body>
</html>
