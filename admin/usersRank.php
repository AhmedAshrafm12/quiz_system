<?php 
include "../includes/head.php";
    include "includes/connect.php";
     include "../modules/userQuiz.php";
    session_start();

   $userQuiz = new userQuiz();
   $rank=$userQuiz->getUserRank($_SESSION['board']);
?>

<div class='container' style="padding: 50px;">
<h2 class='bg-info text-dark p-3 text-center'>Rank</h2>
<div>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>user</th>
        <th>rate</th>
      </tr>
    </thead>
    <tbody>  
 <?php 
 $i=0;
foreach($rank as $user){
    echo "
    <tr>
    <td>".$i."</td>
    <td>".$user['userName']."</td>
    <td>".$user['rate']."</td>";
$i++;
}

?>
    </tbody>
  </table>

</div>
</div>






<?php include "../includes/footer.php";?>
