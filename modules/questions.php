<?php
class question{
public $question ,  $type , $board; 

public function insert(){
  global $con;
  $insert=$con->prepare("INSERT INTO `questions`(`id`, `question`, `type`, `board`, `dateTime`) VALUES (?,?,?)");
  $insert->execute();
  return $con->lastInsertId();
}
public function delete($questionId){
  global $con;
  $insert=$con->prepare("DELETE from `questions`where id=?");
  $insert->execute(array($questionId));
}

public function getQuizQuestion($quizId){
  global $con;
  $quiz = new userQuiz();
  $quizData = $quiz->getQuizData($quizId);

  $answer  = new answer();
  $lastAnswer = $answer->getLastAnswer($quizId);
  if(empty($lastAnswer))
  $current = 0;
  else
  $current=$lastAnswer['questionId'];
  $select=$con->prepare("SELECT * FROM `questions` WHERE id > ? AND board = ?  LIMIT 1 ");
  $select->execute(array($current,$quizData['board']));
  return $select->fetch();
}



}