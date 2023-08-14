<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include_once('controllers/SupersubcategoryController.php');
include_once('controllers/CategoryController.php');
include_once('controllers/SubcategoryController.php');
include('controllers/AdminController.php');
include('codes/auth-code.php');
include('inc/header.php');
include('inc/sidebar.php');
?>
<style>
        .form-group input[type=file] {
    position: unset;
    opacity: 1;
  }

  .form-check input[type="checkbox"],
  .radio input[type="radio"] {
    visibility: visible;
    opacity: 1;
  }
    #catname_err {
        display: none;
        color: red;
    }

    #caturl_err {
        display: none;
        color: red;
    }


</style>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit SupersubCategories</h4>
                    <?php include('../message.php'); ?>
                    <!-- Button trigger modal -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = validateInput($db->conn, $_GET['id']);
                        }
                        $supsubcategories = new SupersubcategoryController;
                        $result = $supsubcategories->edit($id);

                        if ($result) {
                        ?>
                            <form action="codes/secondsubcategory-code.php" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" name="supsubcategory_id" value="<?php echo $result['id'] ?>">
                                    <input type="text" required value="<?php echo $result['super_name'] ?>" name="supsubcategory_name" class="form-control" id="catname" placeholder="Enter Category Name">

                                </div>
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select name="parent_category" required class="form-control" id="parentid">
                                        <?php
                                        $categories = new CategoryController;
                                        $getcategory = $categories->index();

                                        if ($getcategory) {
                                            foreach ($getcategory as $category) {
                                        ?>
                                                <option <?php if ($category['id'] == $result['category_id']) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $category['id']; ?>"><?php echo $category['cat_name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>


                                </div>
                                <div class="form-group">
                                    <label>Subcategory</label>
                                    <select name="subcategory" required class="form-control" id="subcategories">
                                        <?php
                                        $categoryid = $result['category_id'];
                                        $subcategories = new SupersubcategoryController;
                                        $getsubcategories = $subcategories->getsubcategories($categoryid);

                                        if ($getcategory) {
                                            foreach ($getsubcategories as $subcategory) {
                                        ?>
                                                <option <?php if ($subcategory['id'] == $result['subcategory_id']) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $subcategory['id']; ?>"><?php echo $subcategory['name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>


                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" required value="<?php echo $result['slug'] ?>" name="supsubcategory_url" onchange="convertTourl()" id="slug-source" class="form-control" placeholder="URL">

                                </div>
                                <div class="form">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="decsription" id="" cols="30" rows="10"><?php echo $result['subcat_description']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="supersubcategory_image" class="form-control" placeholder="URL">
                                    <img style="width:60px" src="assets/supersubcategory-images/<?php echo $result['subcat_image'] ?>" alt="">
                                </div>

                                <button type="submit" name="update_supsubcategory" class="btn btn-primary">Update</button>
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
    function convertTourl() {

        var a = document.getElementById("slug-source").value;

        var b = a.toLowerCase().replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');

        document.getElementById("slug-source").value = b;
    }

    $('#parentid').on('click', function() {


        let categoryid = $(this).val();
        console.log(categoryid);
        $.ajax({
            url: "codes/secondsubcategory-code.php",
            method: "post",
            dataType: 'JSON',
            data: {
                categoryid: categoryid,
                action: 'getsubcategory'
            },
            success: function(data) {
                $("#subcategories").html(" ");
                console.log("nfdnj");
                console.log(data);
                if (data) {
                    for (var i = 0; i < data.length; i++) {
                        // var subcatname = data[i].subcatname;
                        // var subcatid = data[i].subcatid;
                        var subcategorydata =
                            '<option value =' + data[i].subcatid + '>' + data[i].subcatname + '</option>';
                        $("#subcategories").append(subcategorydata);
                    }


                }
            }
        });

    });
</script>

<?php
include('inc/footer.php');
?>