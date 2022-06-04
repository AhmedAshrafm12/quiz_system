<?php 
include "../includes/head.php";
    include "includes/connect.php";
     include "../modules/userQuiz.php";
    session_start();
    if(!isset($_GET['quizId']))
    header("location:index.php");
   $userQuiz = new userQuiz();
   $quizData=$userQuiz->getQuizQustionsAndAnswers($_GET['quizId']);
?>

<div class='container' style="padding: 50px;">
<h2 class='bg-info text-dark p-3 text-center'><?php echo $_GET['quizName'] ?></h2>
<div>

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
    <td>not checked</td>
    ";


}

?>
    </tbody>
  </table>

</div>
</div>






<?php include "../includes/footer.php";?>
