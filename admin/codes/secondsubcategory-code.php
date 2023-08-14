<?php
include('../../config/app.php');
include_once('../controllers/SupersubcategoryController.php');
include_once('../controllers/ImagevalidationController.php');
if (isset($_POST['action'])) {


    if ($_POST['action'] == 'getsubcategory') {
        $categoryid =  validateInput($db->conn, $_POST['categoryid']);
        $sql = "SELECT * FROM subcategory WHERE category_id = '$categoryid'";
        $result = $db->conn->query($sql);
        $data = array();
        if ($result) {
            foreach ($result as $row) {
                $data[] = [
                    'subcatname' => $row['name'],
                    'subcatid' => $row['id']
                ];
            }
            echo json_encode($data);
        } else {
            echo "error";
        }
    }
}

if (isset($_POST['action'])) {


    if ($_POST['action'] == 'getsupersubcategory') {
        $subcategoryid =  validateInput($db->conn, $_POST['subcategoryid']);
        $sql = "SELECT * FROM supersubcategory WHERE subcategory_id = '$subcategoryid'";
        $result = $db->conn->query($sql);
        $data = array();
        if ($result) {
            foreach ($result as $row) {
                $data[] = [
                    'supsubcatname' => $row['super_name'],
                    'supsubcatid' => $row['id']
                ];
            }
            echo json_encode($data);
        } else {
            echo "error";
        }
    }
}

if (isset($_POST['add_supersubcategory'])) {
    $createsubcategory = new SupersubcategoryController;
    $url = validateInput($db->conn, $_POST['supersubcategory_url']);
    $checkifexist = $createsubcategory->checkifsubsubcatalreadyexist($url);
    if ($checkifexist) {
        redirect('Already Exist with same URL', 'admin/second-subcategories.php');
    }
    $filename = $_FILES["secondsubcategory_image"]["name"];
    $tempfilename = $_FILES["secondsubcategory_image"]["tmp_name"];
    $filesize = $_FILES["secondsubcategory_image"]["size"];
    if (!empty($filename)) {
        $target_dir = "../assets/supersubcategory-images/";
        $imagevalidate = new ImagevalidationController;
        $imagereasult = $imagevalidate->validateImage($filename, $tempfilename, $filesize, $target_dir);
        if (!$imagereasult) {
            redirect('Some error occured while uploading image', 'admin/second-subcategories.php');
        }
    }
   
    $inputData = [
        'parent_category' =>  validateInput($db->conn, $_POST['parent_category']),
        'subcategory' =>  validateInput($db->conn, $_POST['subcategory']),
        'supersubcategory_name' =>  validateInput($db->conn, $_POST['supersubcategory_name']),
        'subcat_description' => validateInput($db->conn, $_POST['decsription']),
        'secondsubcategory_image' => $filename,
        'supersubcategory_url' =>  validateInput($db->conn, $_POST['supersubcategory_url'])
    ];
    // print_r($inputData);


    // print_r($checkifexist);
    $result = $createsubcategory->create($inputData);
    // print_r($result);
    if ($result) {
        redirect('Created SuccessFully', 'admin/second-subcategories.php');
    } else {
        redirect('Some Error Occured', 'admin/second-subcategories.php');
    }
}

if (isset($_POST['update_supsubcategory'])) {
    $url = validateInput($db->conn, $_POST['supsubcategory_url']);
    $createsubcategory = new SupersubcategoryController;
    $checkifupdatedexist = $createsubcategory->checkifupdatedsubsubcatalreadyexist($url);
    if ($checkifupdatedexist) {
        redirect('Already Exist with same URL', 'admin/second-subcategories.php');
    }
    $filename = $_FILES["supersubcategory_image"]["name"];
    if (!empty($filename)) {
        $tempfilename = $_FILES["supersubcategory_image"]["tmp_name"];
        $filesize = $_FILES["supersubcategory_image"]["size"];
        $target_dir = "../assets/supersubcategory-images/";
        $imagevalidate = new ImagevalidationController;
        $imagereasult = $imagevalidate->validateImage($filename, $tempfilename, $filesize, $target_dir);
        if (!$imagereasult) {
            redirect('Some error occured while uploading image', 'admin/second-subcategories.php');
        }
    }
    $inputData = [
        'supsubcategory_id' => validateInput($db->conn, $_POST['supsubcategory_id']),
        'parent_category' =>  validateInput($db->conn, $_POST['parent_category']),
        'subcategory' =>  validateInput($db->conn, $_POST['subcategory']),
        'subcat_description' => validateInput($db->conn, $_POST['decsription']),
        'supersubcategory_name' =>  validateInput($db->conn, $_POST['supsubcategory_name']),
        'supersubcategory_url' =>  validateInput($db->conn, $_POST['supsubcategory_url']),
        'supersubcatimage' => $filename
    ];


    $result = $createsubcategory->update($inputData);
    // print_r($result);
    if ($result) {
        redirect('Created SuccessFully', 'admin/second-subcategories.php');
    } else {
        redirect('Some Error Occured', 'admin/second-subcategories.php');
    }
}

if (isset($_POST['update-status'])) {
    $supsubcategory = new SupersubcategoryController;
    $supsubcategory_id = validateInput($db->conn, $_POST['supsubcategoryid']);
    $supsubcategoryshow = validateInput($db->conn, $_POST['supshowsubcategory']);

    $result = $supsubcategory->showsupsubcategory($supsubcategory_id, $supsubcategoryshow);
    //   echo $result;
    if ($result) {
        redirect('Updated Successfully', 'admin/second-subcategories.php');
    } else {
        redirect('Some Error Occured', 'admin/second-subcategories.php');
    }
}

if (isset($_POST['deletesupsubcatid'])) {
    $supsubcategory = new SupersubcategoryController;
    $supsubcategory_id = validateInput($db->conn, $_POST['supsubcategoryid']);
    $result = $supsubcategory->delete($supsubcategory_id);
    if ($result) {
        redirect('Deleted SuccessFully', 'admin/second-subcategories.php');
    } else {
        redirect('Some Error Occured', 'admin/second-subcategories.php');
    }
}
