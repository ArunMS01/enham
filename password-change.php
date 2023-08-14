<?php
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/WishlistController.php');
$auth->isLoggedin();
$title = "Password Reset";
include('inc/header.php');


?>
<style>
  .is-invalid{
    border:1px solid red !important;
  }
  .is-valid{
    border:1px solid green;
  }
  #error{
    color:red;
    display:none;
  }
</style>
  <section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;">
    <div class="container">
        <h2>Change Your password</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Your password</li>
        </ol>
    </div>
</section>

<!-- LOGIN AREA START (Register) -->
<div class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Reset Password</h1>
                    <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                         Sit aliquid,  Non distinctio vel iste.</p> -->
                         <p id ="error">Please Fill All The Details</p>
                         <?php include('message.php')?>
                </div>
            </div>
        </div>
        <?php
        $token = validateInput($db->conn, $_GET['token']);
        $email = validateInput($db->conn, $_GET['email']);
        ?>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="">
                    <form action="" class="" method="POST" onsubmit="return validateForm()">
                        <div class="form-group">
                        <input class="form-control" name="pass_reset_token" type="hidden" value="<?php echo $token;?>">
                        <input class="form-control" type="password"  id="password" name="password"  placeholder="Password*">
                        <p style="display:none; color:red;" id = "pass_err">Password must contain of 1 uppercase character,1 lowercase character, 1 digit,1 special character, and minimum length of 8 characters.</p>
                        </div>
                        
                        <div class="form-group">
                        <label class="checkbox-inline">
                        <input  type="checkbox" onclick="showPassword()">Show Password
                           
                        </label>
                          </div>
                             <div class="form-group">
                         <input class="form-control" type="password"  id="passwordb"  name="cpassword" placeholder="Confirm Password*">
                        <p style="display:none; color:red;" id = "pass_errb">Password must contain of 1 uppercase character,1 lowercase character, 1 digit,1 special character, and minimum length of 8 characters.</p>
                          </div>
                        
                        <div class="form-group">
                        <label class="checkbox-inline">
                        <input  type="checkbox" onclick="showPasswordb()">Show Password
                           
                        </label>
                         </div>
                        <!-- <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            By clicking "create account", I consent to the privacy policy.
                        </label> -->
                        <div class="form-group">
                            <button name="reset-pass-btn" type="submit" class="btn btn-outline" type="submit">UPDATE PASSWORD</button>
                        </div>
                    </form>
                 
                </div>
            </div>
        </div>
    </div>
</div>


<script>

function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
         
            }
     
     function showPasswordb() {
            var x = document.getElementById("passwordb");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
         
            }
   
        var passowrd = document.getElementById("password");
         var passowrdb = document.getElementById("passwordb");


       
let validPassword = false;
let validPasswordb = false;



password.addEventListener('change', ()=>{
    console.log("phone is blurred");
    let str = password.value;
    console.log(str);
    if (str.match(/[a-z]/g) && str.match(
                    /[A-Z]/g) && str.match(
                    /[0-9]/g) && str.match(
                    /[^a-zA-Z\d]/g) && str.length >= 8){
                      password.classList.add('is-valid');
                        password.classList.remove('is-invalid');
                        document.getElementById("pass_err").style.display = 'none';
                        validPassword = true;
                        
                    }
        else{
          password.classList.remove('is-valid');
          document.getElementById("pass_err").style.display = 'block';
            password.classList.add('is-invalid');
                        validPassword = false;
        }
})

passwordb.addEventListener('change', ()=>{
    console.log("phone is blurred");
    let str = passwordb.value;
    console.log(str);
    if (str.match(/[a-z]/g) && str.match(
                    /[A-Z]/g) && str.match(
                    /[0-9]/g) && str.match(
                    /[^a-zA-Z\d]/g) && str.length >= 8){
                      passwordb.classList.add('is-valid');
                        passwordb.classList.remove('is-invalid');
                        document.getElementById("pass_errb").style.display = 'none';
                        validPasswordb = true;
                        
                    }
        else{
          password.classList.remove('is-valid');
          document.getElementById("pass_errb").style.display = 'block';
            password.classList.add('is-invalid');
                        validPasswordb = false;
        }
})

function validateForm(){
if(validPassword && validPasswordb){
  document.getElementById("error").style.display = "none";
  return true;
}

else{
  document.getElementById("error").style.display = "block";
  console.log("false");
  return false;
  
}
      }
  </script>

<?php
include('inc/footer.php');
?>

