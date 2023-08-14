<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
class ShiprocketController
{
  public function __construct()
  {
    $db = new Databaseconnection;
    $this->conn = $db->conn;
  }
  
  
  public function dateDiffInDays($date1, $date2) 
  {
      // Calculating the difference in timestamps
      $diff = strtotime($date2) - strtotime($date1);
  
      // 1 day = 24 hours
      // 24 * 60 * 60 = 86400 seconds
      return abs(round($diff / 86400));
  }
  
  public function getserviceability($pincode, $adminid, $item_weight){
      $gettoekn = $this->generateToken($adminid);
      if($adminid == 2){
          $pickpostcode = '229001';
      }
      if($adminid == 1){
         $pickpostcode = '209801'; 
      }
 
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/serviceability/?pickup_postcode='.$pickpostcode.'&delivery_postcode='.$pincode.'&cod=0&weight=1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer '.$gettoekn.''
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
$reponse = json_decode($response, true);
 if($reponse['message']){
     $error = "error";
       return $error ;
   }
   if(isset($reponse['data']['available_courier_companies'])){
      echo $reponse['data']['available_courier_companies']['0']['etd'];
   }
  }
  
  

 public function generateToken($adminid)
  {
     
    if ($adminid == '1') {
      $sql = "SELECT * FROM `shiprocket_token` WHERE id = '1'";
      $result = $this->conn->query($sql);
      if ($result) {
        foreach ($result as $row) {
          $created_date = $row['created_at'];
          $token = $row['token'];
        }
        $current_date = date("Y-m-d");
        $dateDiff = $this->dateDiffInDays($created_date, $current_date);
      
        if ($dateDiff > 9) {
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
              "email": "namaneretail890@gmail.com",
              "password": "Naman@123"
          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);

          $reponse = json_decode($response, true);


          $token = $reponse['token'];
          curl_close($curl);
          $current_date = date("Y-m-d");
          $sql = "UPDATE shiprocket_token SET token = '$token',created_at = '$current_date' WHERE id = '1'";
          $result = $this->conn->query($sql);
          if ($result) {
            return $token;
          }
        } else {
          return $token;
        }
      }
    }
    if ($adminid == '2') {
      $sql = "SELECT * FROM `shiprocket_token` WHERE id = '2'";
      $result = $this->conn->query($sql);
      if ($result) {
        foreach ($result as $row) {
          $created_date = $row['created_at'];
          $token = $row['token'];
        }
       
        $current_date = date("Y-m-d");
        $dateDiff = $this->dateDiffInDays($created_date, $current_date);
       
      
        if ($dateDiff > 9) {
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
              "email": "sweetyagarwal3611@gmail.com",
              "password": "Naman@#1234"
          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
          $response = curl_exec($curl);

          $reponse = json_decode($response, true);
          $token = $reponse['token'];
          curl_close($curl);
          $current_date = date("Y-m-d");
          $sql = "UPDATE shiprocket_token SET token = '$token',created_at = '$current_date' WHERE id = '2'";
          $result = $this->conn->query($sql);
          if ($result) {
            return $token;
          }
        } else {
          return $token;
        }
      }
    }
  }
}