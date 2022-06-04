<?php include "includes/head.php";

if(!isset($_SESSION['quizId']))
header("location:index.php");

  session_destroy();
  header( "Refresh:3; url=index.php", true, 303);

?>
   
   <div class="container" style="margin-top: 100px;">
       <div class="row">
          <div class="col-md-2">
            <div class="fixedSection"  >
                 <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                   <img src="images/bt1.png" alt="" class="" width="100px" height="100px">
                   <h5>backend</h5>
                 </div>
                 <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                   <img src="images/bt2.png" alt="" class="" width="100px" height="100px">
                   <h5>backend</h5>
   
                 </div>
                 <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                   <img src="images/bt3.png" alt="" class="" width="100px" height="100px">
                   <h5>ui/ux</h5>
                 </div>
                 <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                   <img src="images/bt3.png" alt="" class="" width="100px" height="100px">
                   <h5>frontend</h5>
   
                 </div>
     
      
            </div>
          </div>   
       
      <div class="col-md-8">
          <div class="rightSide" >
           
<div class='row alert alert-success' style="margin-top: 10%;  ">
 
<div class='col-md-6'>
 <h3 class='text-success' style="font-weight: bold;" >your quiz has been ended wait for you results</h3>
 </div>
 <div class='col-md-6'>
 <img src="images/—Pngtree—check mark icon design template_4085369.png" alt="" class="" width="100%" height="100%">

</div>

</div>   
          </div>    
       
   
       </div>
   
        </div>
       
   
   </div>
   
   
   
    <?php include "includes/footer.php";?>
   <?php include "js/submitAnswer.php";?>