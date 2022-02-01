<?php
require('_dbconnect.php');


?>
<?php
$error = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

   
   
  
   $sql ="SELECT * FROM `users` WHERE `username`='$username'";
    $result = mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
   
if($num==1){
    while($num = mysqli_fetch_assoc($result)){
    $check = password_verify($password,$num['password']);
    if($check){

        session_start();
        $_SESSION['loggedin'] =true;
        $_SESSION['username'] = $username;
        header('location:_Welcome.php');
    }
    else{
        $error = true;
    }
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <?php include('header.php');?>

   
</head>
<body>
   
<div id="main-wrapper" class="container">
    <div class="row  justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0 ">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                            <?php
                                if($error) echo'
                            <h6 class="error">Invalid credentials</h6>
                            '
                            ?>
                                <div class="mb-2">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>


                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-2">Enter your username and password here!</p>

                                <form action="_login.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">username</label>
                                        <input type="text" class="form-control"name="username">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-theme">Login</button>
                                   
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">Hey!</h4>
                                    <p class="lead text-white">"You can access my blog here and can give me advice and solution to problems"</p>
                                    <p>- Prashant</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
        
 <p class="text-muted text-center mt-3 mb-0">Don't have an account yet? <a href="_signup.php?" class="text-primary ml-1">Signup</a></p>

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>
    <style>
        
  @import url('https://fonts.googleapis.com/css2?family=Anton&family=Russo+One&display=swap');
  *{
      font-family:russo one;
  }
        body{
    margin-top:80px;
    background: #f6f9fc;
}
h3{
    border-bottom:5px solid  #5369f8 ;
    border-radius:10px 2px 2px;
    width:75px;
}
.card{
    box-shadow: 0px 3px 24px 12px rgba(138,138,138,0.75);
-webkit-box-shadow: 0px 3px 24px 12px rgba(138,138,138,0.75);
-moz-box-shadow: 0px 3px 24px 12px rgba(138,138,138,0.75);
}
.account-block {
    padding: 0;
    background-image: url(https://images.pexels.com/photos/3265460/pexels-photo-3265460.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    position: relative;
}
.account-block .overlay {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0,0,0, 0.2);
}
.account-block .account-testimonial {
    text-align: center;
    color: #fff;
    position: absolute;
    margin: 0 auto;
    padding: 0 1.75rem;
    bottom: 3rem;
    left: 0;
    right: 0;
}

.text-theme {
    color: #5369f8 !important;
}

.btn-theme {
    background-color: #5369f8;
    border-color: #5369f8;
    color: #fff;
}
.btn:hover{
    color:wheat;
}
.error{
    font-weight:lighter;
    color:white;
    background-color:red;
    padding-left:5px;
    width:210px;
}
        </style>
</body>
</html>