<?php
require_once "..\config.php";
 
$email = $fullname = $telp = $username = $password = "";
$email_err = $fullname_err = $telp_err = $username_err = $password_err = "";
$param_username = $param_password = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a correct email.";
    } elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
        $email_err = "Please enter a correct email.";
    } else{
        $sql = "SELECT Email FROM tb_daftar WHERE Email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST["email"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["fullname"]))){
        $fullname_err = "Please enter your fullname.";     
    } elseif(strlen(trim($_POST["fullname"])) < 10 && !preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["fullname"]))) {
        $fullname_err = "Password must not contain special characters and have atleast 10 characters";
    }else{
        $fullname = trim($_POST["fullname"]);
    }

    if(empty(trim($_POST["telp"]))){
        $telp_err = "Please enter your number phone.";     
    } else{
        $telp = trim($_POST["telp"]);
    }

    
    if(empty($fullname_err) && empty($address_err) && empty($telp_err) && empty($email_err)){
 
        function generate_username($email){
            $fullname = preg_replace('/[^A-Za-z]/', '', $email);
            $email = substr($email, 0, 8);
            return $email;
        };
        $username = generate_username($email);

        function generate_password($fullname){
            $fullname = preg_replace('/[^A-Za-z]/', '', $fullname);
            $password = substr($fullname, 0, 5)."123";
            return $password;
        };
        $password = strtolower(generate_password($fullname));

        $sql = "INSERT INTO tb_daftar(Nama_Lengkap, Email, no_hp, Username, Password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "sssss", $param_fullname, $param_email, $param_telp, $param_username, $param_password);
            $param_email = $email;
            $param_fullname = $fullname;
            $param_telp = $telp;
            $param_username = $username;
            $param_password =  md5($password);
            

            if(mysqli_stmt_execute($stmt)){
                $sql = "INSERT INTO tb_login VALUES (null, '$param_username', '$param_password', '$param_fullname', 'User')";
                mysqli_query($link, $sql);
                // jika ingin langsung ke page login
                // header("location: login.php");
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
    <title>Sign Up</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap'>
   <link rel="stylesheet" href="./styleLoginForm.css">
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
            <h2 class="login-title">Sign Up</h2>
            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="fullname" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fullname; ?>">
                <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
            </div>
            <div class="form-group">
                <label>Number Phone</label>
                <input type="number" name="telp" class="form-control <?php echo (!empty($telp_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telp; ?>">
                <span class="invalid-feedback"><?php echo $telp_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>        
            <div class="form-group">
                <input type="submit" class="btn login-btn" value="Submit">
            </div>
            <?php 
            if(empty($fullname_err) && empty($telp_err) && empty($email_err) && $_SERVER["REQUEST_METHOD"] == "POST"){
                echo '<div class="alert alert-success">'. "<center>Your Account:</center>"."<br>Username = $username". "<br>Password = $password". '</div>';
            };
            ?>
            </form>           
            <p class="login-wrapper-footer-text">Already have an account? <a href="login.php" class="text-rese ">Sign up here!</a></p>
          </div>
        </div>
      </div>
    </div>
</body>
</html>

