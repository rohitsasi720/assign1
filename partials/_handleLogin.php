<?php
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include(__DIR__.'/../dbcon.php');
 $email = $_POST['loginEmail'];
 $pass = $_POST['loginPass'];

 $sql = "SELECT * from `users` WHERE user_email='$email'";
    $result = mysqli_query($con, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;
            header("Location: /assign1/index.php?login=true");
            exit();  
        } 
        else{
            $showError="Please check your username or password"; 
        }
    }
    else{
        $showError="Please check your username or password"; 
    }  
    header("Location: /assign1/index.php?login=false&error=$showError");  
}
?>