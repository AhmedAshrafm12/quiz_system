<?php 
include "../includes/head.php";
    include "includes/connect.php";
     include "../modules/userQuiz.php";
    session_start();

   $userQuiz = new userQuiz();
   $questions=$userQuiz->getBoardQuestions($_SESSION['board']);
?>

<div class='container' style="padding: 50px;">
<h2 class='bg-info text-dark p-3 text-center'>Rank</h2>
<div>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>user</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>  
 <?php 
 $i=0;
foreach($questions as $question){
    echo "
    <tr>
    <td>".$i."</td>
    <td>".$question['question']."</td>
    <td><button  class='btn btn-success ' data-id='".$question['id']."' id='delete' >delete</button>
    <button  class='btn btn-danger '>update</button>
    </td>";
$i++;
}

?>
    </tbody>
  </table>

</div>
</div>






<?php include "../includes/footer.php";?>
<?php include "js/submitAnswer.php";?>
