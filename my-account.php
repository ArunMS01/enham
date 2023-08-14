<?php
$title = "My account";
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/AuthenticationController.php');
include('controllers/UserordersController.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/WishlistController.php');
$authenticated = new AuthenticationController;
$data = $authenticated->authDetail();
include('inc/header.php');
?>
<style>
    @media only screen and (min-width:360px) and (max-width:768px) {
        .wrapped-sm {
            flex-direction: column;
        }

    }


    .nav-pills .nav-link.active {
        background: #3169d8;
        color: #fff;
        border-radius: 57px;
    }
</style>
<section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;">
    <div class="container">
        <h2>My Account</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" style="color:#fff;" aria-current="page"> /My account</li>
        </ol>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
              
                <div class="account-card">
                      <a href="orders.php">
                    <h3 class="account-title">Orders</h3>
                    </a>
                </div>
                
            </div>
             <div class="col-md-4">
                  
                <div class="account-card" style="border:1px solid #3169d8;">
                     <a href="my-account.php" >
                     <h3 class="account-title">Profile</h3>
                      </a>
                </div>
                 
            </div>
             <div class="col-md-4">
                <div class="account-card">
                     <form action="" method="POST">
                                <button style="font-size: 1.5rem;" type="submit" class="account-title" name="logout_btn">Logout</button>
                            </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                   
                    <div class="col-md-12 account-card px-4 py-5">
                          
                                <p>Hello <strong><?php echo $data['user_name'] ?> Edit your profile here.</strong> </p>


                                <form action="codes/user.php" method="POST">
                                    <div class="row mb-50">
                                        <div class="col-md-6">
                                            <label>First name:</label>
                                            <input class="form-control" type="text" name="firstname" value="<?php echo $data['user_name'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Last name:</label>
                                            <input class="form-control" type="text" name="lastname" value="<?php echo $data['last_name'] ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Email:</label>
                                            <input class="form-control" type="email" name="email" value="<?php echo $data['email'] ?>">
                                            <input type="hidden" name="userid" value="<?php echo $data['id'] ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Phone:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span style="padding:10px" class="input-group-text" id="basic-addon1">+91</span>
                                                </div>
                                                <input type="text" class="form-control" pattern="[0-9]{10}" required title="Minimum 10 digits allowed" name="phone" value="<?php echo str_replace('+91', '', $data['phone'])  ?>" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <label>Address 1:</label>
                                            <input class="form-control" type="text" name="address1" value="<?php echo $data['address1'] ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Address 2:</label>
                                            <input class="form-control" type="text" name="address2" value="<?php echo $data['address2'] ?>">
                                        </div>



                                        <div class="col-md-6">
                                            <label>Country:</label>
                                            <input class="form-control" type="" disabled value="India">
                                            <input class="form-control" type="hidden" name="country" value="India">
                                        </div>

                                        <div class="col-md-6">
                                            <label>State:</label>
                                            <!-- <input class="form-control" type="text" name="state" id="state" value="<?php echo $data['zone'] ?>"> -->
                                            <select name="state" class="form-control" id="state">
                                           <option value="Andhra Pradesh">Andhra Pradesh</option>
