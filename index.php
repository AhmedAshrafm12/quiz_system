 <?php 
 include "includes/head.php";
 if($_SERVER['REQUEST_METHOD'] =='POST'){
   include "includes/connect.php";
   include "modules/userQuiz.php";
   $quiz = new userQuiz();
if(empty($_POST['board']))
 $error = 'choose your board';
else{
   $quiz->userName=$_POST['userName'];
   if($quiz->validateQuizName()>0)
   $error='userName already token';
   else{
   $quiz->board=$_POST['board'];
   $quizId = $quiz->insert();
   session_start();
   $_SESSION['quizId']=$quizId;
   $_SESSION['time'] = 10;
   $_SESSION['counter']=1;
   header("location:quiz.php");
  }}
 }

 
 ?>
   
<div class="container" style="margin-top: 100px;">
    <div class="row">
       <div class="col-md-2">
         <div class="fixedSection"  >
              <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                <img src="images/bt1.png" alt="" class="" data-board='1'  width="100px" height="100px">
                <h5>backend</h5>
              </div>
              <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                <img src="images/bt2.png" data-board='1' alt="" class="" width="100px" height="100px">
                <h5>frontend</h5>

              </div>
              <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                <img src="images/bt3.png" alt="" data-board='1' class="" width="100px" height="100px">
                <h5>ui/ux</h5>
              </div>
              <div class="col-lg-12 col-xs-3 col-sm-4 polit" >
                <img src="images/bt3.png" alt="" class="" data-board='1' width="100px" height="100px">
                <h5>flutter</h5>

              </div>
  
   
         </div>
       </div>   
    
   <div class="col-md-8">
       <div class="rightSide" >
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="margin-top: 10%;">
  <?php  if(isset($error)) echo "<div class='alert alert-danger'>$error</div>";?>

        <h2>inter your name</h2>
     <div class="form-group"><input required name="userName" require type="text" class="form-control nameInput mb-3"></div>
     <input class='board' name="board" type="hidden"> 
      <button class="btn btn-success">submit</button>
        </form>


       </div>    
    

    </div>

     </div>
    

</div>



 <?php include "includes/footer.php";?>
