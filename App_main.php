<?php
session_start();

      include("config.php");

  if( isset( $_SESSION['email'] ) && isset($_SESSION['id']) ) {
 
                       $Session_id = $_SESSION['id'];
                       @$Isadmin = $_SESSION['admin'];
                       $email = $_SESSION['email'];

                       $first_query =  mysqli_query($connect, "SELECT first_name FROM users WHERE email='$email' LIMIT 1");
                       $second_query =  mysqli_query($connect, "SELECT last_name FROM users WHERE email='$email' LIMIT 1");
                      
                      while ($row = mysqli_fetch_array($first_query)) {
                 $firstname = $row['first_name'];
                                                }

                                                   while ($row = mysqli_fetch_array($second_query)) {
                 $lastname = $row['last_name'];
                                                }

                       

                       if($Isadmin == 1)
                       {

                          echo "<center><p class='alert alert-info' id='notice'>Hello! You are are a Adminstrator. And you will have special rights</p></center>";

                       }


                   if (@$_GET['AlreadyLogged'] == 'yes') {
                      
                     

                     echo "<center><p class='alert alert-info' id='notice'>You are already logged In.  <a href='logout.php'>Logout First</a></p></center>";
                    
                   	
   }

          if (@$_GET['AlreadyLogged'] == 'admin') {
                      
                     

                     echo "<center><p class='alert alert-warning' id='notice'> <b> <strong> NOTICE: </strong> </b>You are Logged in As User.  <a href='logout.php?knowst=admin&submit=Submit+Query'>Logout First</a> and then access Admin panel</p></center>";
                    
                   	
   }


  }


 
  



else {
                
             header("location: login.php?knowst=loginfirst&submit=Submit+Query");



}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome || Dashboard</title>

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

       
        	<div class="col-sm sidebar float-left bg-dark text-light fixed">


            <div class="side-head">
        		<center>  <h1 data-aos="fade-left" aos-duration="3000">WELCOME</h1><br>
               <div class="row userName"> <div class="input-group-text">@</div> <a class="btn username disabled input-group-text" data-aos="fade-zoom" aos-duration="10000"  href="q"><?php echo $firstname;?> <?php echo $lastname;?></a> </div><br>
        		  <p data-aos="fade-right" aos-duration="5000"> Your session ID is <b><?php echo $Session_id;?></b></p>
        		  <a class="btn btn-success" href="logout.php">logout</a><br><br>
          </center>
        </div>

        <div class="side-content"><center>
          <br>
               <a class="btn btn-success" data-aos="fade-left" aos-duration="10000" href="index.php">Home</a><br><br>
               <a class="btn btn-success" data-aos="fade-right" aos-duration="10000" href="about.php">About</a><br><br>

              </center>
              </div>
    <center> <p class="mt-5 mb-3 text-white">&copy; Cow and others</p></center>
        	</div>

           
            
       <div class="MainContent float-right">

       <center> <div id="loading-image">
                              <img src="loader.gif" style="height: 100px; width: 100px;">
                            </div> </center>

        <div id="form-content">
         
         <form class="form-control" method="POST" name="sub-form" id="sub-form">
 
  <div class="form-group">
    <label for="FormControlSelect1">Select Subject</label>
    <select class="form-control" id="FormControlSelect1" name="Subject">
      <option value="CLANG">C Programming</option>
      <option value="CNET">Computer Networking</option>
      <option value="WEBAPP">Web Applications</option>
      <option value="CS">Computer Security</option>
    </select>
  </div>
  
  <input type="submit" name="submit" class="btn btn-success">

</form>
</div>

       </div>
       








        <form action="App_main.php" method="GET" class="hiddenvalue">
 <input type="text" name="AlreadyLogged">
 <input type="submit" name="submit">
	</form>


</body>




 <!-- Required Javascript Files -->

 <script type="text/javascript" src="js/aos.js"></script>
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

 <script>
//This script is a extra of AOS 
      AOS.init({
        easing: 'ease-out-back',
        duration: 1000
      });
    </script>

    <script type="text/javascript">

      $('#loading-image').hide();
      
      $('#sub-form').submit(function(e){

        
    
    e.preventDefault(); // Prevent Default Submission
    
    $.post('dataget.php', $(this).serialize() )
    .done(function(data){
      $('#loading-image').hide();
      $('#form-content').fadeOut('slow', function(){
        $('#form-content').fadeIn('slow').html(data);
      });
    })
    .fail(function(){
      alert('Ajax Submit Failed ...');
      $('#form-content').show();
        $('#loading-image').hide();
    });
    
  });
    </script>

   

</html>