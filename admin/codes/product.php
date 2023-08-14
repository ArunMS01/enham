<?php
include('../../config/app.php');
include_once('../controllers/ProductController.php');
if (isset($_POST['save_product'])) {

    date_default_timezone_set('Asia/Kolkata');
    $created_at = date('Y-m-d H:i:s');
    $brand_name = validateInput($db->conn, $_POST['brand_name']);
    $main_imagetmp = $_FILES["main_img"]["tmp_name"];
    $main_image = $_FILES["main_img"]["name"];
    $main_image_size = $_FILES["main_img"]["size"];
    $prod_img1tmp = $_FILES["prod_img1"]["tmp_name"];
    $prod_img2tmp = $_FILES["prod_img2"]["tmp_name"];
    $prod_img3tmp = $_FILES["prod_img3"]["tmp_name"];
    $prod_img4tmp = $_FILES["prod_img4"]["tmp_name"];
    $prod_img1 = $_FILES["prod_img1"]["name"];
    $prod_img2 = $_FILES["prod_img2"]["name"];
    $prod_img3 = $_FILES["prod_img3"]["name"];
    $prod_img4 = $_FILES["prod_img4"]["name"];
    $prod_img1size = $_FILES["prod_img1"]["size"];
    $prod_img2size = $_FILES["prod_img2"]["size"];
    $prod_img3size = $_FILES["prod_img3"]["size"];
    $prod_img4size = $_FILES["prod_img4"]["size"];
    $product = new ProductController;
    $checkmainprod_img = $product->validateImage($main_imagetmp, $main_image, $main_image_size);
    if (!$checkmainprod_img) {
        redirect("Image Main already exists or size is not matched", "admin/add-products.php");
    }
    if (!empty($prod_img1)) {
        $checkprod_img1 = $product->validateImage($prod_img1tmp, $prod_img1, $prod_img1size);
        if (!$checkprod_img1) {
            redirect("Image 1 already exists or size is not matched", "admin/add-products.php");
        }
    }
    if (!empty($prod_img2)) {
        $checkprod_img2 = $product->validateImage($prod_img2tmp, $prod_img2, $prod_img2size);
        if (!$checkprod_img2) {
            redirect("Image 2 already exists or size is not matched", "admin/add-products.php");
        }
    }
    if (!empty($prod_img3)) {
        $checkprod_img3 = $product->validateImage($prod_img3tmp, $prod_img3, $prod_img3size);
        if (!$checkprod_img3) {
            redirect("Image 3 already exists or size is not matched", "admin/add-products.php");
        }
    }
    if (!empty($prod_img4)) {
        $checkprod_img4 = $product->validateImage($prod_img4tmp, $prod_img4, $prod_img4size);
        if (!$checkprod_img4) {
            redirect("Image 4 already exists or size is not matched", "admin/add-products.php");
        }
    }
    date_default_timezone_set('Asia/Kolkata');
    $created_at = date('Y-m-d H:i:s');
    $category_id = array();
    // foreach ($_POST['category_id'] as $cat_id) {
    //     $category_id[] = validateInput($db->conn, $cat_id);
    // }
    $parent_category = validateInput($db->conn, $_POST['parent_category']);
    $subcategory = validateInput($db->conn, $_POST['subcategory']);
    $secondsubcategory = validateInput($db->conn, $_POST['secondsubcategory']);
    $inputData = [
        'admin_id' => validateInput($db->conn, $_POST['admin_id']),
        'productname' => validateInput($db->conn, $_POST['prod_name']),
        'brand_name' => validateInput($db->conn, $brand_name),
        'main_image' => validateInput($db->conn, $main_image),
        'prod_img1' => validateInput($db->conn, $prod_img1),
        'prod_img2' => validateInput($db->conn, $prod_img2),
        'prod_img3' => validateInput($db->conn, $prod_img3),
        'prod_img4' => validateInput($db->conn, $prod_img4),
        'sale_price' => validateInput($db->conn, $_POST['sale_price']),
        'regular_price' => validateInput($db->conn, $_POST['regular_price']),
        'shipping_price' => validateInput($db->conn, $_POST['shipping_price']),
        'prod_qty' => validateInput($db->conn, $_POST['prod_qty']),
        'prod_sku' => validateInput($db->conn, $_POST['prod_sku']),
        'prod_url' => validateInput($db->conn, $_POST['prod_url']),
        'prod_title' => validateInput($db->conn, $_POST['prod_title']),
        'prod_meta_desc' => validateInput($db->conn, $_POST['prod_meta_desc']),
        'visibility' => validateInput($db->conn, $_POST['visibility']),
        'long_description' => validateInput($db->conn, $_POST['long_description']),
        'short_description' => validateInput($db->conn, $_POST['short_description']),
        'general_info' => validateInput($db->conn, $_POST['general_info']),
        'sale_tag' => validateInput($db->conn, $_POST['sale_tag']),
        'item_weight' => validateInput($db->conn, $_POST['item_weight']),
        'length' => validateInput($db->conn, $_POST['length']),
        'breadth' => validateInput($db->conn, $_POST['breadth']),
        'height' => validateInput($db->conn, $_POST['height']),
        'added_on' => validateInput($db->conn, $created_at),
    ];
    
    $product_sku = validateInput($db->conn, $_POST['prod_sku']);
    $checkSku = $product->validateSku($product_sku);
    if($checkSku){
        redirect("SKU already exist", "admin/add-products.php");
    }

    $product_url = validateInput($db->conn, $_POST['prod_url']);
    $checkproducturl = $product->checkproductUrl($product_url);
    if($checkproducturl){
        redirect("Url already exist", "admin/add-products.php");
    }
    
    $addproduct = $product->create($inputData);
    // print_r($addproduct);
    if ($addproduct) {
        $last_prod_id = $addproduct;
        $addprodinCategory = $product->createProdcategory($last_prod_id, $parent_category, $subcategory, $secondsubcategory);
        if ($addprodinCategory) {
            redirect("Product Added Successfully", "admin/add-products.php");
        } //else {
        // redirect("Some Error Occured", "admin/add-products.php");
        // }
    } else {
        redirect("Some Error Occured", "admin/add-products.php");
    }
}

