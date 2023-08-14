<?php
class CategoryController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    public function getCategory(){
        $sql ="SELECT * FROM category WHERE status ='0' LIMIT 4";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result;
        } 
        else{
            return false;
        }  
    }

    public function categoryurlname($url){
        $sql = "SELECT cat_name FROM category WHERE cat_url = '$url'";
        $query = $this->conn->query($sql);
        if($query){
            while($row = $query->fetch_assoc()){
                $data = $row['cat_name'];
            }
            return $data;
        }
        else{
            return false;
        }
    }

    public function subcategoryurlname($url){
        $sql = "SELECT subcategory.name , subcategory.url, category.cat_url, category.cat_name FROM subcategory
        INNER JOIN category ON category.id = subcategory.category_id
         WHERE url = '$url'";
        $query = $this->conn->query($sql);
        if($query){
           return $query;
        }
        else{
            return false;
        }
    }

    public function supersubcategoryurlname($url){
        // $sql = "SELECT subcategory.name , category.cat_name FROM subcategory
        // INNER JOIN category ON category.id = subcategory.category_id
        //  WHERE url = '$url'";

         $sql = "SELECT sp.super_name AS supsub_name,  
         s.name AS subcat_name,
         s.url AS subcategory_url,
         c.cat_name AS category_name,
         c.cat_url AS category_url
       FROM supersubcategory AS sp 
       JOIN subcategory s ON sp.subcategory_id=s.id
       JOIN category c ON sp.category_id=c.id
       WHERE sp.slug = '$url'";
        $query = $this->conn->query($sql);
        if($query){
           return $query;
        }
        else{
            return false;
        }
    }
    
    public function fetchCategoryTreeListmenu($parent) {
    $menu = "";
	$sqlquery = "SELECT * FROM category WHERE parent_id = '$parent' AND status ='0' ORDER BY id ASC";
     $query = $this->conn->query($sqlquery);
     if ($query->num_rows > 0) {
     foreach($query as $row){
	{
           $menu .="<li class='menu-icon'><a href='category.php?url=".$row['cat_url']."'>".$row['cat_name']."</a>";
		   
		   $menu .= "<ul>".$this->fetchCategoryTreeListmenu($row['id'])."</ul>"; //call  recursively
		   
 		   $menu .= "</li>";
 
    }
     } 
     }
  return $menu;

}

public function getheadersubCategory($category_id){
    $sql = "SELECT * FROM `subcategory` WHERE category_id = '$category_id' AND status = '0'";
    $query = $this->conn->query($sql);
    if ($query->num_rows > 0) {
        return $query;
    }
    else{
        return false;
    }
}

    public function mobilefetchCategoryTreeListmenu($parent) {
    $menu = "";
	$sqlquery = "SELECT * FROM category WHERE parent_id = '$parent' ORDER BY id ASC";
     $query = $this->conn->query($sqlquery);
     if ($query->num_rows > 0) {
     foreach($query as $row){
	{
           $menu .="<li><a href='category.php?url=".$row['cat_url']."'>".$row['cat_name']."</a>";
		   
		   $menu .= "<ul class='sub-menu'>".$this->mobilefetchCategoryTreeListmenu($row['id'])."</ul>"; //call  recursively
		   
 		   $menu .= "</li>";
 
    }
     } 
     }
  return $menu;

}
    
    public function getSubcategory($id){
        $sql ="SELECT * FROM category WHERE parent_id = '$id' AND status ='0'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result;
            print_r($result);
        } 
        else{
            return false;
        }  
    }


    public function getCategorybyurl($url){
        $sql = "SELECT id FROM category WHERE cat_url = '$url' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            return $data['id'];
        } 
        else{
            return false;
        }
    }

    public function getsubCategorybyurl($url){
        $sql = "SELECT id FROM subcategory WHERE url = '$url' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            return $data['id'];
        } 
        else{
            return false;
        }
    }

    public function getCategorynameByid($id){
        $sql = "SELECT cat_name FROM category WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            return $data;
        } 
        else{
            return false;
        }
    }
    public function getheadersecondsubcategories($subcategory_id){
        $sql = "SELECT * FROM `supersubcategory` WHERE subcategory_id = '$subcategory_id' AND status = '0'";
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            return $query;
        }
        else{
            return false;
        }
    }

    public function getsupersubCategorybyurl($url){
        $sql = "SELECT id FROM supersubcategory WHERE slug = '$url' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            return $data['id'];
        } 
        else{
            return false;
        }
    }
}
?>