<?php
$title = "Contact Us";
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/WishlistController.php');
include('controllers/ProductController.php');
include('controllers/AuthenticationController.php');

include('inc/header.php');
?>

<style>
    .contact-card.active{
        background: #3169d7;
    }
    .contact-card:hover{
        background: #3169d7;
    }
    .contact-card i{
        background: #3169d7;
    }
    .contact-card.active i{
        color:#3169d7;
    }
    .contact-card:hover i{
        color:#3169d7;
    }
</style>

<section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;">
        <div class="container">
            <h2>contact us</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo SITE_URL?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">/Contact Us</li>
            </ol>
        </div>
    </section>

    <section class="inner-section contact-part">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card"><i class="icofont-location-pin"></i>
                        <h4>head office</h4>
                        <p>1Hd- 50, 010 Avenue, NY 90001 United States</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card active"><i class="icofont-phone"></i>
                        <h4>phone number</h4>
                        <p><a href="#">009-215-5596 <span>(toll free)</span></a><a href="#">009-215-5595</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card"><i class="icofont-email"></i>
                        <h4>Support mail</h4>
                        <p><a href="#">info@enham.in</a></p>
                    </div>
                </div>
            </div>
            <div class="row">
              
                <div class="col-lg-12">
                    <form class="contact-form" method="POST" action="contact.php">
                        <h4>Drop Your Thoughts</h4>
                        <div class="form-group">
                            <div class="form-input-group"><input class="form-control" name="name" required type="text" placeholder="Your Name"><i class="icofont-user-alt-3"></i></div>
                        </div>
                        <div class="form-group">
                            <div class="form-input-group"><input class="form-control" required type="email" placeholder="Your Email"><i class="icofont-email"></i></div>
                        </div>
                        <div class="form-group">
                            <div class="form-input-group"><input class="form-control" required type="text" name="subject" placeholder="Your Subject"><i class="icofont-book-mark"></i></div>
                        </div>
                        <div class="form-group">
                            <div class="form-input-group"><textarea name="message" class="form-control" required placeholder="Your Message"></textarea><i class="icofont-paragraph"></i></div>
                        </div><button type="submit" class="btn btn-inline"><i class="fas fa-envelope"></i><span>send
                                message</span></button>
                    </form>
                </div>
            </div>
        
        </div>
    </section>

<?php
include('inc/footer.php');
?>