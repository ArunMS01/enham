<?php
class ImagevalidationController{
    public function validateImage($filename, $tempfilename, $filesize, $target_dir){
        $target_file = $target_dir . basename($filename);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    
        $check = getimagesize($tempfilename);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            
            $uploadOk = 0;
        }
    
        // Check if file already exists
        if (file_exists($target_file)) {
           
            $uploadOk = 0;
        }
    
        // Check file size
        if ($filesize > 1000000) {
       
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
            if (move_uploaded_file($tempfilename, $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }
}



?>