<?php 
include "includes/head.php";
include "includes/connect.php";
include "modules/user.php";
session_start();
$user = new user();
$user->board=$_SESSION['board'];
$pendingQuizes = $user->getPendingUserQuizes();
$checkedQuizes = $user->getcheckedUserQuizes();
$userQuizes = $user->getUserQuizes();

if(empty($userQuizes))
$error='<h3>no data found</h3>'
?>

<div class='container ' style="padding: 50px;">
<h2 class='bg-info text-dark p-3 text-center'>quizes</h2>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="checked-tab" data-bs-toggle="tab" data-bs-target="#checked" type="button" role="tab" aria-controls="checked" aria-selected="false">checked</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">pending</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="checked" role="tabpanel" aria-labelledby="checked-tab">
  <table class="table table-bordered ">
    <thead>
      <tr>
        <th>userName</th>
        <th>rate</th>
        <th>time</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    foreach($checkedQuizes as $quiz){
    

    echo "
    <tr>
    <td><a href='quizinfo.php?quizId=".$quiz['id']."&quizName=".$quiz['userName']."'>".$quiz['userName']."</a></td>
    <td>".$quiz['rate']."</td>
    <td>".$quiz['dateTime']."</td>
  </tr>";

    } ?>
    </tbody>
    
  </table>

  <?php 
   if(isset($error)){
    echo $error; }
    ?>

  </div>
  <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">

  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>userName</th>
        <th>time</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($pendingQuizes as $quiz){
    echo "<tr>
    <td><a href='checkQuiz.php?quizId=".$quiz['id']."&quizName=".$quiz['userName']."'>".$quiz['userName']."</a></td>
    <td>".$quiz['dateTime']."</td>
  </tr>";

    } ?>
    </tbody>
  </table>



  <?php 
   if(isset($error)){
    echo $error; }
    ?>
  </div>

<div class="bg-info p-3 text-center" > 
<a href="usersRank.php" style="margin-right: 10px; font-size: 20px;">overAll Rank</a>
  <a href="questions.php" style="margin-right: 10px; font-size: 20px;">Questions</a></div>
</div>



</div>






<?php include "../includes/footer.php";?>
