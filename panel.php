<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel || HTS</title>

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
  <form action="panel.php" method="GET" class="hiddenvalue">
             <input type="text" name="knowst">
             <input type="submit" name="submit">

           </form>
        <center> <div class="panel">
         	<form action="panel.php" method="post" class="form-control">
         		<input type="password" class="form-control" name="Adminpass" placeholder="AdminPanel Password">
         		<input type="submit" name="submit" class="btn btn-success" value="Enter">
         		

         	</form>



         </div>
     </center>












</body>



<!-- Required Javascript Files -->

 <script type="text/javascript" src="js/aos.js"></script>
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</html>
















<?php

     
          session_start();

       if(@$_GET['knowst'] == 'panel') {
                                        
                                        echo "<center><p class='alert alert-success'>User logout Successful. Now You can login as Panel Adminstrator</p></center>";
                                        #<center><p class='alert alert-success' id='notice'>User logout Successful. Now You can login as Panel Adminstrator</center>;
                                      }                             




           if( isset( $_SESSION['email'] ) && isset($_SESSION['id']) ) {
 
                       header("Location: App_main.php?AlreadyLogged=admin&submit=Submit+Query");


  }




    if ($_SERVER["REQUEST_METHOD"]=="POST") {


              require_once("config.php");

                 $Adminpass = $_POST['Adminpass'];

                 $admin_query =  mysqli_query($connect, "SELECT id FROM users WHERE email='admin@hts.com' AND password='$Adminpass' AND isadmin='1' LIMIT 1");

                  

              while ($row = mysqli_fetch_array($admin_query)) {
                 $Id = $row['id'];
            
                                }

                     
                    if(mysqli_num_rows($admin_query) == 1) {

                                       $_SESSION['admin'] = 1;
                                       $_SESSION['id'] = $Id;
                                       $_SESSION['email'] = 'admin@hts.com';

                                       header("Location: App_main.php");


                                  }

                                  else {

                                    echo "failed";
                                  } 


 }    

         

?>