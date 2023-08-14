<?php
class SubcategoryController
{
    public function __construct()
    {
        $db = new Databaseconnection;
        $this->conn = $db->conn;
    }

    public function create($inputdata)
    {
        $data = "'" . implode("','", $inputdata) . "'";
        // echo $data;
        $subcategoryQuery = "INSERT INTO subcategory (name, category_id, url, description, subcat_image, created_on) VALUES ($data)";
        $result = $this->conn->query($subcategoryQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
//         SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
// FROM Orders
// INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
      $getsubCategories = "SELECT subcategory.id, subcategory.status, subcategory.name, category.cat_name FROM subcategory LEFT JOIN category ON subcategory.category_id = category.id ORDER BY subcategory.id DESC;
        ";
        $result = $this->conn->query($getsubCategories);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $getsubCategories = "SELECT * FROM subcategory WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($getsubCategories);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function update($inputData, $subcategory_id)
    {
        $name = $inputData['subcategoryname'];
        $subcat_url =  $inputData['subcategoryurl'];
        $catid =  $inputData['parentcategory'];
        $subcat_image =  $inputData['subcat_image'];
        $subcat_description =  $inputData['subcategorydescription'];
        $updatesubCatgeory = "UPDATE subcategory SET name = '$name', category_id ='$catid', url ='$subcat_url', description = '$subcat_description'";
        if(!empty($subcat_image)){
         $updatesubCatgeory .= " , subcat_image = '$subcat_image'";
        }
        
        $updatesubCatgeory .= " WHERE id = '$subcategory_id'";
        $result = $this->conn->query($updatesubCatgeory);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($subcategory_id)
    {
        $deletesubCategory = "DELETE FROM subcategory WHERE id ='$subcategory_id'";
        $result = $this->conn->query($deletesubCategory);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

   

    public function checksubCategoryurlexist($subcategoryurl)
    {

        $counter = 1;
        $newLink = $subcategoryurl;
        do {
            $checksubcategoryurlexist = "SELECT url FROM subcategory WHERE url = '$newLink'";
            $result = $this->conn->query($checksubcategoryurlexist);
            if ($result->num_rows > 0) {
                $newLink = $subcategoryurl . '-' . $counter;
                $counter++;
            } else {
                break;
            }
        } while (1);

        return $newLink;
    }

    public function showsubcategory($subcategory_id, $categoryshow)
    {
        $showCategory = "UPDATE subcategory SET status = '$categoryshow' WHERE id = '$subcategory_id'";
        $result = $this->conn->query($showCategory);
        // echo $result;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    
}
