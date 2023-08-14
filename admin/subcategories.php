<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include_once('controllers/CategoryController.php');
include_once('controllers/SubcategoryController.php');
include('controllers/AdminController.php');
include('codes/auth-code.php');
include('inc/header.php');
include('inc/sidebar.php');
?>
<style>
    #subcatname_err {
        display: none;
        color: red;
    }

    #subcaturl_err {
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
                    <h4 class="card-title">Sub Categories</h4>
                    <?php include('../message.php'); ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add SubCategory
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create SuCategory</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" action="codes/subcategory-code.php" method="POST" onsubmit="return Validate()">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="subcategory_name" class="form-control" id="subcatname" placeholder="Enter Category Name">
                                            <small class="invalid-error" id="subcatname_err">Can Not be empty</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select name="parent_category" class="form-control" required id="">
                                                <option value="">--Select Parent Category--</option>
                                                <?php
                                                $categories = new CategoryController;
                                                $result = $categories->index();
                                                if ($result) {
                                                    foreach ($result as $row) {
                                                ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['cat_name'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>URL</label>
                                            <input type="text" name="subcategory_url" onchange="convertTourl()" id="slug-source" class="form-control" placeholder="URL">
                                            <small class="invalid-error" id="subcaturl_err">Can Not be empty</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="subcategory_description" class="form-control" id="" cols="10" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="subcategory_image" class="form-control" placeholder="URL">

                                        </div>
                                        <button type="submit" name="add_subcategory" class="btn btn-primary">Add</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        $subcategories = new SubcategoryController;
                        $result = $subcategories->index();
                        // print_r($result);
                        ?>
                        <table class="table" id="mySubcatable">
                            <thead class=" text-primary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Parent Category
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>

                            </thead>
                            <tbody>
                                <?php
                                if ($result) {
                                    foreach ($result as $row) {
                                ?>
                                        <tr>
                                            <td>
                                            <?php if ($row['status'] == '0') {
                                                    echo "<span class='badge badge-success'>Active</span>";
                                                } else {
                                                    echo "<span class='badge badge-danger'>Draft</span>";
                                                } ?>
                                                <?php echo $row['name'] ?>
                                            </td>
                                            <td><?php echo $row['cat_name']; ?></td>
                                            <td>
                                            

                                                <form action="codes/subcategory-code.php" class="form-inline" method="POST">

                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="subcategoryid">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <select name="showsubcategory" class="form-control" id="">
                                                            <option value="1">Hide</option>
                                                            <option value="0">show</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" name="update-status" class="btn btn-info">Update</button>
                                                </form>
                                            </td>
                                            <td style="display:flex;">
                                                <a class="btn btn-success mx-3" href="edit-subcategory.php?id=<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></a>
                                                <form action="codes/subcategory-code.php" method="POST" onsubmit="return confirmDelete();">
                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="subcategoryid">
                                                    <button class="btn btn-danger" name="deletesubcatid"><i class="fa fa-trash-alt"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                <?php
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
        $('#mySubcatable').DataTable();
    });

    function Validate() {
        let subcatname = document.getElementById("subcatname").value;
        let subcaturl = document.getElementById("slug-source").value;
        let subcatname_err = document.getElementById("subcatname_err");
        let subcaturl_err = document.getElementById("subcaturl_err");
        if (subcatname != '' && subcaturl != '') {
            subcaturl_err.style.display = "none";
            subcatname_err.style.display = "none";
            return true;
        } else {
            subcatname_err.style.display = "block";
            subcaturl_err.style.display = "block";
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