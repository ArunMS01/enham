<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include('codes/auth-code.php');
include('controllers/AdminController.php');
include_once('controllers/CategoryController.php');
include_once('controllers/SupersubcategoryController.php');
include_once('controllers/SubcategoryController.php');
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

    .multiple-boxes {
        list-style: none;
    }

    .multiple-boxes li {
        border-bottom: 1px solid #d9d9d9;
        padding: 6px 0;
    }

    .listchecks {
        margin-right: 15px;
    }
</style>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <form action="codes/product.php" method="POST" onsubmit="return validate()" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <button type="submit" name="save_product" class="btn btn-primary pull-right">SAVE</button>
                        <h4 class="card-title"> Create Product</h4>
                        <?php include('../message.php'); ?>
                        <!-- Button trigger modal -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" name="prod_name" id="productname">
                                            <small style="display:none; color:red;" id="product_name_err">Product Name can't be empty.</small>
                                            <?php
                                            if (isset($_SESSION['authenticated'])) {
                                            ?>
                                                <input type="hidden" name="admin_id" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>URL</label>
                                            <input type="text" onchange="convertTourl()" class="form-control" name="prod_url" id="producturl">
                                            <small style="display:none; color:red;" id="product_url_err">Product Name can't be empty.</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea class="form-control" id="summernote2" name="short_description" cols="50" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="long_description" id="summernote" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                  
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pricing </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Regular Price</label>
                                    <input type="number" name="regular_price" class="form-control" id="regular_price">
                                    <small style="display:none; color:red;" id="price_comp_error">Regular Price should be greate than Slae price</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sale Price <small style="color:red;">This Sale price should be less than regular price</small></label>
                                    <input type="number" name="sale_price" class="form-control" id="productprice">
                                    <small style="display:none; color:red;" id="product_price_err">Product Price can't be empty.</small>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Shipping</label>
                                    <input type="number" name="shipping_price" class="form-control" id="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Inventory </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" name="prod_sku" class="form-control" id="productsku">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stock Quantity</label>
                                    <input type="number" name="prod_qty" class="form-control" id="productstock">
                                    <small style="display:none; color:red;" id="product_quantity_err">Product Quantity can't be empty.</small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Specifications</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Item weight</label>
                                    <input type="text" name="item_weight" class="form-control" id="">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Length in cm</label>
                                    <input type="text" name="length" class="form-control" id="productstock">
                                   
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Breadth in cm</label>
                                    <input type="text" name="breadth" class="form-control" id="">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Height in cm</label>
                                    <input type="text" name="height" class="form-control" id="productstock">
                                   
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">General Info</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="general_info" id="summernoteall" cols="30" rows="10"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Images </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Main Image</label>
                                    <input type="file" name="main_img" id="productimage">
                                    <small style="display:none; color:red;" id="product_img_err">Product Name can't be empty.</small>

                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Image 1</label>
                                    <input type="file" name="prod_img1" id="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image 2</label>
                                    <input type="file" name="prod_img2" id="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image 3</label>
                                    <input type="file" name="prod_img3" id="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image 4</label>
                                    <input type="file" name="prod_img4" id="">
                                </div>
                            </div>

                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Video URL</label>
                                    <input type="text" class="form-control" name="prod_video" id="">
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Search engine optimization </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Page title</label>
                                    <input type="text" name="prod_title" class="form-control" id="">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea class="form-control" name="prod_meta_desc" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Visibility </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" name="visibility" type="radio" checked value="0" id="">
                            <label class="form-check-label" for="">
                                Publish
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="visibility" type="radio" value="1" id="">
                            <label class="form-check-label" for="">
                                Hidden
                            </label>
                        </div>


                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Brand Name</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="brand_name" placeholder="Enham">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Category </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Parent Category</label>
                            <select name="parent_category" required id="parentid" class="form-control" id="">
                                <option>--Select parent category--</option>
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
                            <select name="subcategory"  class="form-control" id="subcategories">

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Second Subcategory</label>
                            <select name="secondsubcategory"  class="form-control" id="supersubcategories">

                            </select>

                        </div>


                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Tags </h4>
                    </div>
                    <div class="card-body">
                        <select name="sale_tag" class="form-control" id="">
                            <option value="">--Select Tags--</option>
                            <option value="featured">Featured Product</option>
                            <option value="bestselling">Best Selling Product</option>
                            <option value="trending">Trending Product</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function validate() {
        let regular_price =  document.getElementById("regular_price").value;
        let productname = document.getElementById("productname").value;
        let producturl = document.getElementById("producturl").value;
        let productprice = document.getElementById("productprice").value;
        let productimage = document.getElementById("productimage").value;
        let productstock = document.getElementById("productstock").value;
        if (productname != '' && producturl != '' && productprice != '' && productimage != '' && productstock != '' && regular_price > productprice) {
            document.getElementById("product_name_err").style.display = 'none';
            document.getElementById("product_url_err").style.display = 'none';
            document.getElementById("product_price_err").style.display = 'none';
            document.getElementById("price_comp_error").style.display = 'none';
            
            document.getElementById("product_img_err").style.display = 'none';
            document.getElementById("product_quantity_err").style.display = 'none';
            return true;
        } else {
            document.getElementById("product_name_err").style.display = 'block';
            document.getElementById("product_url_err").style.display = 'block';
            document.getElementById("product_price_err").style.display = 'block';
            document.getElementById("product_img_err").style.display = 'block'; 
            document.getElementById("price_comp_error").style.display = 'block';
            document.getElementById("product_quantity_err").style.display = 'block';
            return false;
        }
    }

    function convertTourl() {
        var a = document.getElementById("producturl").value;
        var b = a.toLowerCase().replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
        document.getElementById("producturl").value = b;
    }

    $('#parentid').on('click', function() {

        var subcategorydata ='';
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
                console.log("nfdnj");
                console.log(data);
                $("#subcategories").html(' ');
                $("#supersubcategories").html(" ");
                if (data) {
                    subcategorydata = '<option >' + "Select Option" + '</option>';
                    for (var i = 0; i < data.length; i++) {
                        // var subcatname = data[i].subcatname;
                        // var subcatid = data[i].subcatid;
                       subcategorydata +=
                            '<option value =' + data[i].subcatid + '>' + data[i].subcatname + '</option>';
                       
                    }
                    $("#subcategories").append(subcategorydata);

                }
            }
        });

    });

    $('#subcategories').on('click', function() {

        var supsubcategorydata = '';
        let subcategoryid = $(this).val();
    //    alert(subcategoryid);
        $.ajax({
            url: "codes/secondsubcategory-code.php",
            method: "post",
            dataType: 'JSON',
            data: {
                subcategoryid: subcategoryid,
                action: 'getsupersubcategory'
            },
            success: function(data) {
                // console.log("nfdnj");
                supsubcategorydata = '<option >' + "Select Option" + '</option>';
                $("#supersubcategories").html(" ");
                console.log(data);
                if (data) {
                    for (var i = 0; i < data.length; i++) {
                       
                        supsubcategorydata +=
                            '<option value =' + data[i].supsubcatid + '>' + data[i].supsubcatname + '</option>';
                        $("#supersubcategories").append(supsubcategorydata);
                    }


                }
            }
        });

    });

    
</script>

<?php
include('inc/footer.php');
?>