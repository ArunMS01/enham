<?php

class ProductController 
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    public function getcategoryProducts($categoryid)
    {
        $min = 1;
        $data = array();
         $sql = "SELECT product.id, product.quantity, product.name, product.image, product.price, product.regular_price, product.url
        FROM product 
        INNER JOIN product_category ON product.id=product_category.product_id WHERE product_category.category_id = '$categoryid' AND product.status ='0' ORDER BY product.id DESC LIMIT 5";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getsupersubcategoryProducts($supersubcatid){
        $sql = "SELECT product.id, product.quantity, product.name, product.image, product.price, product.regular_price, product.url
        FROM product 
        INNER JOIN product_category ON product.id=product_category.product_id WHERE product_category.secondsubcategory_id = '$supersubcatid' AND product.status ='0' ORDER BY product.id DESC LIMIT 5";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getsubcategoryProducts($subcategoryid){
      
         $sql = "SELECT product.id, product.quantity, product.name, product.image, product.price, product.regular_price, product.url
        FROM product 
        INNER JOIN product_category ON product.id=product_category.product_id WHERE subcategory_id = '$subcategoryid' AND product.status ='0'  ORDER BY product.id DESC LIMIT 5";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getSingleproduct($url)
    {
        $sql = "SELECT * FROM product WHERE url ='$url' AND status = '0' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }


    public function getProductnamebyId($id)
    {
        $sql = "SELECT * FROM product WHERE id ='$id' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function homepageProducts($sale_tag)
    {
        $sale_tag = validateInput($this->conn, $sale_tag);
        $sql = "SELECT * FROM product WHERE status = '0' AND sale_tag = '$sale_tag'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $productdata = array();
            foreach ($result as $row) {
                $productdata[] = $row;
            }
            return $productdata;
        }
    }


    public function getProdstocks($orderitemid)
    {
        // print_r($orderitemid);
        $prod_qty = 0;
        foreach ($orderitemid as $itemid) {
            $sql = "SELECT * FROM order_items WHERE id ='$itemid'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {

                foreach ($result as $row_data) {
                    $prod_qty =   $prod_qty + $row_data['quantity'];
                }
            }
        }
        return $prod_qty;
    }

    public function checkStockunit($id)
    {
        $sql = "SELECT * FROM order_items WHERE product_id = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $orderitemid = array();
            $order_itemid = array();
            foreach ($result as $row_data) {
                $order_itemid[] =  $row_data['id'];
                $order_itemqty =  $row_data['quantity'];
            }
        }

        // print_r($order_itemid);
        if(!empty($order_itemid)){
        foreach ($order_itemid as $orderitems) {
            $sqlitem = "SELECT * FROM order_items_status WHERE order_item_id ='$orderitems' AND item_status != 'Cancelled'";
            $resultitems = $this->conn->query($sqlitem);
            if ($resultitems) {
                foreach ($resultitems as $orderitem) {
                    $orderitemid[] =  $orderitem['order_item_id'];
                }
            }
        }
    
        //  print_r($orderitemid);
        $getprodstck = $this->getProdstocks($orderitemid);
        //   echo $getprodstck;
        if ($getprodstck) {
            return $getprodstck;
        } else {
            return false;
        }
    }
    }

    public function getProducts($productid, $categoryid, $sortingval, $tags)
    {
        $sql = "SELECT product.id, product.quantity, product.name, product.image, product.price, product.regular_price, product.url
          FROM product 
          INNER JOIN product_category ON product.id=product_category.product_id WHERE product_category.category_id = '$categoryid'";

        if (!empty($productid)) {
            $sql .= "  AND product.id < '$productid'";
        }
    
        if(!$sortingval){
            $sql .=" ORDER BY product.id DESC";
        }

        $sql .= " LIMIT 5";

        $result = $this->conn->query($sql);
        $output = '';
        if ($result) {
            foreach ($result as $row) {
                $lastproduct_id = $row['id'];
                $product_name = substr(strip_tags($row['name']), 0, 20) . '...';
                $output .= '
                  <div class="col">
                  <div class="product-card">
                      <div class="product-media">';
                      
                       if (!isset($_SESSION['authenticated'])) { 
                               $output .='
                                            <button class="product-wish wish product-wishlist-modal" id=""><i class="fas fa-heart"></i></button>';

                                     
                                        } else {
                                       
                                            
                                            if (isset($_SESSION['authenticated'])) {
                                                
                                         $output .='   
                                                <input type="hidden" id="customer_id" value="' .$_SESSION['auth_user']['user_id'] .'">
                                         
                                         
                                            <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="' .$row['id'] .' "><i class="fas fa-heart"></i></a>';

                                    
                                        }
                                        }
                      
                      $output .='
                         
                       
                          <a class="product-image" href="' . SITE_URL . 'product/' . $row['url'] . '">
                          <div class="category-image">
                          <img src="' . SITE_URL . 'admin/assets/product-images/' . $row['image'] . '" alt="product">
                          </div>
                      
                      </a>
                        
                      </div>
                      <div class="product-content">';
                      
                      $output .='<div class="product-rating">';
                  
                    
                      $getreviews = $this->getProductreviews($row['id']);
                      if ($getreviews) {
                          for ($i = 0; $i < $getreviews; $i++) {
               

                            $output .=  '<i class="active icofont-star"></i>';
                   
                          }
                          $getreviews = $this->getnoofreviews($row['id']);
                   
                          $output .=  '<a href="#">(<?php echo $getreviews; ?> reviews)</a>';
                  
                      }
                 
                      $checkProdstock =  $this->checkStockunit($row['id']);
                      $stock_left = $row['quantity'] - $checkProdstock;

                      $output .='
                      </div>
                          <h6 class="product-name"><a href="' . SITE_URL . 'product/' . $row['url'] . '">' . $product_name . '</a></h6>
                          <h6 class="product-price"><del>&#8377; ' . $row['regular_price'] . '</del><span>&#8377; ' . $row['price'] . '<small>/piece</small></span></h6>';

                       
                          if ($checkProdstock && $stock_left > 1) {
                       
                            $output .='   <div class="product-action-1">
                                  <button data-productid="'. $row['id'] .'" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                  <div class="product-action hhh"><button data-productid="'. $row['id'] .'" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                      <input disbaled type="text" value="1" max="'. $stock_left .'" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                      <button data-productid="'.$row['id'].'" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                  </div>
                              </div>';
                           
                          } else {
                              if ($stock_left > 1) {
                           
                                $output .='  <div class="product-action-1">
                                      <button data-productid="'. $row['id'] .'" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                      <div class="product-action hjj"><button data-productid="'. $row['id'] .'" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                          <input disabled type="text" value="1" max="'. $row['quantity'] .'" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                          <button data-productid="'. $row['id'] .'" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                      </div>
                                  </div>';
                           
                              } else {
                           
                                $output .='  <p style="color:red">Out of stock</p>';
                       
                              }
                          }
     
                        
                         $output .=' 
                          </div>
                  </div>
              </div>
              ';
            }
            echo $output;
        } else {
            return false;
        }
    }


    public function getsupsubProducts($productid, $supsubcategoryid, $sortingval, $tags){

        $sql = "SELECT product.id, product.quantity, product.name, product.image, product.price, product.regular_price, product.url
        FROM product 
        INNER JOIN product_category ON product.id=product_category.product_id WHERE product_category.secondsubcategory_id = '$supsubcategoryid'";

      if (!empty($tags)) {
          $sql .= "  AND product.sale_tag = '$tags'";
      }
      if (!empty($productid)) {
            $sql .= "  AND product.id < '$productid'";
        }
    
        if(!$sortingval){
            $sql .=" ORDER BY product.id DESC";
        }

        $sql .= " LIMIT 5";

      $result = $this->conn->query($sql);
      $output = '';
      if ($result) {
          foreach ($result as $row) {
              $lastproduct_id = $row['id'];
              $product_name = substr(strip_tags($row['name']), 0, 20) . '...';
              $output .= '
                  <div class="col">
                  <div class="product-card">
                      <div class="product-media">';
                      
                       if (!isset($_SESSION['authenticated'])) { 
                               $output .='
                                            <button class="product-wish wish product-wishlist-modal" id=""><i class="fas fa-heart"></i></button>';

                                     
                                        } else {
                                       
                                            
                                            if (isset($_SESSION['authenticated'])) {
                                                
                                         $output .='   
                                                <input type="hidden" id="customer_id" value="' .$_SESSION['auth_user']['user_id'] .'">
                                         
                                         
                                            <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="' .$row['id'] .' "><i class="fas fa-heart"></i></a>';

                                    
                                        }
                                        }
                      
                      $output .='
                      
                          <a class="product-image" href="' . SITE_URL . 'product/' . $row['url'] . '">
                          <div class="category-image">
                          <img src="' . SITE_URL . 'admin/assets/product-images/' . $row['image'] . '" alt="product">
                          </div>
                      
                      </a>
                        
                      </div>
                      <div class="product-content">
                          <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="product-video.html">(3)</a></div>
                          <h6 class="product-name"><a href="' . SITE_URL . 'product/' . $row['url'] . '">' . $product_name . '</a></h6>
                          <h6 class="product-price"><del>&#8377; ' . $row['regular_price'] . '</del><span>&#8377; ' . $row['price'] . '<small>/piece</small></span></h6><button class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                          <div class="product-action"><button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                      </div>
                  </div>
              </div>
              ';
          }
          if(!empty($lastproduct_id)){
          $output .= '
          <div class="row" id="remove_row">
          <div class="col-lg-12">
              <div class="section-btn-25">
                  <button id="show-more-btn" data-productid=" ' . $lastproduct_id . ' " class="btn btn-outline"><i class="fas fa-eye"></i><span>show more</span></button>
              </div>
          </div>
      </div>
          ';
          }
          echo $output;
      } else {
          return false;
      }
    }

    public function getsubProducts($productid, $subcategoryid, $sortingval, $tags)
    {
        $sql = "SELECT product.id, product.quantity, product.name, product.image, product.price, product.regular_price, product.url
          FROM product 
          INNER JOIN product_category ON product.id=product_category.product_id WHERE product_category.subcategory_id = '$subcategoryid'";

        if (!empty($tags)) {
            $sql .= "  AND product.sale_tag = '$tags'";
        }
       if (!empty($productid)) {
            $sql .= "  AND product.id < '$productid'";
        }
    
        if(!$sortingval){
            $sql .=" ORDER BY product.id DESC";
        }

        $sql .= " LIMIT 5";

        $result = $this->conn->query($sql);
        $output = '';
        if ($result) {
            foreach ($result as $row) {
                $lastproduct_id = $row['id'];
                $product_name = substr(strip_tags($row['name']), 0, 20) . '...';
                $output .= '
                    <div class="col">
                    <div class="product-card">
                        <div class="product-media">';
                        
                         if (!isset($_SESSION['authenticated'])) { 
                               $output .='
                                            <button class="product-wish wish product-wishlist-modal" id=""><i class="fas fa-heart"></i></button>';

                                     
                                        } else {
                                       
                                            
                                            if (isset($_SESSION['authenticated'])) {
                                                
                                         $output .='   
                                                <input type="hidden" id="customer_id" value="' .$_SESSION['auth_user']['user_id'] .'">
                                         
                                         
                                            <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="' .$row['id'] .' "><i class="fas fa-heart"></i></a>';

                                    
                                        }
                                        }
                           
                          $output .='
                            <a class="product-image" href="' . SITE_URL . 'product/' . $row['url'] . '">
                            <div class="category-image">
                            <img src="' . SITE_URL . 'admin/assets/product-images/' . $row['image'] . '" alt="product">
                            </div>
                        
                        </a>
                          
                        </div>
                        <div class="product-content">
                            <div class="product-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="product-video.html">(3)</a></div>
                            <h6 class="product-name"><a href="' . SITE_URL . 'product/' . $row['url'] . '">' . $product_name . '</a></h6>
                            <h6 class="product-price"><del>&#8377; ' . $row['regular_price'] . '</del><span>&#8377; ' . $row['price'] . '<small>/piece</small></span></h6><button class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                            <div class="product-action"><button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                        </div>
                    </div>
                </div>
                ';
            }
            if(!empty($lastproduct_id)){
            $output .= '
            <div class="row" id="remove_row">
            <div class="col-lg-12">
                <div class="section-btn-25">
                    <button id="show-more-btn" data-productid=" ' . $lastproduct_id . ' " class="btn btn-outline"><i class="fas fa-eye"></i><span>show more</span></button>
                </div>
            </div>
        </div>
            ';
            }
            echo $output;
        } else {
            return false;
        }
    }

    public function gettagsproducts($tag){
       $sql = "SELECT * FROM product WHERE sale_tag = '$tag' AND status = '0' ORDER BY id DESC LIMIT 1,10";
        $result = $this->conn->query($sql);
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }


    public function getsupsubfilterProducts($supsubcategoryid, $sortingval, $tags){
       $sql = "SELECT product.id, product.quantity, product.name, product.image, product.price, product.regular_price, product.url
        FROM product 
        INNER JOIN product_category ON product.id=product_category.product_id WHERE product_category.secondsubcategory_id = '$supsubcategoryid'";

        if (!empty($tags)) {
           $sql .= "  AND product.sale_tag = '$tags'";
        }

        if (!empty($sortingval)) {
            if ($sortingval == '1') {
              $sql .= " ORDER BY product.price DESC";
            }
            if ($sortingval == '2') {
                 $sql .= " ORDER BY product.price ASC";
            }
        }

        // echo $sql .=" LIMIT $prodlenght";


        $result = $this->conn->query($sql);
        $output = '';
        if ($result) {
            foreach ($result as $row) {
                $lastproduct_id = $row['id'];
                $product_name = substr(strip_tags($row['name']), 0, 20) . '...';
                $output .= '
                  <div class="col">
                  <div class="product-card">
                      <div class="product-media">';
                      
                       if (!isset($_SESSION['authenticated'])) { 
                               $output .='
                                            <button class="product-wish wish product-wishlist-modal" id=""><i class="fas fa-heart"></i></button>';

                                     
                                        } else {
                                       
                                            
                                            if (isset($_SESSION['authenticated'])) {
                                                
                                         $output .='   
                                                <input type="hidden" id="customer_id" value="' .$_SESSION['auth_user']['user_id'] .'">
                                         
                                         
                                            <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="' .$row['id'] .' "><i class="fas fa-heart"></i></a>';

                                    
                                        }
                                        }
                         
                         $output .='
                          <a class="product-image" href="' . SITE_URL . 'product/' . $row['url'] . '">
                          <div class="category-image">
                          <img src="' . SITE_URL . 'admin/assets/product-images/' . $row['image'] . '" alt="product">
                          </div>
                      
                      </a>
                        
                      </div>
                      <div class="product-content">';
                      
                      $output .='<div class="product-rating">';
                  
                    
                      $getreviews = $this->getProductreviews($row['id']);
                      if ($getreviews) {
                          for ($i = 0; $i < $getreviews; $i++) {
               

                            $output .=  '<i class="active icofont-star"></i>';
                   
                          }
                          $getreviews = $this->getnoofreviews($row['id']);
                   
                          $output .=  '<a href="#">(<?php echo $getreviews; ?> reviews)</a>';
                  
                      }
                 
                      $checkProdstock =  $this->checkStockunit($row['id']);
                      $stock_left = $row['quantity'] - $checkProdstock;

                      $output .='
                      </div>
                          <h6 class="product-name"><a href="' . SITE_URL . 'product/' . $row['url'] . '">' . $product_name . '</a></h6>
                          <h6 class="product-price"><del>&#8377; ' . $row['regular_price'] . '</del><span>&#8377; ' . $row['price'] . '<small>/piece</small></span></h6>';

                       
                          if ($checkProdstock && $stock_left > 1) {
                       
                            $output .='   <div class="product-action-1">
                                  <button data-productid="'. $row['id'] .'" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                  <div class="product-action hhh"><button data-productid="'. $row['id'] .'" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                      <input disbaled type="text" value="1" max="'. $stock_left .'" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                      <button data-productid="'.$row['id'].'" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                  </div>
                              </div>';
                           
                          } else {
                              if ($stock_left > 1) {
                           
                                $output .='  <div class="product-action-1">
                                      <button data-productid="'. $row['id'] .'" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                      <div class="product-action hjj"><button data-productid="'. $row['id'] .'" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                          <input disabled type="text" value="1" max="'. $row['quantity'] .'" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                          <button data-productid="'. $row['id'] .'" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                      </div>
                                  </div>';
                           
                              } else {
                           
                                $output .='  <p style="color:red">Out of stock</p>';
                       
                              }
                          }
     
                        
                         $output .=' 
                          </div>
                  </div>
              </div>
              ';
            }
            echo $output;
        } else {
            return false;
        }
    }


    public function getsubProductsbyfilters($subcategoryid, $sortingval, $tags){
        $sql = "SELECT product.id, product.quantity, product.name, product.image, product.price, product.regular_price, product.url
        FROM product 
        INNER JOIN product_category ON product.id=product_category.product_id WHERE product_category.subcategory_id = '$subcategoryid'";

        if (!empty($tags)) {
              $sql .= "  AND product.sale_tag = '$tags'";
        }

        if ($sortingval) {
            if ($sortingval == '1') {
                 $sql .= " ORDER BY product.price DESC";
            }
            if ($sortingval == '2') {
                 $sql .= " ORDER BY product.price ASC";
            }
        }

        // echo $sql .=" LIMIT $prodlenght";


        $result = $this->conn->query($sql);
        $output = '';
        if ($result) {
            foreach ($result as $row) {
                $lastproduct_id = $row['id'];
                $product_name = substr(strip_tags($row['name']), 0, 20) . '...';
                $output .= '
                  <div class="col">
                  <div class="product-card">
                      <div class="product-media">';
                      
                       if (!isset($_SESSION['authenticated'])) { 
                               $output .='
                                            <button class="product-wish wish product-wishlist-modal" id=""><i class="fas fa-heart"></i></button>';

                                     
                                        } else {
                                       
                                            
                                            if (isset($_SESSION['authenticated'])) {
                                                
                                         $output .='   
                                                <input type="hidden" id="customer_id" value="' .$_SESSION['auth_user']['user_id'] .'">
                                         
                                         
                                            <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="' .$row['id'] .' "><i class="fas fa-heart"></i></a>';

                                    
                                        }
                                        }
                      
                      $output .='
                         
                          <a class="product-image" href="' . SITE_URL . 'product/' . $row['url'] . '">
                          <div class="category-image">
                          <img src="' . SITE_URL . 'admin/assets/product-images/' . $row['image'] . '" alt="product">
                          </div>
                      
                      </a>
                        
                      </div>
                      <div class="product-content">';
                      
                      $output .='<div class="product-rating">';
                  
                    
                      $getreviews = $this->getProductreviews($row['id']);
                      if ($getreviews) {
                          for ($i = 0; $i < $getreviews; $i++) {
               

                            $output .=  '<i class="active icofont-star"></i>';
                   
                          }
                          $getreviews = $this->getnoofreviews($row['id']);
                   
                          $output .=  '<a href="#">(<?php echo $getreviews; ?> reviews)</a>';
                  
                      }
                 
                      $checkProdstock =  $this->checkStockunit($row['id']);
                      $stock_left = $row['quantity'] - $checkProdstock;

                      $output .='
                      </div>
                          <h6 class="product-name"><a href="' . SITE_URL . 'product/' . $row['url'] . '">' . $product_name . '</a></h6>
                          <h6 class="product-price"><del>&#8377; ' . $row['regular_price'] . '</del><span>&#8377; ' . $row['price'] . '<small>/piece</small></span></h6>';

                       
                          if ($checkProdstock && $stock_left > 1) {
                       
                            $output .='   <div class="product-action-1">
                                  <button data-productid="'. $row['id'] .'" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                  <div class="product-action hhh"><button data-productid="'. $row['id'] .'" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                      <input disbaled type="text" value="1" max="'. $stock_left .'" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                      <button data-productid="'.$row['id'].'" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                  </div>
                              </div>';
                           
                          } else {
                              if ($stock_left > 1) {
                           
                                $output .='  <div class="product-action-1">
                                      <button data-productid="'. $row['id'] .'" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                      <div class="product-action hjj"><button data-productid="'. $row['id'] .'" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                          <input disabled type="text" value="1" max="'. $row['quantity'] .'" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                          <button data-productid="'. $row['id'] .'" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                      </div>
                                  </div>';
                           
                              } else {
                           
                                $output .='  <p style="color:red">Out of stock</p>';
                       
                              }
                          }
     
                        
                         $output .=' 
                          </div>
                  </div>
              </div>
              ';
            }

         
            echo $output;
        } else {
            return false;
        }
    }

    public function getProductsbyfilters($categoryid, $sortingval, $tags)
    {
       $sql = "SELECT product.id, product.quantity, product.name, product.image, product.price, product.regular_price, product.url
        FROM product 
        INNER JOIN product_category ON product.id=product_category.product_id WHERE product_category.category_id = '$categoryid'";

        if (!empty($tags)) {
              $sql .= "  AND product.sale_tag = '$tags'";
        }

        if ($sortingval) {
            if ($sortingval == '1') {
                 $sql .= " ORDER BY product.price DESC";
            }
            if ($sortingval == '2') {
                 $sql .= " ORDER BY product.price ASC";
            }
        }
        
        if(!$sortingval){
            $sql .=" ORDER BY product.id DESC";
        }

        // echo $sql .=" LIMIT $prodlenght";


        $result = $this->conn->query($sql);
        $output = '';
        if ($result) {
            foreach ($result as $row) {
                $lastproduct_id = $row['id'];
                $product_name = substr(strip_tags($row['name']), 0, 20) . '...';
                $output .= '
                  <div class="col">
                  <div class="product-card">
                      <div class="product-media">
                         ';
                           if (!isset($_SESSION['authenticated'])) { 
                               $output .='
                                            <button class="product-wish wish product-wishlist-modal" id=""><i class="fas fa-heart"></i></button>';

                                     
                                        } else {
                                       
                                            
                                            if (isset($_SESSION['authenticated'])) {
                                                
                                         $output .='   
                                                <input type="hidden" id="customer_id" value="' .$_SESSION['auth_user']['user_id'] .'">
                                         
                                         
                                            <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="' .$row['id'] .' "><i class="fas fa-heart"></i></a>';

                                    
                                        }
                                        }
                                   
                          $output .='
                          
                          <a class="product-image" href="' . SITE_URL . 'product/' . $row['url'] . '">
                          <div class="category-image">
                          <img src="' . SITE_URL . 'admin/assets/product-images/' . $row['image'] . '" alt="product">
                          </div>
                      
                      </a>
                        
                      </div>
                      <div class="product-content">';
                      
                      $output .='<div class="product-rating">';
                  
                    
                      $getreviews = $this->getProductreviews($row['id']);
                      if ($getreviews) {
                          for ($i = 0; $i < $getreviews; $i++) {
               

                            $output .=  '<i class="active icofont-star"></i>';
                   
                          }
                          $getreviews = $this->getnoofreviews($row['id']);
                   
                          $output .=  '<a href="#">(<?php echo $getreviews; ?> reviews)</a>';
                  
                      }
                 
                      $checkProdstock =  $this->checkStockunit($row['id']);
                      $stock_left = $row['quantity'] - $checkProdstock;

                      $output .='
                      </div>
                          <h6 class="product-name"><a href="' . SITE_URL . 'product/' . $row['url'] . '">' . $product_name . '</a></h6>
                          <h6 class="product-price"><del>&#8377; ' . $row['regular_price'] . '</del><span>&#8377; ' . $row['price'] . '<small>/piece</small></span></h6>';

                       
                          if ($checkProdstock && $stock_left > 1) {
                       
                            $output .='   <div class="product-action-1">
                                  <button data-productid="'. $row['id'] .'" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                  <div class="product-action hhh"><button data-productid="'. $row['id'] .'" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                      <input disbaled type="text" value="1" max="'. $stock_left .'" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                      <button data-productid="'.$row['id'].'" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                  </div>
                              </div>';
                           
                          } else {
                              if ($stock_left > 1) {
                           
                                $output .='  <div class="product-action-1">
                                      <button data-productid="'. $row['id'] .'" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                      <div class="product-action hjj"><button data-productid="'. $row['id'] .'" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                          <input disabled type="text" value="1" max="'. $row['quantity'] .'" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                          <button data-productid="'. $row['id'] .'" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                      </div>
                                  </div>';
                           
                              } else {
                           
                                $output .='  <p style="color:red">Out of stock</p>';
                       
                              }
                          }
     
                        
                         $output .=' 
                          </div>
                  </div>
              </div>
              ';
            }

         
            echo $output;
        } else {
            return false;
        }
    }

    
    public function getProductreviews($id){
        $sql = "SELECT COUNT(id) as totalreviews FROM product_rating WHERE product_id = '$id'";
 
         $numberoftotrating = $this->conn->query($sql);
         if($numberoftotrating){
             $numberoftotalratings = $numberoftotrating->fetch_assoc();
         
       
        $sql = "SELECT SUM(ratings) as totalratings FROM product_rating WHERE product_id = '$id'";
         $totalratings = $this->conn->query($sql);
         if($totalratings){
            $total_ratings = $totalratings->fetch_assoc();
        if($numberoftotalratings['totalreviews'] != '' && $total_ratings['totalratings'] !=''){
         $total_sub_ratings = $total_ratings['totalratings']/$numberoftotalratings['totalreviews'];
         $total_sum_ratings = round($total_sub_ratings);
         return $total_sum_ratings;
        }
     }
     }
     else{
         return false;
     }
 }

 public function getnoofreviews($id){
    $sql = "SELECT COUNT(id) as totalreviews FROM product_rating WHERE product_id = '$id'";

    $numberoftotrating = $this->conn->query($sql);
    if($numberoftotrating){
        $numberoftotalratings = $numberoftotrating->fetch_assoc();
        return $numberoftotalratings['totalreviews'];
    }
    else{
        return false; 
    }
}
}
