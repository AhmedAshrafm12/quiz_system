<?php
class user{
public  $userName , $board , $password	;


public function insert(){
global $con;
$insert=$con->prepare("INSERT INTO `usersquizes`(`userName`, `board`) VALUES (?,?)");
$insert->execute(array($this->userName,$this->board));
return $con->lastInsertId(); 
}

public function login(){
    global $con;
    $select=$con->prepare("SELECT * FROM `admin` WHERE userName=? and password=? LIMIT 1");
    $select->execute(array($this->userName,$this->password));
    return $select->fetch();
  }
  
public function validateQuizName(){
    global $con;
    $select=$con->prepare("SELECT * FROM `usersquizes` WHERE `userName` = ?");
    $select->execute(array($this->userName));
    return $select->rowCount();
  }
  

}


?>