<?php
class ProductController
{
    public function __construct()
    {
        $db = new Databaseconnection;
        $this->conn = $db->conn;
    }

    public function validateImage($main_imagetmp, $main_image, $main_image_size)
    {
        $target_dir = "../assets/product-images/";
        $target_file = $target_dir . basename($main_image);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($main_imagetmp);
            if ($check !== false) {

                $uploadOk = 1;
            } else {

                $uploadOk = 0;
            }
        }

        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }

        // Check file size
        if ($main_image_size > 500000) {

            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"  && $imageFileType != "webp"
        ) {

            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($main_imagetmp, $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function updateProdcategory($productid, $parent_category, $subcategory, $secondsubcategory)
    {
        $sql = "UPDATE product_category SET category_id = '$parent_category', subcategory_id = '$subcategory', secondsubcategory_id = '$secondsubcategory' WHERE product_id = '$productid'";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function createProdcategory($last_prod_id, $parent_category, $subcategory, $secondsubcategory)
    {
        $sql = "INSERT INTO product_category (product_id, category_id, 	subcategory_id, secondsubcategory_id) VALUES ('$last_prod_id' , '$parent_category', '$subcategory', '$secondsubcategory')";
        $result = $this->conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function checkproductUrl($product_url){
        $sql = "SELECT url FROM product WHERE url = '$product_url'" ;
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function validateSku($product_sku){
       $sql = "SELECT sku FROM product WHERE sku = '$product_sku'" ;
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function create($inputdata)
    {
        $data = "'" . implode("','", $inputdata) . "'";
        $sql = "INSERT INTO product (admin_id, name, brand_name, image, image_one, image_two, image_three, image_four, price, regular_price, shipping, quantity, sku, url, title, meta_description,status,long_desc,short_decs,general_info,sale_tag,item_weight, item_length, item_height, item_breadth, added_on) VALUES ($data)";
        $result = $this->conn->query($sql);
        if ($result) {
            $last_prod_id = $this->conn->insert_id;
            return $last_prod_id;
        } else {
            return false;
        }
    }



    public function index()
    {
        if (isset($_SESSION['authenticated'])) {
            $adminid = $_SESSION['auth_user']['user_id'];
        }
        $sql = "SELECT * FROM product WHERE status != '2' AND admin_id = '$adminid' ORDER BY ID DESC ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function export()
    {
        $sql = "SELECT * FROM product WHERE status != '2'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $getProducts = "SELECT * FROM product WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($getProducts);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function update($inputData, $productid)
    {
        $admin_id =  $inputData['admin_id'];
        $productname =  $inputData['productname'];
        $main_image =  $inputData['main_image'];
        $prod_img1 =  $inputData['prod_img1'];
        $prod_img2 =  $inputData['prod_img2'];
        $prod_img3 =  $inputData['prod_img3'];
        $prod_img4 =  $inputData['prod_img4'];
        $sale_price =  $inputData['sale_price'];
        $regular_price =  $inputData['regular_price'];
        $shipping_price =  $inputData['shipping_price'];
        $prod_qty =  $inputData['prod_qty'];
        $prod_sku =  $inputData['prod_sku'];
        $prod_url =  $inputData['prod_url'];
        $prod_meta_desc =  $inputData['prod_meta_desc'];
        $visibility =  $inputData['visibility'];
        $long_description =  $inputData['long_description'];
        $short_description =  $inputData['short_description'];
        $general_info = $inputData['general_info'];
        $prod_title =  $inputData['prod_title'];
        $updated =  $inputData['updated'];
        $sale_tag = $inputData['sale_tag'];
        $item_weight = $inputData['item_weight'];
        $length = $inputData['length'];
        $breadth = $inputData['breadth'];
        $height = $inputData['height'];
        $brand_name = $inputData['brand_name'];
        $sql = "UPDATE product 
    SET admin_id = '$admin_id' ,";
        $sql .= "name = '$productname' , brand_name = '$brand_name', ";
        if (!empty($main_image)) {
            $sql .= "image ='$main_image' ,";
        }
        if (!empty($prod_img1)) {
            $sql .= "image_one ='$prod_img1' ,";
        }
        if (!empty($prod_img2)) {
            $sql .= "image_two = '$prod_img2' ,";
        }
        if (!empty($prod_img3)) {
            $sql .= "image_three = '$prod_img3' ,";
        }
        if (!empty($prod_img4)) {
            $sql .= "image_four = '$prod_img4' ,";
        }
        $sql .= "
    price = '$sale_price',
    regular_price = '$regular_price',
    shipping = '$shipping_price',
    quantity = '$prod_qty',
    sku = '$prod_sku',
    url = '$prod_url',
    title = '$prod_title',
    meta_description ='$prod_meta_desc',
    status ='$visibility',
    long_desc = '$long_description',
    short_decs = '$short_description',
    general_info = '$general_info',
    sale_tag = '$sale_tag',
    item_weight = '$item_weight',
    item_length = '$length',
    item_height = '$height',
    item_breadth = '$breadth',
    updated_on = '$updated' ";
        $sql .= "WHERE id ='$productid'
    ";
        $result = $this->conn->query($sql);
        //  echo $result;
        if ($result) {
            $last_prod_id = $this->conn->insert_id;
            return $productid;
        } else {
            return false;
        }
    }

    public function getCategoryIdprod($id)
    {
        $id = validateInput($this->conn, $id);
        $sql = "SELECT category_id FROM product_category WHERE product_id = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $data = array();
            foreach ($result as $row) {
                $id = validateInput($this->conn, $row['category_id']);
                $sql = "SELECT * FROM category WHERE id = '$id'";
                $result = $this->conn->query($sql);
                while ($row_data = mysqli_fetch_array($result)) {
                    $category_id[] =  $row_data['id'];
                }
            }
            if ($result) {
                return $category_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getCategoryname($id)
    {
        $id = validateInput($this->conn, $id);
        $sql = "SELECT category_id, subcategory_id, secondsubcategory_id FROM product_category WHERE product_id = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $data = array();
            foreach ($result as $row) {
                $categoryid = validateInput($this->conn, $row['category_id']);
                $subcategory_id = validateInput($this->conn, $row['subcategory_id']);
                $secondsubcategory_id = validateInput($this->conn, $row['secondsubcategory_id']);
            }
            $sql = "SELECT * FROM category WHERE id = '$categoryid' LIMIT 1";
            $result = $this->conn->query($sql);
            if ($result) {
                while ($row_data = $result->fetch_assoc()) {
                    $data[] = $row_data['cat_name'];
                }
            }
            $getsubcategory = "SELECT * FROM subcategory WHERE id = '$subcategory_id' LIMIT 1";
            $result = $this->conn->query($getsubcategory);
            if ($result) {
                while ($row_data = $result->fetch_assoc()) {
                    $data[] = $row_data['name'];
                }
            }
            $getsupsubcategory = "SELECT * FROM supersubcategory WHERE id = '$secondsubcategory_id' LIMIT 1";
            $result = $this->conn->query($getsupsubcategory);
            if ($result) {
                while ($row_data = $result->fetch_assoc()) {
                    $data[] = $row_data['super_name'];
                }
            }
            if ($result) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function delete($productid)
    {
        $sql = "UPDATE product SET status ='2' WHERE id ='$productid'";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductId($prodid)
    {
        $sql = "SELECT * FROM product WHERE id = '$prodid' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
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
        if (!empty($order_itemid)) {
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

    public function getProductselectedcategories($id)
    {
        $sql = "SELECT * FROM product_category WHERE product_id = '$id' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = [
                    'category_id' => $row['category_id'],
                    'subcategory_id' => $row['subcategory_id'],
                    'secondsubcategory_id' => $row['secondsubcategory_id']
                ];
            }
            return $data;
        } else {
            return false;
        }
    }

    public function getsubcategoryname($subcategory_id)
    {
        $sql = "SELECT name FROM subcategory WHERE id = '$subcategory_id' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row['name'];
            }
            return $data;
        } else {
            return false;
        }
    }

    public function deletemultipleproducts($checkboxvalue)
    {
        for ($i = 0; $i < count($checkboxvalue); $i++) {
            // echo $checkboxvalue[$i];
            $sql = "UPDATE product SET status ='2' WHERE id ='$checkboxvalue[$i]'";
            $result = $this->conn->query($sql);
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getsupersubcategoryname($secondsubcategory_id)
    {
        $sql = "SELECT super_name FROM supersubcategory WHERE id = '$secondsubcategory_id' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row['super_name'];
            }
            return $data;
        } else {
            return false;
        }
    }

    public function getProductname($id){
        $sql = "SELECT name FROM product WHERE id = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row['name'];
            }
            return $data;
        } else {
            return false;
        }
    }
}
