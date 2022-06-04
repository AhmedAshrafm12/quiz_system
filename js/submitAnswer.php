
<script>
let i ;
if(localStorage.getItem('counter'))
i=localStorage.getItem('counter');
else
i=10;
let counter =  setInterval(function(){
   document.getElementById('timer').innerHTML=i;
    i--;
    if(localStorage.getItem('counter'))
       localStorage.removeItem('counter');

localStorage.setItem("counter",i);
  if(i==0){
    submitAnswer();
  clearInterval(counter);
  document.getElementById('timerBox').innerHTML='time Out';
  $('#timerBox').addClass("bg-danger")
  $('#timerBox').css("color","#fff")
  $('#timerBox').css("padding","20px")
  $('.rightSide').css("border","2px solid red")

  }
},1000)


  function submitAnswer(){
    $.ajax({url: "apis/submitAnswer.php",
        type:"POST",
        data:{
         questionId  : <?php echo $questionData['id']; ?> ,
         answer : answerInput.value,
         quizId :  <?php echo $_SESSION['quizId']; ?> 
        },        
        success: function(result){
            setTimeout(function(){
                localStorage.removeItem("counter");
                window.location.reload();
               clearInterval(counter);
            },1000)
}}); }



   answer.onsubmit=function(e){
       $(answerInput).parent().parent().slideUp();
       e.preventDefault();       
       submitAnswer();

   }



 
</script>
