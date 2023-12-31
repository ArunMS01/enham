<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include('codes/auth-code.php');
include_once('controllers/CategoryController.php');
include('controllers/AdminController.php');
include('inc/header.php');
include('inc/sidebar.php');
?>
<style>
    #catname_err {
        display: none;
        color: red;
    }

    #caturl_err {
        display: none;
        color: red;
    }

    .form-group input[type=file] {
        position: unset;
        opacity: 1;
    }

    .form-check input[type="checkbox"],
    .radio input[type="radio"] {
        visibility: visible;
        opacity: 1;
    }
</style>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Categories</h4>
                    <?php include('../message.php'); ?>
                    <!-- Button trigger modal -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = validateInput($db->conn, $_GET['id']);
                        }
                        $categories = new CategoryController;
                        $result = $categories->edit($id);
                        if ($result) {
                        ?>
                            <form action="codes/category-code.php" enctype="multipart/form-data"  method="POST" onsubmit="return Validate()">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" name="category_id" value="<?php echo $result['id'] ?>">
                                    <input type="text" value="<?php echo $result['cat_name'] ?>" name="category_name" class="form-control" id="catname" placeholder="Enter Category Name">
                                    <small class="invalid-error" id="catname_err">Can Not be empty</small>
                                </div>
                             
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" value="<?php echo $result['cat_url'] ?>" name="category_url" onchange="convertTourl()" id="slug-source" class="form-control" placeholder="URL">
                                    <small class="invalid-error" id="caturl_err">Can Not be empty</small>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" name="category_description" class="form-control" id="" cols="10" rows="10"><?php echo $result['cat_description'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="category_image" class="form-control" placeholder="URL">
                                    <img style="width:60px" src="assets/category-images/<?php echo $result['category_image'] ?>" alt="">
                                </div>
                                
                                <button type="submit" name="update_category" class="btn btn-primary">Update</button>
                            </form>
                        <?php
                        } else {
                        ?>
                            <h4>Not Found</h4>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    function Validate() {
        let catname = document.getElementById("catname").value;
        let caturl = document.getElementById("slug-source").value;
        let catname_err = document.getElementById("catname_err");
        let caturl_err = document.getElementById("caturl_err");
        if (catname != '' && caturl != '') {
            caturl_err.style.display = "none";
            catname_err.style.display = "none";
            return true;
        } else {
            catname_err.style.display = "block";
            caturl_err.style.display = "block";
            return false;
        }
    }

    function convertTourl() {

        var a = document.getElementById("slug-source").value;

        var b = a.toLowerCase().replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');

        document.getElementById("slug-source").value = b;
    }
</script>

<?php
include('inc/footer.php');
?>