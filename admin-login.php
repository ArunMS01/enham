<?php
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
$auth->isLoggedin();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Enham Admin Login</title>
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
</head>

<body>
    <div class="container">
        <div class="card p-4 mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                        
                            <h1 class="section-title">Admin Login</h1>
                            <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                         Sit aliquid,  Non distinctio vel iste.</p> -->
                            <p id="error">Please Fill All The Details</p>
                            <?php include('message.php') ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                       
                            <form action="" class="" method="POST" onsubmit="return validateForm()">

                                <div class="form-group">
                                <input class="form-control" type="text" id="email" name="email"  placeholder="Email*">
                                </div>
                                <div class="form-group">
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password*">
                                <p style="display:none; color:red;" id="pass_err">Password must contain of 1 uppercase character,1 lowercase character, 1 digit,1 special character, and minimum length of 8 characters.</p>

                                </div>
                                    <div class="form-group">
                                    <label class="checkbox-inline">
                                    <input type="checkbox" onclick="showPassword()">Show Password

                                </label>
                                    </div>
                              
                            
                                <div class="form-group">
                                    <button name="admin-login-btn" type="submit" class="btn btn-success" type="submit">LOGIN</button>
                                </div>
                            </form>

                   
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

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
</body>

</html>