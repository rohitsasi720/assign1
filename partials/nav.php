<?php
session_start();
echo '<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #002045;">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php" style="font-family: \'Serif\';">Assignment</a>'; 

    $em = $_SESSION['useremail'];
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '  <a href="partials/_logout.php" class="btn btn-outline-secondary" type="submit">Logout</a>';
    }
    else{
      echo '
  </div>
<button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
  <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
  </div>';
    }
 echo ' 
</div>
</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success! </strong> You can now login to your account
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; 
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
  $showError=$_GET['error'];
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>Error! </strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if(isset($_GET['login']) && $_GET['login']=="false"){
  $showError=$_GET['error'];
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>Error! </strong> '.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>