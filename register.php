<?php
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/WishlistController.php');

$auth->isLoggedin();
$title = "Register";
include('inc/header.php');

?>
<style>
    .is-invalid {
        border: 1px solid red !important;
    }

    .is-valid {
        border: 1px solid green;
    }

    #error {
        color: red;
        display: none;
    }
</style>

<section class="inner-section"></section>

<section class="inner-section" >
    <div class="container">
             <?php include('message.php')?>
        <div class="row">
            <div class="col-lg-12">
                <p id="error">Please Fill All The Details Properly</p>
            </div>
            <div class="col-lg-12">
                <?php include('message.php')?>
                <form action="" class="" method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                        <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name">
                    </div>

                    <div class="form-group">
                    <input class="form-control" type="text" id="email" name="email" name="email" placeholder="Email*">
                    </div>

                    <div class="form-group">
                    <input class="form-control" type="password" id="password" name="password" name="password" placeholder="Password*">
                    <p style="display:none; color:red;" id="pass_err">Password must contain of 1 uppercase character,1 lowercase character, 1 digit,1 special character, and minimum length of 8 characters.</p>
                   
                    </div>
                    <div class="form-group">
                    <input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password*">
                    <label class="checkbox-inline">
                        <input type="checkbox" onclick="showPassword()">Show Password
                    </label>
                    </div>
                   
                    <div class="form-group">
                        <button name="register-btn" type="submit" class="btn btn-inline" type="submit">CREATE ACCOUNT</button>
                    </div>
                </form>
                  <div><p>Already registered? Click <a href="login.php">here</a> to Login</p></div>
            </div>
        </div>
    </div>
</section>


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

    var fname = document.getElementById("fname");
    var email = document.getElementById("email");
    var passowrd = document.getElementById("password");
    var cpassword = document.getElementById("cpassword");

    let validEmail = false;
    let validPassword = false;
    let validName = false;

    fname.addEventListener('blur', () => {
        let str = fname.value;
        // alert(str);
        console.log(str);
        if (str) {
            fname.classList.add('is-valid');
            fname.classList.remove('is-invalid');
            validName = true;
            // alert(str);
        } else {
            fname.classList.remove('is-valid');
            fname.classList.add('is-invalid');
            validName = false;

        }
    })

    email.addEventListener('blur', () => {
        console.log("email is blurred");
        let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        let str = email.value;
        console.log(regex, str);
        if (regex.test(str)) {
            email.classList.add('is-valid');
            email.classList.remove('is-invalid');
            validEmail = true;
        } else {
            email.classList.remove('is-valid');
            email.classList.add('is-invalid');
            validEmail = false;

        }
    })
    password.addEventListener('blur', () => {
        console.log("phone is blurred");
        let regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        let str = password.value;
        console.log(str);
        if (regex.test(str)) {
            password.classList.add('is-valid');
            password.classList.remove('is-invalid');
            document.getElementById("pass_err").style.display = 'none';
            validPassword = true;

        } else {
            password.classList.remove('is-valid');
            document.getElementById("pass_err").style.display = 'block';
            password.classList.add('is-invalid');
            validPassword = false;
        }
    })

    function validateForm() {
        if (validEmail && validPassword) {
            document.getElementById("error").style.display = "none";
            return true;
    
        } else {
           
            document.getElementById("error").style.display = "block";
            return false;
             

        }
    }
</script>

<?php
include('inc/footer.php');
?>