<?php
include('../config/app.php');
include_once('../controllers/AddtocartController.php');
include('../controllers/ProductController.php');
if($_POST['action'] == 'add-to-cart'){
    $prod_quantity = validateInput($db->conn, $_POST['prod_quantity']);
    $productid = validateInput($db->conn, $_POST['productid']);
    $cart = new AddtocartController;
    $result = $cart->addCart($productid,$prod_quantity);
    if($result){
        print_r($result);
    }
    else{
        echo "error";
    }
}
if($_POST['action'] == 'delete-cart'){
    $productid = validateInput($db->conn, $_POST['productid']);
    $cart = new AddtocartController;
    $result = $cart->deleteCart($productid);
    if($result){
             $carttotal = 0;
                foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                    $cartmutiply =  $cart['prod_quant'] * $cart['price'];
                    $carttotal = $carttotal + $cartmutiply; 
                }
         
            $_SESSION["cart_information"] = [
                'cart_total' =>  $carttotal,
                'cart_quantity' => count($_SESSION["add-to-cart"])
            ];
            echo json_encode($_SESSION["cart_information"]);
    }
  
}

if($_POST['action'] == 'update-cart'){
    if(isset($_SESSION["add-to-cart"]))
    {
        foreach ($_SESSION["add-to-cart"] as $key => $val) {

            if ($val["productid"] == $_POST['productid']) {
                $_SESSION["add-to-cart"][$key]['prod_quant'] = $_POST['product_quantity']; 
                
            }
     
         }
         
            
                $carttotal = 0;
                foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                    $cartmutiply =  $cart['prod_quant'] * $cart['price'];
                    $carttotal = $carttotal + $cartmutiply; 
                }
         
            $_SESSION["cart_information"] = [
                'cart_total' =>  $carttotal,
                'cart_quantity' => count($_SESSION["add-to-cart"])
            ];
            echo json_encode($_SESSION["cart_information"]);
         
}
}

if(isset($_POST['action'])){
    if($_POST['action'] == 'load-cart'){
        $output = '';
        $output .='
          <div class="table-scroll">
                                                  <input type="hidden" value="'.count($_SESSION["add-to-cart"]).'" id="cart_qty">
                                    <table class="table-list custom-responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>

                                                <th scope="col">quantity</th>
                                                <th scope="col">total</th>
                                                <th scope="col">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                      
                                            $count = 1;
                                            foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                                                $getProduct = new ProductController;
                                                
                                                if ($cart['productid']) {
                                                    $checkProdstock =  $getProduct->checkStockunit($cart['productid']);
                                                    $stock_left = $cart['prod_quant'] - $checkProdstock;
                                                }
                                       
                                            
                                         $output .='  <tr class="cart_row">
                                                    <td data-label="Serial" class="table-serial">
                                            
                                            <h6>'. $count .'</h6>
                                                    </td>
                                                    <td data-label="Image" class="table-image"><img style="width:100px;" src="'. SITE_URL .'admin/assets/product-images/'.$cart['prod_image'].'" alt="product"></td>
                                                    <td data-label="Name" class="table-name">
                                                        <h6><a href="product.php?url='.$cart['prod_url'].'">'.substr(strip_tags($cart['prod_name']), 0, 20) . '...' .'</a></h6>
                                                    </td>
                                                    <td data-label="Price" class="table-price">
                                                        <h6>&#8377; '.$cart['price'] .'</h6>
                                                    </td>

                                                    <td data-label="quantity" class="table-quantity cart-plus-minus">
                                                     
                                                        <div class="product-action" style="display: flex;">
                                                            <button data-product_id="'. $cart['productid'] .'" class="action-minus cart_quantity-btn qtybutton" title="Quantity Minus"><i class="icofont-minus"></i></button>

                                                            ';

                                                        
                                                            if ($checkProdstock) {
                                                           $output .='
                                                                <input disabled type="text"  min="1" value="'. $cart['prod_quant'].'" max="'.$stock_left.'" id="product_quantity" title="Quantity Number" name="qtybutton" class="action-input cart_quantity cart-plus-minus-box">';
                                                        
                                                            } else {
                                                        $output .='
                                                                <input disabled type="text"  min="1" value="'.$cart['prod_quant'].'" max="'.$cart['max-quantity'].'" id="product_quantity" title="Quantity Number" name="qtybutton" class="action-input cart_quantity cart-plus-minus-box">';
                                                          
                                                            }
                                                        $output .='

                                                            <button data-product_id="'.$cart['productid'].'" class="action-plus cart_quantity-btn qtybutton" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                                        </div>
                                        <p style="color:red;" class="qtyerr"></p>
                                                     
                                                    </td>';
                                                    $producttotal = '';
                                                        $producttotal = $cart['prod_quant'] * $cart['price'];
                                        $output .='<td data-label="Total">
                                                    
                            
                                                        
                                                      
                                                        <h6>&#8377; '.$producttotal.'</h6>
                                                    </td>

                                                    <td data-label="Remove" class="table-action cart-product-remove"><a class="trash remove-products" data-productid="'.$cart['productid'].'" href="javascript:void(0)" title="Remove Wishlist"><i class="icofont-trash"></i></a></td>
                                                </tr>';

                                           
                                                $count++;
                                            }

                                        

                                     $output .='     </tbody>
                                    </table>
                                </div>';
    
    echo $output;
}
}


if(isset($_POST['action'])){
    $output ='';
    if($_POST['action'] == 'card-total-price'){
          $output .=' <div class="checkout-charge">';
                             
                                    if ($_SESSION["add-to-cart"]) {
                                        $carttotal = 0;
                                        foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                                            $carttotal = $carttotal + ($cart['prod_quant'] * $cart['price']);
                                        }
                                        
                                        $output .=' 
                                        <ul>

                                            <li><span>Sub total</span><span>&#8377; '.$carttotal.'</span></li>
                                            <li><span>delivery fee</span><span>&#8377;0.00</span></li>
                                            <li><span>discount</span><span>&#8377;00.00</span></li>
                                            <li><span>Total<small>(Incl. all taxes)</small></span><span>&#8377;'. $carttotal.'</span></li>
                                        </ul>';
                               
                                    }
                                 $output .='
                                </div>';  
                                echo $output;
    }
}


?>
