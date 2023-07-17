<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ..\dashboard\index.php");
    exit;
}
 
require_once "..\config.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $encrypt_pass = md5(strtolower(trim($_POST["password"])));
        $password = $encrypt_pass;
    }
    

    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT KodeLogin, username, password FROM tb_login WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){  
                    mysqli_stmt_bind_result($stmt, $KodeLogin, $username, $hashed_password); 
                    if(mysqli_stmt_fetch($stmt)){     
                        if($password == $hashed_password){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["Kode_KodeLogin"] = $KodeLogin;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: ..\dashboard\pages\index.php");
                        } else{
                        $login_err = "Invalid username or password.";
                        }
                    } else{
                    $login_err = "Invalid username or password.";
                    }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap'><link rel="stylesheet" href="./styleLoginForm.css">
        <!-- Favicon -->
    <link
      rel="icon"
      type="image/x-icon"
      href="../dashboard/assets/img/avatars/logoPNB.png"
    />
</head>
<body>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-md-7 intro-section">
          <div class="transparant"></div>
          <div class="intro-content-wrapper">
            <h1 class="intro-title">Sistem Penerimaan Mahasiswa Baru</h1>
            <p class="intro-text">website resmi Sipenmaru Politeknik Negeri Bali, pada website ini ....more describe in here</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-5 form-section">
          <div class="login-wrapper">
            <h2 class="login-title">Sign in</h2>
            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn login-btn" value="Login">
            </div>
            </form>           
            <p class="login-wrapper-footer-text">Need an account? <a href="register.php" class="text-rese">Sign up here!</a></p>
          </div>
        </div>
      </div>
    </div>
</body>
</html>

 