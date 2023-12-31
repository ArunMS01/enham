<?php
class AddtocartController
{
    
    public function __construct()
    {
        $db = new Databaseconnection;
        $this->conn = $db->conn;
    }
    public function checkcartiexist(){
        if(!isset($_SESSION["add-to-cart"])){
           redirect("Thanks for shopping with us", "index.php"); 
        }
    }
    public function addCart($productid, $prod_quantity)
    {
        $sql = "SELECT * FROM product WHERE id = '$productid' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $dataproduct = $result->fetch_assoc();
            if (isset($_SESSION["add-to-cart"])) {
                $data_array_id = array_column($_SESSION["add-to-cart"], "productid");
                if (!in_array($productid, $data_array_id)) {
                    $count = count($_SESSION["add-to-cart"]);
                    $data = array(
                        'productid' => $productid,
                        'admin_id' => $dataproduct['admin_id'],
                        'prod_name' =>  $dataproduct['name'],
                        'prod_url' => $dataproduct['url'],
                        'prod_image' => $dataproduct['image'],
                        'price' => $dataproduct['price'],
                        'sku' => $dataproduct['sku'],
                        'prod_quant' => $prod_quantity,
                        'max-quantity' =>$dataproduct['quantity']
                    );
                    $_SESSION["add-to-cart"][$count] = $data;
                } else {
                    foreach ($_SESSION["add-to-cart"] as $keys => $prod_values) {
                        if ($prod_values['productid'] == $productid) {
                            $_SESSION["add-to-cart"][$keys]['prod_quant'] =  $prod_quantity;
                        }
                    }
                }
            } else {
                $data = array(
                    'productid' => $productid,
                    'admin_id' => $dataproduct['admin_id'],
                    'prod_name' => $dataproduct['name'],
                    'prod_image' => $dataproduct['image'],
                    'prod_url' => $dataproduct['url'],
                    'price' => $dataproduct['price'],
                    'sku' => $dataproduct['sku'],
                    'prod_quant' => $prod_quantity,
                    'max-quantity' =>$dataproduct['quantity']
                );
                $_SESSION["add-to-cart"][0] = $data;
            }
            if (isset($_SESSION["add-to-cart"])) {
                $carttotal = 0;
                foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                    $cartmutiply =  $cart['prod_quant'] * $cart['price'];
                    $carttotal = $carttotal + $cartmutiply; 
                }
            }
           
            $_SESSION["cart_information"] = [
                'cart_total' =>  $carttotal,
                'cart_quantity' => count($_SESSION["add-to-cart"])
            ];
            return json_encode($_SESSION["cart_information"]);
        
        }
    }
    public function deleteCart($productid)
    {
        if (isset($_SESSION["add-to-cart"])) {
            foreach ($_SESSION["add-to-cart"] as $keys => $prod_values) {
                if ($prod_values['productid'] == $productid) {
                    unset($_SESSION["add-to-cart"][$keys]);
                    return true;
                }
            }
        }
    }
    
}
