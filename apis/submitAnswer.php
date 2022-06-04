<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
include "../includes/connect.php";
include "../modules/answer.php";
$answer = new answer();
$answer->questionId=$_POST['questionId'];
$answer->answer=$_POST['answer'];
$answer->quizId=$_POST['quizId'];
$answer->insert();
}




 ?>