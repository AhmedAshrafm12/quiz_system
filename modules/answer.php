<?php
class answer{
public $questionId ,  $answer , $quizId  ,$right; 

public function insert(){
  global $con;
  $insert=$con->prepare("INSERT INTO `answers`(`answer`, `quizId`, `questionId`) VALUES (?,?,?)");
  $insert->execute(array($this->answer,$this->quizId,$this->questionId));
  return $con->lastInsertId();
}

public function getLastAnswer($quizId){
  global $con;
  $select=$con->prepare("SELECT * FROM `answers` WHERE quizId = ? ORDER by id DESC LIMIT 1");
  $select->execute(array($quizId));
  return $select->fetch();
}

public function getAnswerData($answerId){
  global $con;
  $select=$con->prepare("SELECT * FROM `answers` WHERE id = ? LIMIT 1");
  $select->execute(array($answerId));
  return $select->fetch();
}


public function submitAnswer($answerId){
  global $con;
  $update=$con->prepare("UPDATE `answers` SET `right`=? WHERE id=?");
  $update->execute(array($this->right,$answerId));
  }

public function checkPendingAnswers($answerId){
  global $con;
  $answerData = $this->getAnswerData($answerId);
  $select=$con->prepare("SELECT * FROM `answers` WHERE quizId = ?  and answers.right=-1 ORDER by id DESC");
  $select->execute(array($answerData['quizId']));
if(empty($select->fetchAll())){
   $quiz = new userQuiz();
   $quiz->submitQuiz($answerData['quizId']);
}
 
}


}