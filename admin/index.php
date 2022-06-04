<?php 
include "../includes/head.php";
   if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "includes/connect.php";
     include "modules/user.php";
     $user  = new user();   
     $user->userName=$_POST['userName'];
     $user->password=md5($_POST['password']);
     if(!empty($user->login()))
     {
         session_start();
         $_SESSION['userId'] = $user->login()['id'];
         $_SESSION['board'] = $user->login()['board'];
         header("location:home.php");
     }
     else
     $error= 'wrong credentials';
      
   }
   
  
?>

<div class='container' style="padding: 50px;">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<h1 class='text-center'>login</h1>
<?php  if(isset($error)) echo "<div class='alert alert-danger'>$error</div>";?>
  <div class="mb-3 mt-3">
    <label for="userName" class="form-label">userName:</label>
    <input type="text" class="form-control" id="userName" placeholder="Enter email" name="userName">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
  </div>
  <div class="form-check mb-3">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



</div>






<?php include "../includes/footer.php";?>
