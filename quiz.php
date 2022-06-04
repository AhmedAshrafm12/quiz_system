<?php
include "includes/head.php";
include "modules/questions.php";
include "modules/answer.php";
include "modules/userQuiz.php";
include "includes/connect.php";
session_start();
$question = new question();
$_SESSION['counter'] =$_SESSION['counter']+1;
$questionData = $question->getQuizQuestion($_SESSION['quizId']);
if(empty($questionData))
{
  header('location:endQuiz.php');
}
?>
   
   <div class="container" style="margin-top: 100px;">
       <div class="row">
          <div class="col-md-2">
            <div class="fixedSection"  >
                 <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                   <img src="images/bt1.png" alt="" class="<?php if($questionData['board']==1) echo 'active'; ?>" width="100px" height="100px">
                   <h5>backend</h5>
                 </div>
                 <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                   <img src="images/bt2.png" alt="" class="<?php if($questionData['board']==2) echo 'active'; ?>" width="100px" height="100px">
                   <h5>frontend</h5>
   
                 </div>
                 <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                   <img src="images/bt3.png" alt="" class="<?php if($questionData['board']==3) echo 'active'; ?>" width="100px" height="100px">
                   <h5>ui/ux</h5>
                 </div>
                 <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                   <img src="images/bt3.png" alt="" class="<?php if($questionData['board']==4) echo 'active'; ?>" width="100px" height="100px">
                   <h5>testing</h5>
   
                 </div>
     
      
            </div>
          </div>   
       
      <div class="col-md-8">
          <div class="rightSide" >
           <form  id="answer" class="mt-4" >
               <h3 class="text-center  timer" id='timerBox' ><span id=timer>10</span>/10</h3>
               <span class="question_number" ><?php echo $_SESSION['counter']; ?>:-</span>
        <div class="form-group">
            <p class="lead"><?php echo $questionData['question'];?></p>
            <input id="answerInput" require type="text" class="form-control nameInput mb-2">
            <button class="btn btn-success mt-2">answer</button>

        </div>
           </form>
   
          </div>    
       
   
       </div>
   
        </div>
       
   
   </div>
   
   
   
    <?php include "includes/footer.php";?>
   <?php include "js/submitAnswer.php";?>