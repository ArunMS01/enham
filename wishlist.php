<?php
$title = "Wishlist";
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/WishlistController.php');
include('controllers/ProductController.php');
include('controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$data = $authenticated->authDetail();
include('inc/header.php');
?>


<section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;">
    <div class="container">
        <h2>Wishlist Page</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">/Wishlist</li>
        </ol>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-scroll">
                            <table class="table-list">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                      
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $wishlist = new WishlistController;
                                    $userid = $data['id'];
                                    $result = $wishlist->getwishList($userid);
                                    //  print_r($result);
                                    if ($result) {
                                        $count =1;
                                        foreach ($result as $row) {
                                    ?>
                                            <tr>
                                                <td class="table-serial">
                                                    <h6><?php echo $count?></h6>
                                                </td>
                                                <td class="table-image"><img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $row['image'] ?>" alt="product"></td>
                                                <td class="table-name">
                                                    <h6><?php echo $row['name'] ?></h6>
                                                </td>
                                                <td class="table-price">
                                                    <h6>&#8377 <?php echo $row['price'] ?></h6>
                                                </td>
                                               
                                                <td class="table-action"><a class="view" href="product.php?url=<?php echo $row['url'] ?>" ><i class="fas fa-eye"></i></a><a class="trash remove_wishlist" href="#" data-prodid="<?php echo $row['id'] ?>" title="Remove Wishlist"><i class="icofont-trash"></i></a></td>
                                            </tr>
                                        <?php
                                        $count++;
                                        }
                                    } else {
                                        ?>
                                        <tr>No Items In Wishlist</tr>
                                    <?php
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



<script>
    $(document).on('click', '.remove_wishlist', function() {
        //  alert("hjd");
        let customerid = "<?php echo $data['id'] ?>";
        let productid = $(this).data('prodid');
        // alert(productid);
        // alert(customerid);
        $.ajax({
            url: "<?php echo SITE_URL; ?>codes/add-to-wishlist.php",
            method: "post",
            data: {
                productid: productid,
                customerid: customerid,
                action: 'delete-wishlist'
            },
            success: function(data) {
                if (data == 'success') {

                    location.reload();
                }
            }

        });
    });
</script>
<?php
include('inc/footer.php');
?>