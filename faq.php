<?php
$title = "Privacy Policy";
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/RelatedProductController.php');
include('controllers/ReviewController.php');
include('controllers/WishlistController.php');
include('controllers/AuthenticationController.php');

include('inc/header.php');
?>
<section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;"><div class="container"><h2>faq questions</h2><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li><li style="color:#fff;" class="breadcrumb-item" aria-current="page">/ faq</li></ol></div></section>


<section class="inner-section faq-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="faq-parent">
                    <div class="faq-child">
                        <div class="faq-que"><button>Where do I find my orders?</button></div>
                        <div class="faq-ans" style="display: block;">
                            <p>You can acces your orders after login -> My account -> Orders</p>
                        </div>
                    </div>
                    <div class="faq-child">
                        <div class="faq-que"><button>Is my order always confirmed?</button></div>
                        <div class="faq-ans" style="display: none;">
                            <p>Yes, We do not Cancel your order. If cancelled on any unseen condition, Refund will be initiated.</p>
                        </div>
                    </div>
                    <div class="faq-child">
                        <div class="faq-que"><button>What is the refund Process?</button></div>
                        <div class="faq-ans" style="display: none;">
                            <p>On Cancellation or Return of a product, the refund is initiated to your account. Which will reflect in your account within 7 working days.</p>
                        </div>
                    </div>
                    <div class="faq-child">
                        <div class="faq-que"><button>When does my order gets delivered?</button></div>
                        <div class="faq-ans" style="display: none;">
                            <p>After you place an order, Be Patient you will Recieve your order between 6-8 working days</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>



<?php
include('inc/footer.php');
?>