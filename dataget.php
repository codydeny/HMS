<?php 

 if ($_SERVER["REQUEST_METHOD"]=="POST") {
               
                 require_once("config.php");


                          $subject = $_POST['Subject'];
                          $Topics = [];

                          
                          	  
                          	   $query =  mysqli_query($connect, "SELECT topics FROM subjects WHERE subject='$subject' LIMIT 3");

     	       $result = mysqli_fetch_array($query);

     	       echo implode(",", $result);


                                  
                                                     


                            
                           


                                                         
                         
                          }                      
       
       ?>