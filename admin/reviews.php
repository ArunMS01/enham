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
                    <h4>Reviews</h4>
                </div>

                <div class="card-body">
                    <table class="table" id="myproductTable">
                        <thead class=" text-primary">
                            <th>Sr No.</th>
                            <th>Name</th>
                            <th>ratings</th>
                            <th>Image</th>
                            <th>Customer Name</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php
                            $getreviews = new ReviewController;
                            $getallratings = $getreviews->index();
                            if ($getallratings) {
                                //  print_r($getallratings);
                                $count = 1;
                                foreach ($getallratings as $getratings) {
                                    $getusername = $getreviews->reviewUsername($getratings['user_id']);
                            ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $getratings['name'] ?></td>
                                        <td>
                                        <?php
                                        for($i=0;$i<$getratings['ratings'];$i++){
                                            echo "<i style='color:#ffa200' class='fa fa-star'></i>";
                                        }
                                        ?>
                                    </td>
                                        <td><?php echo $getratings['message'] ?></td>
                                        <td><?php echo $getusername['user_name'] . " " . $getusername['last_name'] ?></td>
                                        <td><a href="edit-review.php?id=<?php echo $getratings['id'] ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        <form action="codes/review.php" method="POST" onsubmit="return confirmDelete()">
                                            <input type="hidden" value="<?php echo $getratings['id'] ?>" name="ratingid">
                                            <button type="submit" name="delete-reviews" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                                        </form>
                                        </td>

                                    </tr>
                            <?php
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
<script>
      function confirmDelete() {
        var txt;
        if (confirm("Are You Sure Want To Delete?")) {
            return true;
        } else {
            return false;
        }
    }

    
    $(document).ready(function() {
        $('#myproductTable').DataTable();
    });
</script>
<?php
include('inc/footer.php');
?>