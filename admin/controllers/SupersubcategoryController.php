<?php
class SupersubcategoryController
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
       $supersubcategoryQuery = "INSERT INTO supersubcategory (category_id, subcategory_id, super_name ,subcat_description, subcat_image, slug) VALUES ($data)";
        $result = $this->conn->query($supersubcategoryQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkifsubsubcatalreadyexist($url)
    {
        $sql = "SELECT * FROM `supersubcategory` WHERE slug ='$url'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function index()
    {
        $getsupsubCategories = "SELECT * FROM supersubcategory ORDER BY ID DESC";
        $result = $this->conn->query($getsupsubCategories);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }


    public function getparentcategory($id)
    {
        $sql = "SELECT cat_name FROM `category` WHERE id ='$id' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()){
                return $row['cat_name'];
            }
        } else {
            return false;
        }
    }
    public function getsubcategory($id)
    {
        $sql = "SELECT name FROM `subcategory` WHERE id ='$id' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()){
                return $row['name'];
            }
        } else {
            return false;
        }
    }
    public function edit($id)
    {
        $getsupsubCategories = "SELECT * FROM supersubcategory WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($getsupsubCategories);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function checkifupdatedsubsubcatalreadyexist($url){
        $sql = "SELECT * FROM `supersubcategory` WHERE slug ='$url'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 1) {
            return true;
        } else {
            return false;
        }
    }

    public function update($inputData)
    {
        $id = $inputData['supsubcategory_id'];
        $parent_category = $inputData['parent_category'];
        $subcategory =  $inputData['subcategory'];
        $supersubcatimage = $inputData['supersubcatimage'];
        $subcat_description = $inputData['subcat_description'];
        $supersubcategory_name =  $inputData['supersubcategory_name'];
        $supersubcategory_url =  $inputData['supersubcategory_url'];
        $updatesupsubCatgeory = "UPDATE supersubcategory SET category_id = '$parent_category',subcategory_id ='$subcategory', super_name ='$supersubcategory_name', subcat_description = '$subcat_description'";
        if(!empty($supersubcatimage)){
            $updatesupsubCatgeory .=", subcat_image = '$supersubcatimage'";
        }
        $updatesupsubCatgeory .=", slug = '$supersubcategory_url' WHERE id = '$id'";
        $result = $this->conn->query($updatesupsubCatgeory);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getsubcategories($categoryid){
        $getsubCategories = "SELECT * FROM subcategory WHERE category_id = '$categoryid'";
        $result = $this->conn->query($getsubCategories);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function showsupsubcategory($supsubcategory_id, $supsubcategoryshow)
    {
        $showsupCategory = "UPDATE supersubcategory SET status = '$supsubcategoryshow' WHERE id = '$supsubcategory_id'";
        $result = $this->conn->query($showsupCategory);
        // echo $result;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($supsubcategory_id){
        $deletesupsubCategory = "DELETE FROM supersubcategory WHERE id ='$supsubcategory_id'";
        $result = $this->conn->query($deletesupsubCategory);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