if (isset($_POST['deleteprodid'])) {
    $product = new ProductController;
    $productid  = validateInput($db->conn, $_POST['productid']);
    $deleteProduct = $product->delete($productid);
    if ($deleteProduct) {
        redirect("Product Deleted Successfully", "admin/products.php");
    } else {
        redirect("Some Error Occured", "admin/products.php");
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'delete_multiple_products') {
        foreach ($_POST['checkbox_value'] as $check_value) {
        $checkboxvalue[] = $check_value;
    } 
    }
    $product = new ProductController;
    $delete_products = $product->deletemultipleproducts($checkboxvalue);
    if($delete_products){
    echo "success";
    }
    else{
    echo "error";
    }
}

if (isset($_POST['update_product'])) {

    date_default_timezone_set('Asia/Kolkata');
    $updated_at = date('Y-m-d H:i:s');
    $productid = validateInput($db->conn, $_POST['productid']);
    $main_imagetmp = $_FILES["main_img"]["tmp_name"];
    $main_image = $_FILES["main_img"]["name"];
    $main_image_size = $_FILES["main_img"]["size"];
    $prod_img1tmp = $_FILES["prod_img1"]["tmp_name"];
    $prod_img2tmp = $_FILES["prod_img2"]["tmp_name"];
    $prod_img3tmp = $_FILES["prod_img3"]["tmp_name"];
    $prod_img4tmp = $_FILES["prod_img4"]["tmp_name"];
    $prod_img1 = $_FILES["prod_img1"]["name"];
    $prod_img2 = $_FILES["prod_img2"]["name"];
    $prod_img3 = $_FILES["prod_img3"]["name"];
    $prod_img4 = $_FILES["prod_img4"]["name"];
    $prod_img1size = $_FILES["prod_img1"]["size"];
    $prod_img2size = $_FILES["prod_img2"]["size"];
    $prod_img3size = $_FILES["prod_img3"]["size"];
    $prod_img4size = $_FILES["prod_img4"]["size"];
    $product = new ProductController;
    if (!empty($main_image)) {
        $checkmainprod_img = $product->validateImage($main_imagetmp, $main_image, $main_image_size);
        if (!$checkmainprod_img) {
            redirect("Image Main already exists or size is not matched", "admin/edit-products.php?id=$productid");
        }
    }
    if (!empty($prod_img1)) {
        $checkprod_img1 = $product->validateImage($prod_img1tmp, $prod_img1, $prod_img1size);
        if (!$checkprod_img1) {
            redirect("Image 1 already exists or size is not matched", "admin/edit-products.php?id=$productid");
        }
    }
    if (!empty($prod_img2)) {
        $checkprod_img2 = $product->validateImage($prod_img2tmp, $prod_img2, $prod_img2size);
        if (!$checkprod_img2) {
            redirect("Image 2 already exists or size is not matched", "admin/edit-products.php?id=$productid");
        }
    }
    if (!empty($prod_img3)) {
        $checkprod_img3 = $product->validateImage($prod_img3tmp, $prod_img3, $prod_img3size);
        if (!$checkprod_img3) {
            redirect("Image 3 already exists or size is not matched", "admin/edit-products.php?id=$productid");
        }
    }
    if (!empty($prod_img4)) {
        $checkprod_img4 = $product->validateImage($prod_img4tmp, $prod_img4, $prod_img4size);
        if (!$checkprod_img4) {
            redirect("Image 4 already exists or size is not matched", "admin/edit-products.php?id=$productid");
        }
    }
    date_default_timezone_set('Asia/Kolkata');
    $created_at = date('Y-m-d H:i:s');
    // $category_id = array();
    // foreach ($_POST['category_id'] as $cat_id) {
    //     $category_id[] = validateInput($db->conn, $cat_id);
    // }
    $parent_category = validateInput($db->conn, $_POST['parent_category']);
    $subcategory = validateInput($db->conn, $_POST['subcategory']);
    $secondsubcategory = validateInput($db->conn, $_POST['secondsubcategory']);

    $inputData = [
        'admin_id'  => validateInput($db->conn, $_POST['admin_id']),
        'productname' => validateInput($db->conn, $_POST['prod_name']),
        'brand_name' =>validateInput($db->conn, $_POST['brand_name']),
        'main_image' => validateInput($db->conn, $main_image),
        'prod_img1' => validateInput($db->conn, $prod_img1),
        'prod_img2' => validateInput($db->conn, $prod_img2),
        'prod_img3' => validateInput($db->conn, $prod_img3),
        'prod_img4' => validateInput($db->conn, $prod_img4),
        'sale_price' => validateInput($db->conn, $_POST['sale_price']),
        'regular_price' => validateInput($db->conn, $_POST['regular_price']),
        'shipping_price' => validateInput($db->conn, $_POST['shipping_price']),
        'prod_qty' => validateInput($db->conn, $_POST['prod_qty']),
        'prod_sku' => validateInput($db->conn, $_POST['prod_sku']),
        'prod_url' => validateInput($db->conn, $_POST['prod_url']),
        'prod_title' => validateInput($db->conn, $_POST['prod_title']),
        'prod_meta_desc' => validateInput($db->conn, $_POST['prod_meta_desc']),
        'visibility' => validateInput($db->conn, $_POST['visibility']),
        'long_description' => validateInput($db->conn, $_POST['long_description']),
        'short_description' => validateInput($db->conn, $_POST['short_description']),
        'general_info' => validateInput($db->conn, $_POST['general_info']),
        'sale_tag' => validateInput($db->conn, $_POST['sale_tag']),
        'item_weight' => validateInput($db->conn, $_POST['item_weight']),
        'length' => validateInput($db->conn, $_POST['length']),
        'height' => validateInput($db->conn, $_POST['height']),
        'breadth' => validateInput($db->conn, $_POST['breadth']),
        'updated' => validateInput($db->conn, $updated_at),
    ];
    $updateproduct = $product->update($inputData, $productid);
    //   echo $updateproduct;
    if ($updateproduct) {
        $last_prod_id = $updateproduct;
        $addprodinCategory = $product->updateProdcategory($productid, $parent_category, $subcategory, $secondsubcategory);
        // echo $addprodinCategory;
        if ($addprodinCategory) {
            redirect("Product Udated Successfully", "admin/products.php");
        } else {
            redirect("Some Error Occured", "admin/products.php");
        }
    } else {
        redirect("Some Error Occured", "admin/products.php");
    }
}
