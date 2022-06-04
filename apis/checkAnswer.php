<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
session_start();
include "../includes/connect.php";
include "../modules/answer.php";
include "../modules/userQuiz.php";
$answer = new answer();
$answer->right=$_POST['right'];
$answer->submitAnswer($_POST['answerId']);
$answer->checkPendingAnswers($_POST['answerId']);
$answerData = $answer->getAnswerData($_POST['answerId']);
$userQuiz = new userQuiz();
$userQuiz->submitQuizRate($_SESSION['board'],$answerData['quizId']);
;
}




 ?>