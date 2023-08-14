<?php
include('config/app.php');
include('controllers/CategoryController.php');
include('controllers/VerifyuserController.php');
include('controllers/WishlistController.php');
$title = "Activate User";
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
        <h2>Active Your Account</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Active Your Account</li>
        </ol>
    </div>
</section>


<div class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <?php
                       if (isset($_GET['token']) && isset($_GET['email'])) {
                        $token = validateInput($db->conn, $_GET['token']);
                        $email = validateInput($db->conn, $_GET['email']);
                        $verfiyuser = new VerifyuserController;
                        $result = $verfiyuser->verifyUser($token, $email);
                        if($result){
                            ?>
                            
                                 <h1 class="section-title">Your Account is verified Successfully</h1>
                                 <a class="btn btn-inline" href="login">Login Now</a>
                            
                            <?php
                        }
                        
                    }
                    ?>
                  
                         <?php include('message.php')?>
                </div>
            </div>
        </div>
      
    </div>
</div>
<!-- LOGIN AREA END -->


<script>

function showPassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("cpassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
            }
     
        var fname =  document.getElementById("fname");
        var email = document.getElementById("email");
        var passowrd = document.getElementById("password");
        var cpassword = document.getElementById("cpassword");

        let validEmail = false;
let validPassword = false;
let validName = false;

        fname.addEventListener('blur', ()=>{
          let str = fname.value;
          // alert(str);
          console.log(str);
    if(str){
      fname.classList.add('is-valid');
        fname.classList.remove('is-invalid');
        validName = true;
        // alert(str);
    }
    else{
      fname.classList.remove('is-valid');
        fname.classList.add('is-invalid');
        validName = false;

    }
})

email.addEventListener('blur', ()=>{
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
password.addEventListener('blur', ()=>{
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

