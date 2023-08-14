<?php
$title = "Orders";
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
        <h2>View Orders</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" style="color:#fff" aria-current="page"> /View Orders</li>
        </ol>
    </div>
</section>

<section class="inner-section">
    <div class="container">
         <div class="row">
            <div class="col-md-4">
              
                <div class="account-card" style="border:1px solid #3169d8;">
                      <a href="orders.php">
                    <h3 class="account-title">View Orders</h3>
                    </a>
                </div>
                
            </div>
             <div class="col-md-4">
                  
                <div class="account-card">
                     <a href="my-account.php">
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
                   
                    <div class="col-md-12">
                       
                                <p>Hello <strong><?php echo $data['user_name'] ?></strong> </p>

                                <div class="table-scroll">
                                    <table class="table-list custom-responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Payment Mode</th>
                                                <th>Payment Status</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getProductdetails = new ProductController;
                                            $getorders = new UserordersController;
                                            $getallorders = $getorders->get_orders($data['id']);
                                            if ($getallorders) {
                                                // print_r($getallorders);
                                                $count = 1;
                                                foreach ($getallorders as $orders) {
                                                    $getOrderitems = $getorders->get_ordered_items($orders['id']);
                                                    if ($getOrderitems) {
                                                        foreach ($getOrderitems as $order_items) {
                                                            $productdetails = $getProductdetails->getProductnamebyId($order_items['product_id']);
                                                            if ($productdetails) {
                                                                foreach ($productdetails as $prod_detials) {
                                                                    $prodname = $prod_detials['name'];
                                                                    $prodimage = $prod_detials['image'];
                                                                }
                                                            }
                                            ?>
                                                            <tr>
                                                                <td data-label="Order"><?php echo $count; ?></td>
                                                                <td data-label="Name">
                                                                    <span>
                                                                        <div class="product-images-cart">
                                                                            <img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $prodimage; ?>" alt=" ">
                                                                        </div>
                                                                    </span>
                                                                    <?php echo $prodname; ?>
                                                                </td>
                                                                <?php
                                                                $date = strtotime($orders['ordered_on']);
                                                                ?>
                                                                <td data-label="Date"><?php echo date('d-M-Y', $date); ?> 
                                                     
                                                        
                                                                </td>
                                                                <td data-label="Payment Info">  <?php echo $orders['payment_info']?></td>
                                                                <td data-label="Payment Status"> 
                                                                 <?php echo $orders['payment_status']?> 
                                                                </td>
                                                                <td data-label="Status"><?php echo $order_items['item_status']; ?></td>
                                                                <td data-label="Action"><a href="view-orders.php?id=<?php echo $order_items['id'] ?>">View</a></td>
                                                            </tr>
                                            <?php
                                                        }
                                                    }
                                                    $count++;
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="country.js"></script>
<script>
    drawstate("IN");

    function drawstate(val) {
        let customer_city = "<?php echo $data['zone'] ?>";
        countryoption = val;
        $('#state').html('<option value="'+ customer_city +'">' + customer_city + '</option>');

        $.each(state, function(index, value) {
            // APPEND OR INSERT DATA TO SELECT ELEMENT.
            if (value.countryCode == val) {
                $('#state').append('<option  value="' + value.name + '" data-country="' + value.countryCode + '">' + value.name + '</option>');
            }
        });
    }
</script>
<?php
include('inc/footer.php');
?>