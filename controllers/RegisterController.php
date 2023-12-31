<?php
// include('config/app.php');
class RegisterController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    
    public function deleteUseraddresses($addressid, $customerid){
        $sql ="DELETE FROM customer_addresses WHERE customer_id = '$customerid' AND id = '$addressid'";
          $result = $this->conn->query($sql);
         if($result){
            return true;
        } else {
            return false;
        }
    }

    public function registerUser($name, $email, $password, $token, $created_at)
    {
        $sql = "INSERT INTO user (user_name,email,password,verify_token,created_at) VALUES ('$name', '$email', '$password','$token','$created_at')";
        $result = $this->conn->query($sql);
        return $result;
    }

        public function updateUseraddresses($inputData){
        $phone = $inputData['phone'];
        $addressid = $inputData['addressid'];
        $customerid = $inputData['customerid'];
        $addressf = $inputData['addressf'];
        $address_second = $inputData['address_second'];
        $city = $inputData['city'];
        $state = $inputData['state'];
        $country = $inputData['country'];
        $zip = $inputData['zip'];
        $sql = "UPDATE customer_addresses SET phone = '$phone', address1 = '$addressf', address2 = '$address_second', city = '$city', state = '$state', country = '$country', zip = '$zip' WHERE customer_id = '$customerid' AND id = '$addressid'";
         $result = $this->conn->query($sql);
         if($result){
            return true;
        } else {
            return false;
        }
        
        }


    public function isUserexist($email)
    {
        $check_user = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
        $result = $this->conn->query($check_user);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function confirmPassword($password, $cpassword)
    {
        if ($password == $cpassword) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($inputdata, $userid)
    {
        $firstname = $inputdata['firstname'];
        $lastname = $inputdata['lastname'];
        $email = $inputdata['email'];
        $phone = $inputdata['phone'];
        $address1 = $inputdata['address1'];
        $address2 = $inputdata['address2'];
        $city = $inputdata['city'];
        $state = $inputdata['state'];
        $country = $inputdata['country'];
        $zip = $inputdata['zip'];
        $sql = "UPDATE user SET user_name='$firstname',	last_name='$lastname', email='$email', phone='$phone',
        address1 ='$address1', address2='$address2', city ='$city', zone='$state', country='$country', zip='$zip'
        WHERE id ='$userid'
        ";
        $result = $this->conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
