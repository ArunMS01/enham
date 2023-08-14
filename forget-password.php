<?php
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/WishlistController.php');
$auth->isLoggedin();
$title = "Forget Password";
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
        <h2>Forget Password?</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">/Forget password</li>
        </ol>
    </div>
</section>

<!-- LOGIN AREA START (Register) -->
<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Enter Your Mail</h1>
                    <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                         Sit aliquid,  Non distinctio vel iste.</p> -->
                         <p id ="error">Please Fill All The Details</p>
                         <?php include('message.php')?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="account-login-inner">
                    <form action="" class="" method="POST">
                       
                        <div class="form-group">
                        <input class="form-control" type="text" required  id="email" name="email" name="email" placeholder="Email*">
                        </div>
                        
                  
                        <!-- <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            By clicking "create account", I consent to the privacy policy.
                        </label> -->
                        <div class="form-group">
                            <button name="forget-btn" type="submit" class="btn btn-inline" type="submit">Send Reset Link</button>
                        </div>
                    </form>
                    <!-- <div class="by-agree text-center">
                   
                        <div class="go-to-btn mt-50">
                            <a href="login.php">Login to Your account</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>


<script>

function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
         
            }
     
   
        var email = document.getElementById("email");
        var passowrd = document.getElementById("password");


        let validEmail = false;
let validPassword = false;


email.addEventListener('change', ()=>{
    console.log("email is blurred");
    let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
    let str = email.value;
    console.log(regex, str);
    if(regex.test(str)){
      email.classList.add('is-valid');
        email.classList.remove('is-invalid');
        validEmail = true;
    }
    else{
      email.classList.remove('is-valid');
        email.classList.add('is-invalid');
        validEmail = false;

    }
})
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

function validateForm(){
if(validEmail && validPassword){
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