<option <?php if($data['zone'] == 'Andaman and Nicobar Islands'){echo "selected";}?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option <?php if($data['zone'] == 'Arunachal Pradesh'){echo "selected";}?> value="Arunachal Pradesh">Arunachal Pradesh</option>
<option <?php if($data['zone'] == 'Assam'){echo "selected";}?> value="Assam">Assam</option>
<option <?php if($data['zone'] == 'Bihar'){echo "selected";}?> value="Bihar">Bihar</option>
<option <?php if($data['zone'] == 'Chandigarh'){echo "selected";}?> value="Chandigarh">Chandigarh</option>
<option <?php if($data['zone'] == 'Chhattisgarh'){echo "selected";}?> value="Chhattisgarh">Chhattisgarh</option>
<option <?php if($data['zone'] == 'Dadar and Nagar Haveli'){echo "selected";}?> value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option <?php if($data['zone'] == 'Daman and Diu'){echo "selected";}?> value="Daman and Diu">Daman and Diu</option>
<option <?php if($data['zone'] == 'Delhi'){echo "selected";}?> value="Delhi">Delhi</option>
<option <?php if($data['zone'] == 'Lakshadweep'){echo "selected";}?> value="Lakshadweep">Lakshadweep</option>
<option <?php if($data['zone'] == 'Puducherry'){echo "selected";}?> value="Puducherry">Puducherry</option>
<option <?php if($data['zone'] == 'Goa'){echo "selected";}?> value="Goa">Goa</option>
<option <?php if($data['zone'] == 'Gujarat'){echo "selected";}?> value="Gujarat">Gujarat</option>
<option <?php if($data['zone'] == 'Haryana'){echo "selected";}?> value="Haryana">Haryana</option>
<option <?php if($data['zone'] == 'Himachal Pradesh'){echo "selected";}?> value="Himachal Pradesh">Himachal Pradesh</option>
<option <?php if($data['zone'] == 'Jammu and Kashmir'){echo "selected";}?> value="Jammu and Kashmir">Jammu and Kashmir</option>
<option <?php if($data['zone'] == 'Jharkhand'){echo "selected";}?> value="Jharkhand">Jharkhand</option>
<option <?php if($data['zone'] == 'Karnataka'){echo "selected";}?> value="Karnataka">Karnataka</option>
<option <?php if($data['zone']== 'Kerala'){echo "selected";}?> value="Kerala">Kerala</option>
<option <?php if($data['zone'] == 'Madhya Pradesh'){echo "selected";}?> value="Madhya Pradesh">Madhya Pradesh</option>
<option <?php if($data['zone'] == 'Maharashtra'){echo "selected";}?> value="Maharashtra">Maharashtra</option>
<option <?php if($data['zone'] == 'Manipur'){echo "selected";}?> value="Manipur">Manipur</option>
<option <?php if($data['zone'] == 'Meghalaya'){echo "selected";}?> value="Meghalaya">Meghalaya</option>
<option <?php if($data['zone'] == 'Mizoram'){echo "selected";}?> value="Mizoram">Mizoram</option>
<option <?php if($data['zone'] == 'Nagaland'){echo "selected";}?> value="Nagaland">Nagaland</option>
<option <?php if($data['zone'] == 'Odisha'){echo "selected";}?> value="Odisha">Odisha</option>
<option <?php if($data['zone'] == 'Punjab'){echo "selected";}?> value="Punjab">Punjab</option>
<option <?php if($data['zone'] == 'Rajasthan'){echo "selected";}?> value="Rajasthan">Rajasthan</option>
<option <?php if($data['zone'] == 'Sikkim'){echo "selected";}?> value="Sikkim">Sikkim</option>
<option <?php if($data['zone'] == 'Tamil Nadu'){echo "selected";}?> value="Tamil Nadu">Tamil Nadu</option>
<option <?php if($data['zone'] == 'Telangana'){echo "selected";}?> value="Telangana">Telangana</option>
<option <?php if($data['zone'] == 'Tripura'){echo "selected";}?> value="Tripura">Tripura</option>
<option <?php if($data['zone'] == 'Uttar Pradesh'){echo "selected";}?> value="Uttar Pradesh">Uttar Pradesh</option>
<option <?php if($data['zone'] == 'Uttarakhand'){echo "selected";}?> value="Uttarakhand">Uttarakhand</option>
<option <?php if($data['zone'] == 'West Bengal'){echo "selected";}?> value="West Bengal">West Bengal</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>City:</label>
                                            <input class="form-control" type="text" name="city" value="<?php echo $data['city'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Zip:</label>
                                            <input class="form-control" type="text" name="zip" value="<?php echo $data['zip'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" style="margin-top:10px" name="update_btn" class="btn btn-inline">Save Changes</button>
                                    </div>
                                </form>
                          
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <?php
        $useraddresses = new UserordersController;
        $getuseradress = $useraddresses->getuseraddresses($data['id']);
        if($getuseradress){
        ?>
            <h4>Edit Your address</h4>
        <?php
        }
        ?>
        <div class="row faq-parent">
              <a class="faq-que" href="javascript:void(0)" ></a>
              <form class="faq-ans">
                  
              </form>
            <?php
            
            if($getuseradress){
                $count = 1;
                foreach($getuseradress as $useraddresses){
            
            ?>
   
            <div class="col-md-12 faq-child">
                 <a class="faq-que" href="javascript:void(0)" >Click To Edit Address <?php echo $count; ?></a>
                <div class="faq-ans">
               <form  action="codes/user.php" method="POST">
                   <div class="form-group">
                       <label>Phone</label>
                       <input type="number" value="<?php echo $useraddresses['phone']?>" class="form-control" name="phone">
                       <input type="hidden" name="addressid" value="<?php echo $useraddresses['id']?>">
                        <input type="hidden" name="customerid" value="<?php echo $data['id']?>">
                   </div>
                     <div class="form-group">
                       <label>Address 1</label>
                       <input type="text" value="<?php echo $useraddresses['address1']?>" class="form-control" name="addressf">
                   </div>
                     <div class="form-group">
                       <label>Address 2</label>
                       <input type="text" value="<?php echo $useraddresses['address2']?>" class="form-control" name="address_second">
                   </div>
                     <div class="form-group">
                       <label>city</label>
                       <input type="text" value="<?php echo $useraddresses['city']?>" class="form-control" name="city">
                   </div>
                     <div class="form-group">
                       <label>State</label>
                     <select class="form-control" name="state">
                         <option value="Andhra Pradesh">Andhra Pradesh</option>
<option <?php if($useraddresses['state'] == 'Andaman and Nicobar Islands'){echo "selected";}?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option <?php if($useraddresses['state'] == 'Arunachal Pradesh'){echo "selected";}?> value="Arunachal Pradesh">Arunachal Pradesh</option>
<option <?php if($useraddresses['state'] == 'Assam'){echo "selected";}?> value="Assam">Assam</option>
<option <?php if($useraddresses['state'] == 'Bihar'){echo "selected";}?> value="Bihar">Bihar</option>
<option <?php if($useraddresses['state'] == 'Chandigarh'){echo "selected";}?> value="Chandigarh">Chandigarh</option>
<option <?php if($useraddresses['state'] == 'Chhattisgarh'){echo "selected";}?> value="Chhattisgarh">Chhattisgarh</option>
<option <?php if($useraddresses['state'] == 'Dadar and Nagar Haveli'){echo "selected";}?> value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option <?php if($useraddresses['state'] == 'Daman and Diu'){echo "selected";}?> value="Daman and Diu">Daman and Diu</option>
<option <?php if($useraddresses['state'] == 'Delhi'){echo "selected";}?> value="Delhi">Delhi</option>
<option <?php if($useraddresses['state'] == 'Lakshadweep'){echo "selected";}?> value="Lakshadweep">Lakshadweep</option>
<option <?php if($useraddresses['state'] == 'Puducherry'){echo "selected";}?> value="Puducherry">Puducherry</option>
<option <?php if($useraddresses['state'] == 'Goa'){echo "selected";}?> value="Goa">Goa</option>
<option <?php if($useraddresses['state'] == 'Gujarat'){echo "selected";}?> value="Gujarat">Gujarat</option>
<option <?php if($useraddresses['state'] == 'Haryana'){echo "selected";}?> value="Haryana">Haryana</option>
<option <?php if($useraddresses['state'] == 'Himachal Pradesh'){echo "selected";}?> value="Himachal Pradesh">Himachal Pradesh</option>
<option <?php if($useraddresses['state'] == 'Jammu and Kashmir'){echo "selected";}?> value="Jammu and Kashmir">Jammu and Kashmir</option>
<option <?php if($useraddresses['state'] == 'Jharkhand'){echo "selected";}?> value="Jharkhand">Jharkhand</option>
<option <?php if($useraddresses['state'] == 'Karnataka'){echo "selected";}?> value="Karnataka">Karnataka</option>
<option <?php if($useraddresses['state'] == 'Kerala'){echo "selected";}?> value="Kerala">Kerala</option>
<option <?php if($useraddresses['state'] == 'Madhya Pradesh'){echo "selected";}?> value="Madhya Pradesh">Madhya Pradesh</option>
<option <?php if($useraddresses['state'] == 'Maharashtra'){echo "selected";}?> value="Maharashtra">Maharashtra</option>
<option <?php if($useraddresses['state'] == 'Manipur'){echo "selected";}?> value="Manipur">Manipur</option>
<option <?php if($useraddresses['state'] == 'Meghalaya'){echo "selected";}?> value="Meghalaya">Meghalaya</option>
<option <?php if($useraddresses['state'] == 'Mizoram'){echo "selected";}?> value="Mizoram">Mizoram</option>
<option <?php if($useraddresses['state'] == 'Nagaland'){echo "selected";}?> value="Nagaland">Nagaland</option>
<option <?php if($useraddresses['state'] == 'Odisha'){echo "selected";}?> value="Odisha">Odisha</option>
<option <?php if($useraddresses['state'] == 'Punjab'){echo "selected";}?> value="Punjab">Punjab</option>
<option <?php if($useraddresses['state'] == 'Rajasthan'){echo "selected";}?> value="Rajasthan">Rajasthan</option>
<option <?php if($useraddresses['state'] == 'Sikkim'){echo "selected";}?> value="Sikkim">Sikkim</option>
<option <?php if($useraddresses['state'] == 'Tamil Nadu'){echo "selected";}?> value="Tamil Nadu">Tamil Nadu</option>
<option <?php if($useraddresses['state'] == 'Telangana'){echo "selected";}?> value="Telangana">Telangana</option>
<option <?php if($useraddresses['state'] == 'Tripura'){echo "selected";}?> value="Tripura">Tripura</option>
<option <?php if($useraddresses['state'] == 'Uttar Pradesh'){echo "selected";}?> value="Uttar Pradesh">Uttar Pradesh</option>
<option <?php if($useraddresses['state'] == 'Uttarakhand'){echo "selected";}?> value="Uttarakhand">Uttarakhand</option>
<option <?php if($useraddresses['state'] == 'West Bengal'){echo "selected";}?> value="West Bengal">West Bengal</option>
                     </select>
                   </div>
                     <div class="form-group">
                       <label>Country</label>
                       <input type="text" value="<?php echo $useraddresses['country']?>" class="form-control" name="country">
                   </div>
                    <div class="form-group">
                       <label>Zip</label>
                       <input type="number" value="<?php echo $useraddresses['zip']?>" class="form-control" name="zip">
                   </div>
                   <div class="form-group">
                       <button name="update_address" type="submit" class="btn btn-inline">Update Address</button>
                   </div>
               </form>
                <form action="codes/user.php" method="POST">
                        <input type="hidden" name="addressid" value="<?php echo $useraddresses['id']?>">
                        <input type="hidden" name="customerid" value="<?php echo $data['id']?>">
                        <button type="submit" name="delete_address" class="btn btn-outline">Remove address <?php echo $count; ?></button>
                 </form>
                 </div>
            </div>
            <?php
            $count++;
            }
            }
            ?>
        </div>
    </div>
</section>
<script src="country.js"></script>
<script>
    // drawstate("IN");

    // function drawstate(val) {
    //     let customer_city = "<?php echo $data['zone'] ?>";
    //     countryoption = val;
    //     $('#state').html('<option value="'+ customer_city +'">' + customer_city + '</option>');

    //     $.each(state, function(index, value) {
    //         // APPEND OR INSERT DATA TO SELECT ELEMENT.
    //         if (value.countryCode == val) {
    //             $('#state').append('<option  value="' + value.name + '" data-country="' + value.countryCode + '">' + value.name + '</option>');
    //         }
    //     });
    // }
</script>
<?php
include('inc/footer.php');
?>