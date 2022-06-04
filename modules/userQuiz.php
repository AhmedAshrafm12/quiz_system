<?php
class userQuiz{
public  $userName , $board , $dateTime	;


public function insert(){
global $con;
$insert=$con->prepare("INSERT INTO `usersquizes`(`userName`, `board`) VALUES (?,?)");
$insert->execute(array($this->userName,$this->board));
return $con->lastInsertId(); 
}

public function getQuizData($quizId){
    global $con;
    $select=$con->prepare("SELECT * from usersquizes where id=? LIMIT 1");
    $select->execute(array($quizId));
    return $select->fetch();
  }
  
public function validateQuizName(){
    global $con;
    $select=$con->prepare("SELECT * FROM `usersquizes` WHERE `userName` = ?");
    $select->execute(array($this->userName));
    return $select->rowCount();
  }
 
 public function getQuizQustionsAndAnswers($quizId){
   global $con;
   global $con;
   $select=$con->prepare("SELECT questions.*, answers.*, answers.id as answerId ,usersquizes.checked  from answers 
   INNER JOIN questions 
   on answers.questionId = questions.id
   INNER JOIN usersquizes
   on usersquizes.id = answers.quizId
   where answers.quizId = ? ");
   $select->execute(array($quizId));
   return $select->fetchAll();
  
 } 
 public function getSubmittedQuizQustionsAndAnswers($quizId){
   global $con;

      $select=$con->prepare("SELECT questions.*, answers.* ,usersquizes.checked  from answers 
      INNER JOIN questions 
      on answers.questionId = questions.id
      INNER JOIN usersquizes
      on usersquizes.id = answers.quizId
      where answers.quizId = ? and usersquizes.checked = 1");
      $select->execute(array($quizId));
   $select->execute(array($quizId));
   return $select->fetchAll();
  
 } 
 public function submitQuiz($quizId){
   global $con;
   $update=$con->prepare("UPDATE `usersquizes` SET `checked`=1 WHERE id=?");
   $update->execute(array($quizId));

}

public function submitQuizRate($board , $quizId){
  global $con;
  $select=$con->prepare("SELECT * FROM `questions` WHERE `board` = ?");
  $select->execute(array($board));
  $questions = $select->rowCount();

  $select2=$con->prepare("SELECT * FROM `answers` WHERE `quizId`=? AND `right`=1");
  $select2->execute(array($quizId));
  $rightAnswers = $select2->rowCount();
$rate = $rightAnswers/$questions;;
  $select2=$con->prepare("UPDATE `usersquizes` SET `rate`=? WHERE id=?");
  $select2->execute(array($rate,$quizId));
}
public function getUserRank($board){
  global $con;
  $select=$con->prepare("SELECT * FROM `usersquizes` WHERE board = ? ORDER by rate  DESC");
  $select->execute(array($board));
  $rank = $select->fetchAll();
  return $rank;

}
public function getBoardQuestions($board){
  global $con;
  $select=$con->prepare("SELECT * FROM `questions` WHERE board= ?");
  $select->execute(array($board));
  $questions = $select->fetchAll();
  return $questions;

}

}

?>