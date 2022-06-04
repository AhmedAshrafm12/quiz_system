<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
include "../includes/connect.php";
include "../modules/questions.php";
$question = new question();
$question->delete($_POST['questionId']);
}




 ?>