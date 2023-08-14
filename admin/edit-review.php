<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include_once('controllers/CategoryController.php');
include_once('controllers/ProductController.php');
include_once('controllers/ReviewController.php');
include('controllers/AdminController.php');
include('inc/header.php');
include('inc/sidebar.php');
?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>You can do mofification in message</h4>
                </div>

                <div class="card-body">
                    <?php
                    $review = new ReviewController;
                    if (isset($_GET['id'])) {
                        $id = validateInput($db->conn, $_GET['id']);
                    }
                    $result = $review->edit($id);
                    if($result){
            
                    ?>
                    
                    <form action="codes/review.php" method="POST">
                    <input type="hidden" name="review_id" value="<?php echo $result['id']?>">
                                <textarea type="text" class="form-control" name="review_message"><?php echo $result['message']?></textarea>
                                <button type="submit" name="update_review" class="btn btn-sucesss mt-5">Update</button>
                    </form>
                    <?php
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('inc/footer.php');
?>