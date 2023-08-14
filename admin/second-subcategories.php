<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include('codes/auth-code.php');
include_once('controllers/CategoryController.php');
include_once('controllers/SupersubcategoryController.php');
include('controllers/AdminController.php');
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

    #subcatname_err {
        display: none;
        color: red;
    }

    #subcaturl_err {
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
                    <h4 class="card-title">SecondSub Categories</h4>
                    <?php include('../message.php'); ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Second SubCategory
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Second SuCategory</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="codes/secondsubcategory-code.php" enctype="multipart/form-data" method="POST">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="supersubcategory_name" required class="form-control" placeholder="Enter SupersubCategory Name">

                                        </div>
                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select name="parent_category" id="parentid" class="form-control" id="">
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
                                            <label>Subcategory</label>
                                            <select name="subcategory" required class="form-control" id="subcategories">

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>URL</label>
                                            <input type="text" required name="supersubcategory_url" onchange="convertTourl()" id="slug-source" class="form-control" placeholder="URL">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Description </label>
                                            <textarea class="form-control" name="decsription" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="secondsubcategory_image" class="form-control" placeholder="URL">

                                        </div>

                                        <button type="submit" name="add_supersubcategory" class="btn btn-primary">Add</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        $supersubcategories = new SupersubcategoryController;
                        $result = $supersubcategories->index();
                        ?>
                        <table class="table" id="mySubcatable">
                            <thead class=" text-primary">
                                <th>
                                    Name
                                </th>

                                <th>
                                    Parentcategory
                                </th>
                                <th>
                                    Subcategory
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
                                                <?php echo $row['super_name'] ?>
                                                
                                            </td>
                                            <td><?php echo $supersubcategories->getparentcategory($row['category_id']) ?></td>
                                            <td><?php echo $supersubcategories->getsubcategory($row['subcategory_id']) ?></td>
                                            <td>
                                                <form action="codes/secondsubcategory-code.php" class="form-inline" method="POST">

                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="supsubcategoryid">
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <select name="supshowsubcategory" class="form-control" id="">
                                                            <option value="1">Hide</option>
                                                            <option value="0">show</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" name="update-status" class="btn btn-info">Update</button>
                                                </form>
                                            </td>
                                            <td style="display:flex;">
                                                <a class="btn btn-success mx-3" href="edit-supersubcategory.php?id=<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></a>
                                                <form action="codes/secondsubcategory-code.php" method="POST" onsubmit="return confirmDelete();">
                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="supsubcategoryid">
                                                    <button class="btn btn-danger" name="deletesupsubcatid"><i class="fa fa-trash-alt"></i></button>
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
                $("#subcategories").html(' ');
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