<?php
include('../config/app.php');
include_once('../controllers/ProductController.php');

if(isset($_POST['action'])){
    $sortingval ='';
    $tags ='';
    if($_POST['action'] == 'load-products'){
        $productid = validateInput($db->conn, $_POST['last_product_id']);
        $categoryid = validateInput($db->conn, $_POST['categoryid']);
        
        $sortingval = validateInput($db->conn, $_POST['sortValue']);
        $tags = validateInput($db->conn, $_POST['tags']);
        
        $getproduct = new ProductController;
        $getresult = $getproduct->getProducts($productid, $categoryid, $sortingval, $tags);
        if($getresult){
            echo $getresult;
        }
      
       
    }
}

if(isset($_POST['action'])){
    $sortingval ='';
    $tags ='';
    if($_POST['action'] == 'load-supsubproducts'){
        $productid = validateInput($db->conn, $_POST['last_product_id']);
        $supsubcategoryid = validateInput($db->conn, $_POST['supsubcategoryid']);
        
        $sortingval = validateInput($db->conn, $_POST['sortValue']);
        $tags = validateInput($db->conn, $_POST['tags']);
        
        $getproduct = new ProductController;
        $getresult = $getproduct->getsupsubProducts($productid, $supsubcategoryid, $sortingval, $tags);
        if($getresult){
            echo $getresult;
        }
      
       
    }
}

if(isset($_POST['action'])){
    $sortingval ='';
    $tags ='';
    if($_POST['action'] == 'load-supsubfilterproducts'){
        // $productid = validateInput($db->conn, $_POST['last_product_id']);
        $supsubcategoryid = validateInput($db->conn, $_POST['supsubcategoryid']);
        
        $sortingval = validateInput($db->conn, $_POST['sortValue']);
        $tags = validateInput($db->conn, $_POST['tags']);
        
        $getproduct = new ProductController;
        $getresult = $getproduct->getsupsubfilterProducts($supsubcategoryid, $sortingval, $tags);
        if($getresult){
            echo $getresult;
        }
      
       
    }
}

if(isset($_POST['action'])){
    $sortingval ='';
    $tags ='';
    $prodlenght = '';
    if($_POST['action'] == 'load-filterproducts'){
        // $productid = validateInput($db->conn, $_POST['last_product_id']);
        // $prodlenght = validateInput($db->conn, $_POST['prodlenght']);
        $categoryid = validateInput($db->conn, $_POST['categoryid']);
        
        $sortingval = validateInput($db->conn, $_POST['sortValue']);
        $tags = validateInput($db->conn, $_POST['tags']);
        
        $getproduct = new ProductController;
        $getresult = $getproduct->getProductsbyfilters($categoryid, $sortingval, $tags);
        if($getresult){
            echo $getresult;
        }
       
       
    }
}


if(isset($_POST['action'])){
    $sortingval ='';
    $tags ='';
    $prodlenght = '';
    if($_POST['action'] == 'load-subfilterproducts'){
        // $productid = validateInput($db->conn, $_POST['last_product_id']);
        // $prodlenght = validateInput($db->conn, $_POST['prodlenght']);
        $subcategoryid = validateInput($db->conn, $_POST['subcategoryid']);
        
        $sortingval = validateInput($db->conn, $_POST['sortValue']);
        $tags = validateInput($db->conn, $_POST['tags']);
        
        $getproduct = new ProductController;
        $getresult = $getproduct->getsubProductsbyfilters($subcategoryid, $sortingval, $tags);
        if($getresult){
            echo $getresult;
        }
       
       
    }
}


if(isset($_POST['action'])){
    $sortingval ='';
    $tags ='';
    if($_POST['action'] == 'load-subcatproducts'){
        $productid = validateInput($db->conn, $_POST['last_product_id']);
        $subcategoryid = validateInput($db->conn, $_POST['subcategoryid']);
        
        $sortingval = validateInput($db->conn, $_POST['sortValue']);
        $tags = validateInput($db->conn, $_POST['tags']);
        
        $getproduct = new ProductController;
        $getresult = $getproduct->getsubProducts($productid, $subcategoryid, $sortingval, $tags);
        if($getresult){
            echo $getresult;
        }
      
       
    }
}



?>