<?php 
include "../includes/head.php";
    include "includes/connect.php";
     include "../modules/userQuiz.php";
    session_start();
   $userQuiz = new userQuiz();
   $quizData=$userQuiz->getQuizQustionsAndAnswers($_GET['quizId']);
   $quizData=$userQuiz->getQuizQustionsAndAnswers($_GET['quizId']);
   if($quizData[0]['checked']!=0)
   header("location:home.php");
?>

<div class='container' style="padding: 50px;">
<h2 class='bg-info text-light p-3 text-center'><?php echo $_GET['quizName'] ?></h2>
<div class='border border-info'>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>questio</th>
        <th>answer</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>  
 <?php 
foreach($quizData as $quiz){
    echo "
    <tr>
    <td>".$quiz['question']."</td>
    <td>".$quiz['answer']."</td>";
    if($quiz['right']==1)
    echo " <td><i class='fas fa-check'></i></td>";
    elseif($quiz['right']==0)
    echo " <td><i class='fas fa-times'></i></td>";
    else
    echo"
    <td><button data-id='".$quiz['answerId']."' class='btn btn-success checkAnswer' >true</button>
    <button data-id='".$quiz['answerId']."' class='btn btn-danger checkAnswer'>false</button>
    </td>
  </tr>
    ";

}

?>
    
    </tbody>
  </table>

</div>
</div>






<?php include "../includes/footer.php";?>
<?php include "js/submitAnswer.php";?>
