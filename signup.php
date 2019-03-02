<!DOCTYPE html>
<html>
<head>
	<title> Sign Up || HTS</title>

	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap & other CSS files -->

   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/animate.css">
   <link rel="stylesheet" type="text/css" href="css/aos.css">
   <link rel="stylesheet" type="text/css" href="css/jquery.css">
   <link rel="stylesheet" type="text/css" href="css/custom.css">

</head>



<body>

  <nav>
		<a href="#" class="backNav"><img class="backNav" src="images/back.png"></a>
		<div class="NavBtn"> 


      
         <img id="normalMonk" src="images/navMonk.png" class="Monk">
         <img id="smileMonk" src="images/test.png" class="Monk">
      
      	       <center>
				<nav class="cl-effect-10" id="cl-effect-10">

					<a href="index.php" data-hover="Home" class="NavLink"><span>Home</span></a><br>
					<a href="login.php" data-hover="Login" class="NavLink"><span>Login</span></a><br>
					<a href="signup.php" data-hover="Sign Up" class="NavLink"><span>Sign Up</span></a><br>
					<a href="about.php" data-hover="About" class="NavLink"><span>About</span></a><br>
					<!--<a href="#cl-effect-10" data-hover="Assemblage" class="NavLink"><span></span></a><br>-->
				</nav>
			</center>
		</div>
			
	</nav>




	


<body class="text-center">

 	<div class="container w-50">
    <form class="form-signin" id="FormSign" action="signup.php" method="POST">
      <img class="mb-4" src="images/signin.png" alt="" width="72" height="72">
     
      
      <h1 class="h3 mb-3 font-weight-normal" id="signintext">Please Sign In</h1>
      <div class="row">
      	<div class="col-sm">
       <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name" required autofocus>
        </div>
        <div class="col-sm">
       <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" required autofocus>
         </div>

   </div>
   <br>
       <input type="text" id="clgname" name="clgname" class="form-control" placeholder="Collage Name" required autofocus>
       <br>
      <label for="email" class="sr-only">Email address</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <div class="mb-3">
       <br>
        <a href="login.php"> Wanted to Login instead?</a>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit"> Sign In</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>

     <div class='alert alert-success regismsg' role='alert'>Registered Successfully! Now You should Login</div><br><br>
     <a href="login.php"><button class="btn btn-lg btn-primary btn-block hiddenlogin"> Login</button></a><br>
     <a href="signup.php" id="hiddenlink">Register Another User?</a>

</div>
      
      

 






</body>




 <!-- Required Javascript Files -->

 <script type="text/javascript" src="js/aos.js"></script>
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
 

</html>


<?php 


       session_start();

           if( isset( $_SESSION['email'] ) && isset($_SESSION['id']) ) {
 
                       header("Location: App_main.php");


  }



            
     if ($_SERVER["REQUEST_METHOD"]=="POST") {


     	        require_once("config.php");

              $Firstname = $_POST['firstname'];
              $Lastname = $_POST['lastname'];
              $Collage = $_POST['clgname'];
              $Email = $_POST['email'];
              $Password = $_POST['password'];

              #Check if the email already exist

              

              $check_existence = mysqli_query($connect, "SELECT email from users WHERE email=$Email");

              if($check_existence === TRUE){

              	

                echo "Email Address Already Taken";

}
     


         else {


             

             $run_query = mysqli_query($connect, "INSERT  INTO users (id, password, first_name, last_name, clg_name, email) 
 VALUES (NULL, '$Password', '$Firstname', '$Lastname', '$Collage', '$Email')");

         if ($run_query === TRUE) {
 
                        
                     echo "<script> $('.regismsg').css('display', 'inline');  

                                      $('#FormSign').css('display', 'none');

                                      $('.hiddenlogin').css('display', 'inline');

                                       $('#hiddenlink').css('display', 'inline');
                     </script>";




 } else {

 echo mysqli_error($connect);
 exit();
 }




         }


    







    }

?>