<?php
include('../../config/app.php');
include_once('../controllers/SubcategoryController.php');
include_once('../controllers/ImagevalidationController.php');
if (isset($_POST['add_subcategory'])) {
    date_default_timezone_set('Asia/Kolkata');
    $created_at = date('Y-m-d H:i:s');
    $subcategory = new SubcategoryController;
    $checksubCatexist = $subcategory->checksubCategoryurlexist($_POST['subcategory_url']);
    if ($checksubCatexist) {
        $subcategory_url = $checksubCatexist;
    }
    $filename = $_FILES["subcategory_image"]["name"];
    if(!empty($filename)){
    $tempfilename = $_FILES["subcategory_image"]["tmp_name"];
    $filesize = $_FILES["subcategory_image"]["size"];
    $target_dir = "../assets/subcategory-images/";
    $imagevalidate = new ImagevalidationController;
    $imagereasult = $imagevalidate->validateImage($filename, $tempfilename, $filesize, $target_dir);
    if(!$imagereasult){
        redirect('Some error occured while uploading image', 'admin/subcategories.php');
    }
}
    $inputData = [

        'subcategoryname' => validateInput($db->conn, $_POST['subcategory_name']),
        'parentcategory' => validateInput($db->conn, $_POST['parent_category']),
        'subcategoryurl' => validateInput($db->conn, $subcategory_url),
        'subcategorydescription' => validateInput($db->conn, $_POST['subcategory_description']),
        'subcat_image' => $filename,
        'created_at' => $created_at,
    ];

    $result = $subcategory->create($inputData);
    $result;
    if ($result) {
        redirect('Created SuccessFully', 'admin/subcategories.php');
    } else {
        redirect('Some Error Occured', 'admin/subcategories.php');
    }
}

if (isset($_POST['update_subcategory'])) {
    $subcategory = new SubcategoryController;
    $subcategory_id = validateInput($db->conn, $_POST['subcategory_id']);
    $filename = $_FILES["subcategory_image"]["name"];
    if(!empty($filename)){
    $tempfilename = $_FILES["subcategory_image"]["tmp_name"];
    $filesize = $_FILES["subcategory_image"]["size"];
    $target_dir = "../assets/subcategory-images/";
    $imagevalidate = new ImagevalidationController;
    $imagereasult = $imagevalidate->validateImage($filename, $tempfilename, $filesize, $target_dir);
    if(!$imagereasult){
        redirect('Some error occured while uploading image', 'admin/subcategories.php');
    }
}
    $inputData = [
        'subcategoryname' => validateInput($db->conn, $_POST['subcategory_name']),
        'parentcategory' => validateInput($db->conn, $_POST['parent_category']),
        'subcategoryurl' => validateInput($db->conn, $_POST['subcategory_url']),
        'subcategorydescription' => validateInput($db->conn, $_POST['description']),
        'subcat_image' => $filename
    ];

    $result = $subcategory->update($inputData, $subcategory_id);
    //    echo $result;
    if ($result) {
        redirect('Updated SuccessFully', 'admin/subcategories.php');
    } else {
        redirect('Some Error Occured', 'admin/subcategories.php');
    }
}

if (isset($_POST['deletesubcatid'])) {
    $subcategory = new SubcategoryController;
    $subcategory_id = validateInput($db->conn, $_POST['subcategoryid']);
    $result = $subcategory->delete($subcategory_id);
    if ($result) {
        redirect('Deleted SuccessFully', 'admin/subcategories.php');
    } else {
        redirect('Some Error Occured', 'admin/subcategories.php');
    }
}

if (isset($_POST['update-status'])) {
    $subcategory = new SubcategoryController;
    $subcategory_id = validateInput($db->conn, $_POST['subcategoryid']);
    $subcategoryshow = validateInput($db->conn, $_POST['showsubcategory']);

    $result = $subcategory->showsubcategory($subcategory_id, $subcategoryshow);
    //   echo $result;
    if ($result) {
        redirect('Updated Successfully', 'admin/subcategories.php');
    } else {
        redirect('Some Error Occured', 'admin/subcategories.php');
    }
}
