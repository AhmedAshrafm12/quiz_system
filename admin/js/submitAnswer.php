
<script>
$('.checkAnswer').click(function(){
 let  right  = $(this).text() == 'true' ?  1  :  0;
  $.ajax({url: "../apis/checkAnswer.php",
        type:"POST",
        data:{
         answerId  : $(this).data('id') ,
         right : right,
        },        
        success: function(result){
           window.location.reload();
}})})
$('#delete').click(function(){
  $.ajax({url: "../apis/deleteQuestion.php",
        type:"POST",
        data:{
        questionId : $(this).data('id')
        },        
        success: function(result){
           window.location.reload();
}})})


</script>
