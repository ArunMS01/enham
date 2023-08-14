<?php
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/WishlistController.php');
$auth->isLoggedin();
$title = "Login";
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
<section class="inner-section">
    <div class="container">
        <?php include('message.php')?>
        <div class="row">
            <div class="col-lg-12">
                <form action="" class="" method="POST" onsubmit="return validateForm()">

                    <div class="form-group">
                        <input class="form-control" type="text" id="email" name="email" name="email" placeholder="Email*">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="password" name="password" name="password" placeholder="Password*">
                        <p style="display:none; color:red;" id="pass_err">Password must contain of 1 uppercase character,1 lowercase character, 1 digit,1 special character, and minimum length of 8 characters.</p>

                    </div>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" onclick="showPassword()">Show Password

                        </label>
                    </div>

                    <!-- <label class="checkbox-inline">
                           <input type="checkbox" value="">
                           By clicking "create account", I consent to the privacy policy.
                       </label> -->
                    <div class="form-group">
                        <button name="login-btn" type="submit" class="btn btn-outline" type="submit">LOGIN</button>
                    </div>
                </form>
                <div><p>New member? Click <a href="register.php">here</a> to Register</p></div>
                <div>
                    <a class="btn btn-inline" href="forget-password.php">Forget Password</a>
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


    email.addEventListener('change', () => {
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
    password.addEventListener('change', () => {
        console.log("phone is blurred");
        let str = password.value;
        console.log(str);
        if (str.match(/[a-z]/g) && str.match(
                /[A-Z]/g) && str.match(
                /[0-9]/g) && str.match(
                /[^a-zA-Z\d]/g) && str.length >= 8) {
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
            console.log("false");
            return false;

        }
    }
</script>

<?php
include('inc/footer.php');
?>